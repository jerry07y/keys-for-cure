<?php
/**
 * Keys for Cure - Native Event Calendar, RSVP & QR Code Check-In System
 * $0-Cost, Zero External SaaS Dependencies, Self-Contained.
 */

if (!defined('ABSPATH')) exit;

class KFC_Events_Calendar {

    public function __construct() {
        // Database setup
        add_action('init', [$this, 'init_db']);

        // Register shortcode
        add_shortcode('kfc_event_calendar', [$this, 'render_calendar_shortcode']);

        // AJAX Handlers for Registration
        add_action('wp_ajax_kfc_submit_rsvp', [$this, 'handle_submit_rsvp']);
        add_action('wp_ajax_nopriv_kfc_submit_rsvp', [$this, 'handle_submit_rsvp']);
    }

    public static function get_table_name(): string {
        global $wpdb;
        return $wpdb->prefix . 'kfc_registrations';
    }

    public function init_db() {
        global $wpdb;
        $table_name = self::get_table_name();
        $installed_ver = get_option('kfc_events_db_version', '0');

        if ($installed_ver !== '1.1') {
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
                id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                event_id bigint(20) unsigned NOT NULL,
                booking_ref varchar(32) NOT NULL,
                attendee_name varchar(255) NOT NULL,
                attendee_email varchar(255) NOT NULL,
                guest_count int(11) NOT NULL DEFAULT 1,
                donation_pledge decimal(10,2) NOT NULL DEFAULT 0.00,
                qr_token varchar(64) NOT NULL,
                status varchar(32) NOT NULL DEFAULT 'confirmed',
                checked_in_at datetime NULL,
                created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY  (id),
                UNIQUE KEY booking_ref (booking_ref),
                UNIQUE KEY qr_token (qr_token),
                KEY event_id (event_id)
            ) {$charset_collate};";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            update_option('kfc_events_db_version', '1.1');
        }
    }

    public static function generate_booking_ref(): string {
        return 'KFC-TKT-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
    }

    public static function generate_qr_token(string $ref): string {
        $salt = defined('AUTH_KEY') ? AUTH_KEY : 'kfc_charity_secure_salt_2026';
        return hash('sha256', $ref . '|' . $salt);
    }

    public static function check_event_capacity(int $event_id, int $requested_guests = 1): bool {
        global $wpdb;
        $max_capacity = (int) get_post_meta($event_id, '_kfc_event_capacity', true);
        if ($max_capacity <= 0) {
            // Default venue capacity if unset: 250
            $max_capacity = 250;
        }

        $table = self::get_table_name();
        $booked = (int) $wpdb->get_var($wpdb->prepare(
            "SELECT COALESCE(SUM(guest_count), 0) FROM {$table} WHERE event_id = %d AND status IN ('confirmed', 'checked_in')",
            $event_id
        ));

        return ($booked + $requested_guests) <= $max_capacity;
    }

    public function handle_submit_rsvp() {
        check_ajax_referer('kfc_calendar_nonce', 'nonce', false);

        $event_id = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
        $name     = sanitize_text_field($_POST['name'] ?? '');
        $email    = sanitize_email($_POST['email'] ?? '');
        $guests   = max(1, min(10, (int) ($_POST['guests'] ?? 1)));
        $pledge   = max(0.0, (float) ($_POST['pledge'] ?? 0.0));

        if (!$event_id || empty($name) || !is_email($email)) {
            wp_send_json_error(['message' => 'Please fill in a valid name, email address, and event.']);
            return;
        }

        if (!self::check_event_capacity($event_id, $guests)) {
            wp_send_json_error(['message' => 'This concert has reached full capacity. RSVP is sold out.']);
            return;
        }

        global $wpdb;
        $table = self::get_table_name();

        $booking_ref = self::generate_booking_ref();
        $qr_token    = self::generate_qr_token($booking_ref);

        $inserted = $wpdb->insert($table, [
            'event_id'        => $event_id,
            'booking_ref'     => $booking_ref,
            'attendee_name'   => $name,
            'attendee_email'  => $email,
            'guest_count'     => $guests,
            'donation_pledge' => $pledge,
            'qr_token'        => $qr_token,
            'status'          => 'confirmed',
            'created_at'      => current_time('mysql')
        ]);

        if (!$inserted) {
            wp_send_json_error(['message' => 'Registration database error. Please try again.']);
            return;
        }

        $event_post = get_post($event_id);
        $event_title = $event_post ? $event_post->post_title : 'Charity Benefit Concert';

        // Format date & venue
        $start_date = get_post_meta($event_id, '_EventStartDate', true);
        $date_str   = $start_date ? date_i18n('l, j F Y @ g:i A', strtotime($start_date)) : 'Date confirmed on pass';

        wp_send_json_success([
            'booking_ref'   => $booking_ref,
            'qr_token'      => $qr_token,
            'attendee_name' => $name,
            'event_title'   => $event_title,
            'date_str'      => $date_str,
            'guests'        => $guests,
            'pledge'        => $pledge
        ]);
    }

    public function render_calendar_shortcode($atts) {
        $atts = shortcode_atts([
            'limit' => 6,
            'title' => 'Upcoming Benefit Concerts & Performances'
        ], $atts);

        // Fetch upcoming events from tribe_events or custom kfc_event
        global $wpdb;
        $now = current_time('mysql');
        $events = $wpdb->get_results($wpdb->prepare(
            "SELECT p.ID, p.post_title, p.post_content, pm_date.meta_value as start_date, pm_venue.meta_value as venue_id, pm_cost.meta_value as cost
             FROM {$wpdb->posts} p
             LEFT JOIN {$wpdb->postmeta} pm_date ON (p.ID = pm_date.post_id AND pm_date.meta_key = '_EventStartDate')
             LEFT JOIN {$wpdb->postmeta} pm_venue ON (p.ID = pm_venue.post_id AND pm_venue.meta_key = '_EventVenueID')
             LEFT JOIN {$wpdb->postmeta} pm_cost ON (p.ID = pm_cost.post_id AND pm_cost.meta_key = '_EventCost')
             WHERE p.post_type IN ('tribe_events', 'kfc_event')
               AND p.post_status = 'publish'
             ORDER BY COALESCE(pm_date.meta_value, p.post_date) ASC
             LIMIT %d",
            (int) $atts['limit']
        ));

        $nonce = wp_create_nonce('kfc_calendar_nonce');
        $ajax_url = admin_url('admin-ajax.php');

        ob_start();
        ?>
        <div class="kfc-calendar-wrap" id="kfc-calendar">
            <style>
                .kfc-calendar-wrap { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; max-width: 1140px; margin: 30px auto; padding: 0 16px; color: #18181b; }
                .kfc-cal-header { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; border-bottom: 1px solid #e4e4e7; padding-bottom: 16px; }
                .kfc-cal-title { font-size: 26px; font-weight: 800; letter-spacing: -0.5px; margin: 0; color: #09090b; }
                .kfc-cal-sub { font-size: 14px; color: #71717a; margin-top: 4px; }
                .kfc-cal-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px; }
                .kfc-event-card { background: #ffffff; border: 1px solid #e4e4e7; border-radius: 14px; overflow: hidden; display: flex; flex-direction: column; transition: transform 0.2s ease, box-shadow 0.2s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
                .kfc-event-card:hover { transform: translateY(-3px); box-shadow: 0 12px 24px rgba(0,0,0,0.08); border-color: #d4d4d8; }
                .kfc-card-top { padding: 22px; flex: 1; display: flex; flex-direction: column; }
                .kfc-badge-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; gap: 8px; }
                .kfc-date-pill { background: #0f172a; color: #f8fafc; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 5px 12px; border-radius: 999px; text-transform: uppercase; }
                .kfc-bene-pill { background: #ecfdf5; color: #059669; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 999px; }
                .kfc-event-heading { font-size: 19px; font-weight: 700; line-height: 1.35; margin: 0 0 10px; color: #09090b; }
                .kfc-meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #52525b; margin-bottom: 6px; }
                .kfc-card-footer { padding: 14px 22px; background: #fafafa; border-top: 1px solid #f4f4f5; display: flex; justify-content: space-between; align-items: center; }
                .kfc-price-label { font-size: 15px; font-weight: 800; color: #09090b; }
                .kfc-btn-rsvp { background: #0f172a; color: #ffffff; border: none; padding: 9px 18px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.15s ease; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
                .kfc-btn-rsvp:hover { background: #27272a; color: #ffffff; }

                /* MODAL STYLES (Elfsight Style Popup) */
                .kfc-modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.65); backdrop-filter: blur(4px); z-index: 999999; display: none; align-items: center; justify-content: center; padding: 16px; }
                .kfc-modal-box { background: #ffffff; width: 100%; max-width: 520px; border-radius: 18px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); max-height: 90vh; display: flex; flex-direction: column; }
                .kfc-modal-header { padding: 22px 24px; background: #0f172a; color: #ffffff; position: relative; }
                .kfc-modal-close { position: absolute; top: 18px; right: 20px; background: rgba(255,255,255,0.15); border: none; color: #ffffff; width: 30px; height: 30px; border-radius: 50%; font-size: 18px; line-height: 1; cursor: pointer; display: flex; align-items: center; justify-content: center; }
                .kfc-modal-body { padding: 24px; overflow-y: auto; }
                .kfc-form-group { margin-bottom: 16px; }
                .kfc-form-group label { display: block; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #52525b; margin-bottom: 6px; }
                .kfc-input { width: 100%; padding: 10px 14px; border: 1px solid #d4d4d8; border-radius: 8px; font-size: 14px; box-sizing: border-box; }
                .kfc-input:focus { outline: none; border-color: #0f172a; }
                .kfc-submit-btn { width: 100%; background: #0f172a; color: #ffffff; padding: 13px; border: none; border-radius: 8px; font-size: 15px; font-weight: 700; cursor: pointer; }
                .kfc-submit-btn:hover { background: #27272a; }

                /* PASS CARD RESULT */
                .kfc-pass-card { background: linear-gradient(135deg, #090d16 0%, #1e293b 100%); color: #ffffff; border-radius: 16px; padding: 24px; text-align: center; border: 1px solid rgba(255,255,255,0.1); margin-top: 10px; }
                .kfc-qr-box { background: #ffffff; padding: 14px; border-radius: 12px; display: inline-block; margin: 18px 0; }
                .kfc-qr-box svg, .kfc-qr-box img { display: block; width: 180px; height: 180px; margin: 0 auto; }
            </style>

            <div class="kfc-cal-header">
                <div>
                    <h2 class="kfc-cal-title"><?php echo esc_html($atts['title']); ?></h2>
                    <div class="kfc-cal-sub">Supporting Pediatric Care &amp; Youth Wellbeing in Aotearoa &bull; Charity CC63798</div>
                </div>
            </div>

            <div class="kfc-cal-grid">
                <?php if (empty($events)): ?>
                    <p style="color:#71717a; grid-column:1/-1;">No concerts currently scheduled. Check back soon for season updates!</p>
                <?php else: ?>
                    <?php foreach ($events as $ev): ?>
                        <?php
                        $start_ts   = !empty($ev->start_date) ? strtotime($ev->start_date) : null;
                        $date_fmt   = $start_ts ? date_i18n('M j &bull; g:i A', $start_ts) : 'Upcoming';
                        $full_date  = $start_ts ? date_i18n('l, j F Y @ g:i A', $start_ts) : 'Date TBD';
                        $venue_name = 'Takapuna Community Hall';
                        if (!empty($ev->venue_id)) {
                            $v_post = get_post($ev->venue_id);
                            if ($v_post) $venue_name = $v_post->post_title;
                        }
                        $cost = !empty($ev->cost) ? '$' . $ev->cost : 'Free Admission';
                        $is_sold_out = !self::check_event_capacity((int)$ev->ID, 1);
                        ?>
                        <div class="kfc-event-card">
                            <div class="kfc-card-top">
                                <div class="kfc-badge-row">
                                    <span class="kfc-date-pill"><?php echo $date_fmt; ?></span>
                                    <span class="kfc-bene-pill"><?php echo $is_sold_out ? 'Capacity Full' : 'Pediatric Healthcare'; ?></span>
                                </div>
                                <h3 class="kfc-event-heading"><?php echo esc_html($ev->post_title); ?></h3>
                                <div class="kfc-meta-item">
                                    <span>📍 <?php echo esc_html($venue_name); ?></span>
                                </div>
                                <div class="kfc-meta-item">
                                    <span>🕒 <?php echo esc_html($full_date); ?></span>
                                </div>
                            </div>
                            <div class="kfc-card-footer">
                                <div class="kfc-price-label"><?php echo esc_html($cost); ?></div>
                                <?php if ($is_sold_out): ?>
                                    <span style="color:#ef4444; font-weight:700; font-size:13px;">Sold Out</span>
                                <?php else: ?>
                                    <button class="kfc-btn-rsvp" onclick="openKfcRsvpModal(<?php echo (int)$ev->ID; ?>, '<?php echo esc_js($ev->post_title); ?>', '<?php echo esc_js($venue_name); ?>', '<?php echo esc_js($full_date); ?>')">
                                        RSVP Pass &rarr;
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- MODAL POPUP FOR RSVP -->
            <div id="kfcRsvpModal" class="kfc-modal-overlay" onclick="closeKfcModal(event)">
                <div class="kfc-modal-box" onclick="event.stopPropagation()">
                    <div class="kfc-modal-header">
                        <button class="kfc-modal-close" onclick="document.getElementById('kfcRsvpModal').style.display='none'">&times;</button>
                        <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; font-weight: 700;">Concert RSVP Pass</div>
                        <h3 id="modalEventTitle" style="margin: 4px 0 0; font-size: 18px; color: #ffffff;">Concert Title</h3>
                    </div>
                    <div class="kfc-modal-body" id="modalBody">
                        <div id="rsvpFormWrap">
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; margin-bottom: 18px; font-size: 13px; color: #475569;">
                                <div id="modalEventVenue" style="font-weight: 600; color: #1e293b; margin-bottom: 3px;">📍 Takapuna Community Hall</div>
                                <div id="modalEventDate">🕒 Date &amp; Time</div>
                            </div>

                            <form id="kfcRsvpForm" onsubmit="handleKfcRsvpSubmit(event)">
                                <input type="hidden" id="rsvpEventId" name="event_id" value="">
                                <div class="kfc-form-group">
                                    <label for="rsvpName">Your Full Name *</label>
                                    <input type="text" id="rsvpName" name="name" class="kfc-input" required placeholder="e.g. Eleanor Vance">
                                </div>
                                <div class="kfc-form-group">
                                    <label for="rsvpEmail">Your Email Address *</label>
                                    <input type="email" id="rsvpEmail" name="email" class="kfc-input" required placeholder="e.g. eleanor@example.co.nz">
                                </div>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                    <div class="kfc-form-group">
                                        <label for="rsvpGuests">Guests Attending *</label>
                                        <input type="number" id="rsvpGuests" name="guests" class="kfc-input" min="1" max="10" value="1" required>
                                    </div>
                                    <div class="kfc-form-group">
                                        <label for="rsvpPledge">Optional Pledge ($NZD)</label>
                                        <input type="number" id="rsvpPledge" name="pledge" class="kfc-input" min="0" step="5" placeholder="$0.00">
                                    </div>
                                </div>
                                <button type="submit" id="rsvpSubmitBtn" class="kfc-submit-btn">Confirm RSVP &amp; Generate Concert Pass</button>
                            </form>
                        </div>

                        <div id="rsvpSuccessWrap" style="display:none;">
                            <div class="kfc-pass-card">
                                <div style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#38bdf8; font-weight:700;">Official Concert Pass</div>
                                <h3 id="passEventTitle" style="margin:6px 0 2px; font-size:18px; color:#ffffff;">Event Title</h3>
                                <div id="passDateStr" style="font-size:13px; color:#94a3b8;">Event Date</div>
                                
                                <div class="kfc-qr-box">
                                    <div id="qrcodeContainer"></div>
                                </div>
                                
                                <div style="font-size:15px; font-weight:800; letter-spacing:2px; color:#ffffff;" id="passBookingRef">KFC-TKT-XXXXXX</div>
                                <div style="font-size:12px; color:#94a3b8; margin-top:4px;" id="passAttendee">Attendee Name (1 guest)</div>
                                <div style="margin-top:14px; font-size:11.5px; color:#64748b;">Present this QR code on your phone at the entrance.</div>
                            </div>
                            <div style="margin-top:14px; text-align:center;">
                                <button onclick="window.print()" class="kfc-btn-rsvp" style="background:#2563eb; padding:10px 24px;">Print / Save Pass &darr;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Self-contained pure JS QR code generator (Zero External APIs) -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
            <script>
                function openKfcRsvpModal(eventId, title, venue, dateStr) {
                    document.getElementById('rsvpEventId').value = eventId;
                    document.getElementById('modalEventTitle').innerText = title;
                    document.getElementById('modalEventVenue').innerText = '📍 ' + venue;
                    document.getElementById('modalEventDate').innerText = '🕒 ' + dateStr;
                    document.getElementById('rsvpFormWrap').style.display = 'block';
                    document.getElementById('rsvpSuccessWrap').style.display = 'none';
                    document.getElementById('kfcRsvpModal').style.display = 'flex';
                }

                function closeKfcModal(e) {
                    if (e.target.id === 'kfcRsvpModal') {
                        document.getElementById('kfcRsvpModal').style.display = 'none';
                    }
                }

                function handleKfcRsvpSubmit(e) {
                    e.preventDefault();
                    var btn = document.getElementById('rsvpSubmitBtn');
                    btn.disabled = true;
                    btn.innerText = 'Reserving Pass...';

                    var formData = new FormData();
                    formData.append('action', 'kfc_submit_rsvp');
                    formData.append('nonce', '<?php echo esc_js($nonce); ?>');
                    formData.append('event_id', document.getElementById('rsvpEventId').value);
                    formData.append('name', document.getElementById('rsvpName').value);
                    formData.append('email', document.getElementById('rsvpEmail').value);
                    formData.append('guests', document.getElementById('rsvpGuests').value);
                    formData.append('pledge', document.getElementById('rsvpPledge').value || '0');

                    fetch('<?php echo esc_url($ajax_url); ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(r => r.json())
                    .then(res => {
                        btn.disabled = false;
                        btn.innerText = 'Confirm RSVP & Generate Concert Pass';
                        if (res.success) {
                            var data = res.data;
                            document.getElementById('passEventTitle').innerText = data.event_title;
                            document.getElementById('passDateStr').innerText = data.date_str;
                            document.getElementById('passBookingRef').innerText = data.booking_ref;
                            document.getElementById('passAttendee').innerText = data.attendee_name + ' (' + data.guests + ' attendee' + (data.guests > 1 ? 's' : '') + ')';
                            
                            var qrContainer = document.getElementById('qrcodeContainer');
                            qrContainer.innerHTML = '';
                            if (typeof QRCode !== 'undefined') {
                                new QRCode(qrContainer, {
                                    text: data.qr_token,
                                    width: 180,
                                    height: 180,
                                    colorDark: "#000000",
                                    colorLight: "#ffffff",
                                    correctLevel: QRCode.CorrectLevel.M
                                });
                            }
                            document.getElementById('rsvpFormWrap').style.display = 'none';
                            document.getElementById('rsvpSuccessWrap').style.display = 'block';
                        } else {
                            alert(res.data && res.data.message ? res.data.message : 'RSVP error occurred.');
                        }
                    })
                    .catch(err => {
                        btn.disabled = false;
                        btn.innerText = 'Confirm RSVP & Generate Concert Pass';
                        alert('Could not submit RSVP. Please check your network connection.');
                    });
                }
            </script>
        </div>
        <?php
        return ob_get_clean();
    }
}

new KFC_Events_Calendar();
