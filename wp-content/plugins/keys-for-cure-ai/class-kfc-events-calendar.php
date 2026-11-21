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
}

new KFC_Events_Calendar();
