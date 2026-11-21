<?php
/**
 * Plugin Name: Keys for Cure AI Assistant & Event Operations
 * Description: Two-Tier AI System: Customer-Facing Public Chatbot & In-Dashboard Event Manager for Keys for Cure (CC63798).
 * Version: 2.1.0
 * Author: Keys for Cure
 */

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'concept-layouts.php';
require_once plugin_dir_path(__FILE__) . 'class-kfc-events-calendar.php';

class KeysForCureAI {
    private const LLM_ENDPOINT = 'https://developer.amd.com.cn/radeon/api/v1/chat/completions';
    private const LLM_API_KEY  = 'rc-cd7744d0a5ef7c97f154b3bed829fd0ee41f7fb3250d11e0';
    private const MODEL_NAME   = 'DeepSeek-V4-Flash';

    public function __construct() {
        add_action('rest_api_init', [$this, 'register_routes']);
        add_action('wp_head', [$this, 'inject_homepage_fullwidth_styles']);
        add_filter('the_content', [$this, 'filter_homepage_content'], 1);
        add_action('wp_footer', [$this, 'render_public_chat_widget']);
        add_action('admin_menu', [$this, 'register_admin_menu']);
        add_action('admin_post_kfc_switch_theme', [$this, 'handle_admin_theme_switch']);

        // Native admin-ajax handlers for 100% reliable dashboard operations
        add_action('wp_ajax_kfc_admin_chat', [$this, 'handle_ajax_admin_chat']);
        add_action('wp_ajax_kfc_switch_theme', [$this, 'handle_ajax_theme_switch_admin']);
    }

    public function inject_homepage_fullwidth_styles() {
        if (is_front_page() || is_home()) {
            ?>
            <style id="kfc-fullwidth-reset">
                html, body { overflow-x: hidden; width: 100%; margin: 0; padding: 0; }
                body.home .wp-block-post-title,
                body.home .entry-title,
                body.home h1.wp-block-post-title { display: none !important; }
                body.home .wp-site-blocks,
                body.home .entry-content,
                body.home .wp-block-post-content {
                    max-width: 100% !important;
                    width: 100% !important;
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                    margin-left: 0 !important;
                    margin-right: 0 !important;
                }
                body.home .wp-block-post-content > * {
                    max-width: 100% !important;
                }
                body.home .is-layout-constrained > * {
                    max-width: 100% !important;
                }
                .kfc-fullbleed {
                    width: 100vw !important;
                    position: relative !important;
                    left: 50% !important;
                    right: 50% !important;
                    margin-left: -50vw !important;
                    margin-right: -50vw !important;
                    box-sizing: border-box !important;
                }
            </style>
            <?php
        }
    }

    public function filter_homepage_content($content) {
        if (is_front_page()) {
            remove_filter('the_content', 'wpautop');
        }
        return $content;
    }

    /* =========================================================================
     * REST ROUTE REGISTRATION
     * ========================================================================= */
    public function register_routes() {
        // Tier 1: Public Customer-Facing Chat
        register_rest_route('kfc-agent/v1', '/public', [
            'methods'             => 'POST',
            'callback'            => [$this, 'handle_public_chat'],
            'permission_callback' => '__return_true'
        ]);

        // Tier 2: Internal Admin Assistant (REST fallback)
        register_rest_route('kfc-agent/v1', '/admin', [
            'methods'             => 'POST',
            'callback'            => [$this, 'handle_admin_chat_rest'],
            'permission_callback' => function($request) {
                if (current_user_can('edit_posts')) {
                    return true;
                }
                $nonce = $request->get_header('x_wp_nonce') ?: $request->get_param('_wpnonce');
                if ($nonce && wp_verify_nonce($nonce, 'kfc_admin_nonce')) {
                    return true;
                }
                return false;
            }
        ]);

        // Quick AJAX Theme Switcher REST route
        register_rest_route('kfc-agent/v1', '/switch-theme', [
            'methods'             => 'POST',
            'callback'            => [$this, 'handle_ajax_theme_switch_rest'],
            'permission_callback' => function() {
                return current_user_can('edit_theme_options');
            }
        ]);
    }

    private function get_client_ip(): string {
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return sanitize_text_field($_SERVER['HTTP_CF_CONNECTING_IP']);
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $parts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return sanitize_text_field(trim($parts[0]));
        }
        return sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
    }

    private function sanitize_message(array $msg): array {
        if (array_key_exists('reasoning_content', $msg) && $msg['reasoning_content'] === null) {
            unset($msg['reasoning_content']);
        }
        if (!empty($msg['tool_calls']) && is_array($msg['tool_calls'])) {
            foreach ($msg['tool_calls'] as &$tc) {
                unset($tc['index']);
            }
        }
        return $msg;
    }

    /* =========================================================================
     * TIER 1: PUBLIC CUSTOMER-FACING CHATBOT
     * ========================================================================= */
    private function get_upcoming_events_context(): string {
        $now = current_time('mysql');
        $query_args = [
            'post_type'      => 'tribe_events',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'orderby'        => 'meta_value',
            'meta_key'       => '_EventStartDate',
            'order'          => 'ASC',
            'meta_query'     => [
                [
                    'key'     => '_EventStartDate',
                    'value'   => $now,
                    'compare' => '>=',
                    'type'    => 'DATETIME'
                ]
            ]
        ];

        $query = new WP_Query($query_args);
        if (!$query->have_posts()) {
            return "No upcoming concerts currently scheduled in the calendar.";
        }

        $lines = [];
        while ($query->have_posts()) {
            $query->the_post();
            $id = get_the_ID();
            $venue_id = get_post_meta($id, '_EventVenueID', true);
            $venue_name = $venue_id ? get_the_title($venue_id) : 'Takapuna, Auckland';
            $cost = get_post_meta($id, '_EventCost', true);
            $admission = !empty($cost) ? ('$' . $cost . ' NZD') : 'Free / Donation';
            $start_date = get_post_meta($id, '_EventStartDate', true);
            $formatted_date = $start_date ? date_i18n('l, j F Y \a\t g:i A', strtotime($start_date)) : 'Upcoming';
            $lines[] = "- **" . get_the_title() . "**: " . $formatted_date . " at " . $venue_name . " (" . $admission . ") — [Reserve Tickets](/events/)";
        }
        wp_reset_postdata();

        return implode("\n", $lines);
    }

    public function handle_public_chat(WP_REST_Request $request) {
        @set_time_limit(120);

        $ip = $this->get_client_ip();
        $transient_key = 'kfc_chat_ip_' . md5($ip);
        $count = (int) get_transient($transient_key);
        if ($count > 30) {
            return new WP_Error('rate_limit', 'Too many requests. Please wait a minute before sending another message.', ['status' => 429]);
        }
        set_transient($transient_key, $count + 1, 60);

        $raw_messages = $request->get_param('messages') ?: [];
        $messages = [];
        foreach ($raw_messages as $m) {
            if (isset($m['role'], $m['content']) && is_string($m['content'])) {
                $role = in_array($m['role'], ['user', 'assistant', 'system']) ? $m['role'] : 'user';
                $content = mb_substr(sanitize_text_field($m['content']), 0, 800);
                if (!empty($content)) {
                    $messages[] = ['role' => $role, 'content' => $content];
                }
            }
        }

        if (count($messages) > 8) {
            $messages = array_slice($messages, -8);
        }

        // Smart Context Pre-Injection: Pre-fetch upcoming concerts so the LLM answers immediately in 1 single pass
        $events_context = $this->get_upcoming_events_context();

        $system_prompt = [
            'role'    => 'system',
            'content' => "You are the visitor guide for Keys for Cure, a registered New Zealand music charity (CC63798).\n"
                       . "MISSION: 100% of concert proceeds fund children's health, education, and youth mental wellbeing.\n"
                       . "HEADQUARTERS: 20 Northcroft Street, Takapuna, Auckland, New Zealand.\n"
                       . "EMAIL: info@keysforcure.org.nz\n\n"
                       . "OFFICIAL 2026/2027 BENEFIT CONCERT SCHEDULE (LIVE DATABASE):\n"
                       . $events_context . "\n\n"
                       . "RULES:\n"
                       . "1. You ALREADY have the current published season concert schedule above! When visitors ask about concerts, dates, venues, tickets, or schedule, answer IMMEDIATELY and directly using the schedule above in 1 warm, inspiring response. Do NOT call query_upcoming_events unless they ask about past concerts or a specific obscure keyword not listed above.\n"
                       . "2. FINANCIAL SAFETY: We accept donations online at our official website or via inquiry at info@keysforcure.org.nz. NEVER hallucinate or invent bank account numbers, credit card numbers, or wire routing numbers.\n"
                       . "3. PRIVACY: You do NOT have access to personal phone numbers, emails, or private records of performers, parents, or staff. If asked, politely refuse and provide info@keysforcure.org.nz.\n"
                       . "4. Formulate responses with clean markdown links: e.g. [Reserve Tickets](/events/) or [Bruce Mason Centre](/events/).\n"
                       . "5. Tone: Warm, inspiring, welcoming, and concise (under 90 words). Use clean bullet points.\n"
                       . "6. STYLE GUARDRAIL: Do NOT use emojis (no hearts, instruments, decorative symbols, or smiley faces). Maintain a dignified, inspiring, and professional tone appropriate for a classical arts and healthcare foundation."
        ];

        array_unshift($messages, $system_prompt);

        $tools = [
            [
                'type' => 'function',
                'function' => [
                    'name'        => 'query_upcoming_events',
                    'description' => 'Searches published upcoming concert events in The Events Calendar database.',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'keyword' => ['type' => 'string', 'description' => 'Optional keyword or instrument filter (e.g., Takapuna, cello, gala, piano, chamber)']
                        ]
                    ]
                ]
            ]
        ];

        return rest_ensure_response($this->run_llm_loop($messages, $tools, 'public'));
    }

    private function tool_query_upcoming_events(array $args): string {
        $keyword = sanitize_text_field($args['keyword'] ?? '');
        $now = current_time('mysql');

        $query_args = [
            'post_type'      => 'tribe_events',
            'post_status'    => 'publish',
            'posts_per_page' => 5,
            'orderby'        => 'meta_value',
            'meta_key'       => '_EventStartDate',
            'order'          => 'ASC',
            'meta_query'     => [
                [
                    'key'     => '_EventStartDate',
                    'value'   => $now,
                    'compare' => '>=',
                    'type'    => 'DATETIME'
                ]
            ]
        ];

        if (!empty($keyword)) {
            $query_args['s'] = $keyword;
        }

        $query = new WP_Query($query_args);
        $events = [];

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $id = get_the_ID();

                $venue_id = get_post_meta($id, '_EventVenueID', true);
                $venue_name = $venue_id ? get_the_title($venue_id) : 'Takapuna, Auckland';
                $venue_city = $venue_id ? get_post_meta($venue_id, '_VenueCity', true) : 'Auckland';

                $cost = get_post_meta($id, '_EventCost', true);
                $currency = get_post_meta($id, '_EventCurrencySymbol', true) ?: '$';
                $admission = !empty($cost) ? ($currency . $cost . ' NZD') : 'Free / Donation';

                $start_date = get_post_meta($id, '_EventStartDate', true);
                $formatted_date = $start_date ? date_i18n('l, j F Y \a\t g:i A', strtotime($start_date)) : 'Upcoming';

                $events[] = [
                    'title'       => get_the_title(),
                    'date_time'   => $formatted_date,
                    'venue'       => $venue_name . (!empty($venue_city) ? " ($venue_city)" : ""),
                    'admission'   => $admission,
                    'summary'     => wp_trim_words(get_the_excerpt(), 22),
                    'details_url' => get_permalink()
                ];
            }
            wp_reset_postdata();
        }

        if (empty($events) && !empty($keyword)) {
            unset($query_args['s']);
            $fallback = new WP_Query($query_args);
            if ($fallback->have_posts()) {
                while ($fallback->have_posts()) {
                    $fallback->the_post();
                    $id = get_the_ID();
                    $start_date = get_post_meta($id, '_EventStartDate', true);
                    $venue_id = get_post_meta($id, '_EventVenueID', true);
                    $cost = get_post_meta($id, '_EventCost', true);
                    $events[] = [
                        'title'       => get_the_title(),
                        'date_time'   => date_i18n('j M Y, g:i A', strtotime($start_date)),
                        'venue'       => $venue_id ? get_the_title($venue_id) : 'Takapuna, Auckland',
                        'admission'   => !empty($cost) ? ('$' . $cost . ' NZD') : 'Free',
                        'details_url' => get_permalink()
                    ];
                }
                wp_reset_postdata();
            }
        }

        if (empty($events)) {
            return "No concerts found. Direct visitor to /events/ or info@keysforcure.org.nz.";
        }

        $lines = ["Season Concerts:"];
        foreach ($events as $e) {
            $lines[] = "- {$e['title']} ({$e['date_time']} @ {$e['venue']}, {$e['admission']}) [Details]({$e['details_url']})";
        }
        return implode("\n", $lines);
    }

    /* =========================================================================
     * TIER 2: INTERNAL ADMIN AI ASSISTANT ("AI EVENT MANAGER")
     * ========================================================================= */
    public function handle_ajax_admin_chat() {
        check_ajax_referer('kfc_admin_nonce', 'security');
        if (!current_user_can('edit_posts')) {
            wp_send_json_error(['message' => 'Unauthorized'], 403);
        }

        $raw_messages = isset($_POST['messages']) ? json_decode(stripslashes($_POST['messages']), true) : [];
        $result = $this->process_admin_chat($raw_messages);
        wp_send_json_success($result);
    }

    public function handle_admin_chat_rest(WP_REST_Request $request) {
        $raw_messages = $request->get_param('messages') ?: [];
        $result = $this->process_admin_chat($raw_messages);
        return rest_ensure_response($result);
    }

    private function process_admin_chat(array $raw_messages): array {
        @set_time_limit(120);

        $messages = [];
        foreach ($raw_messages as $m) {
            if (isset($m['role'], $m['content']) && is_string($m['content'])) {
                $role = in_array($m['role'], ['user', 'assistant', 'system']) ? $m['role'] : 'user';
                $content = mb_substr(sanitize_textarea_field($m['content']), 0, 1500);
                if (!empty($content)) {
                    $messages[] = ['role' => $role, 'content' => $content];
                }
            }
        }

        if (count($messages) > 12) {
            $messages = array_slice($messages, -12);
        }

        $current_theme = get_option('kfc_active_theme_concept', 1);
        $theme_names = [
            1 => 'Concept 1: Symphonic Prestige (Midnight Navy & Champagne Gold)',
            2 => 'Concept 2: Harmonies of Hope (Royal Blue & Golden Sunshine)',
            3 => 'Concept 3: Nordic Minimalist (Architectural Zinc & Electric Cobalt)'
        ];
        $active_name = $theme_names[$current_theme] ?? 'Concept 1: Symphonic Prestige';
        $events_context = $this->get_upcoming_events_context();

        $system_prompt = [
            'role'    => 'system',
            'content' => "You are the Internal AI Operations Assistant for Keys for Cure (CC63798) concert managers.\n"
                       . "CURRENT ACTIVE SITE THEME: {$active_name}.\n\n"
                       . "CURRENT PUBLISHED CONCERTS (LIVE DATABASE):\n"
                       . $events_context . "\n\n"
                       . "CAPABILITIES:\n"
                       . "1. Create concert events in The Events Calendar ('create_event').\n"
                       . "2. List and search scheduled concerts (you already have the upcoming season concerts above; answer immediately or call 'list_events' for full archives).\n"
                       . "3. Switch the live presentation theme variation ('switch_theme_concept') between:\n"
                       . "   - Concept 1 (Symphonic Prestige)\n"
                       . "   - Concept 2 (Harmonies of Hope)\n"
                       . "   - Concept 3 (Nordic Minimalist)\n"
                       . "4. Update site-wide announcement banners or templates ('update_announcement').\n\n"
                       . "SLOT-FILLING & VALIDATION RULES:\n"
                       . "- To create an event, you MUST have:\n"
                       . "  a) Event Title\n"
                       . "  b) Date (YYYY-MM-DD or clearly specified date like '20 March 2027')\n"
                       . "  c) Start Time (e.g. '7:00 PM' or '19:00')\n"
                       . "  d) Venue (e.g. Bruce Mason Centre, Auckland Town Hall, Takapuna Community Hall)\n"
                       . "  e) Ticket Price / Cost (e.g. '$25 NZD' or 'Free')\n"
                       . "- If any essential fields (title, date/time, venue) are missing from the manager's request, DO NOT call create_event yet! "
                       . "Ask the manager politely to provide the missing details (conversational slot-filling).\n"
                       . "- When all slots are filled, execute 'create_event'. Provide an executive confirmation with links to the live event URL and WordPress edit screen (/wp-admin/post.php?post=ID&action=edit).\n"
                       . "- Tone: Professional, courteous, proactive, and efficient. Do NOT use emojis in operational reports or responses."
        ];

        array_unshift($messages, $system_prompt);

        $tools = [
            [
                'type' => 'function',
                'function' => [
                    'name'        => 'create_event',
                    'description' => 'Creates a new published concert event in The Events Calendar database.',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'title'       => ['type' => 'string', 'description' => 'The concert or gala title'],
                            'date'        => ['type' => 'string', 'description' => 'Date of the event in YYYY-MM-DD format'],
                            'start_time'  => ['type' => 'string', 'description' => 'Start time (e.g., "19:00" or "7:00 PM")'],
                            'end_time'    => ['type' => 'string', 'description' => 'Optional end time (e.g., "21:30")'],
                            'venue'       => ['type' => 'string', 'description' => 'Venue name (e.g., "Bruce Mason Centre", "Auckland Town Hall")'],
                            'cost'        => ['type' => 'string', 'description' => 'Admission price numeric string (e.g., "25" or "0")'],
                            'description' => ['type' => 'string', 'description' => 'Detailed concert description, youth repertoire, or guest artists']
                        ],
                        'required'   => ['title', 'date', 'start_time', 'venue']
                    ]
                ]
            ],
            [
                'type' => 'function',
                'function' => [
                    'name'        => 'list_events',
                    'description' => 'Lists upcoming and published concerts in the database with IDs and dates.',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'limit' => ['type' => 'integer', 'description' => 'Number of events to retrieve (default 10)']
                        ]
                    ]
                ]
            ],
            [
                'type' => 'function',
                'function' => [
                    'name'        => 'switch_theme_concept',
                    'description' => 'Switches the live website theme style variation (1 = Symphonic Prestige, 2 = Harmonies of Hope, 3 = Nordic Minimalist).',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'concept_id' => [
                                'type'        => 'integer',
                                'description' => '1 for Symphonic Prestige, 2 for Harmonies of Hope, 3 for Nordic Minimalist'
                            ]
                        ],
                        'required'   => ['concept_id']
                    ]
                ]
            ],
            [
                'type' => 'function',
                'function' => [
                    'name'        => 'update_announcement',
                    'description' => 'Updates the top announcement or notice banner on the website.',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'message' => ['type' => 'string', 'description' => 'The announcement banner text']
                        ],
                        'required'   => ['message']
                    ]
                ]
            ]
        ];

        return $this->run_llm_loop($messages, $tools, 'admin');
    }

    private function tool_admin_create_event(array $args): string {
        $title = sanitize_text_field($args['title'] ?? 'Untitled Concert');
        $date  = sanitize_text_field($args['date'] ?? date('Y-m-d', strtotime('+30 days')));
        $start_time = sanitize_text_field($args['start_time'] ?? '19:00');
        $end_time   = sanitize_text_field($args['end_time'] ?? '21:00');
        $venue_name = sanitize_text_field($args['venue'] ?? 'Bruce Mason Centre');
        $cost       = sanitize_text_field($args['cost'] ?? '25');
        $desc       = wp_kses_post($args['description'] ?? "Keys for Cure youth charity performance supporting children's health and wellbeing.");

        $start_ts = strtotime("$date $start_time");
        if (!$start_ts) $start_ts = strtotime("$date 19:00");
        $end_ts = strtotime("$date $end_time");
        if (!$end_ts || $end_ts <= $start_ts) $end_ts = $start_ts + (2 * 3600);

        $venue_id = 0;
        $existing_venues = get_posts([
            'post_type'      => 'tribe_venue',
            'title'          => $venue_name,
            'posts_per_page' => 1
        ]);
        if (!empty($existing_venues)) {
            $venue_id = $existing_venues[0]->ID;
        } elseif (function_exists('tribe_create_venue')) {
            $venue_id = tribe_create_venue([
                'Venue'   => $venue_name,
                'City'    => 'Auckland',
                'Country' => 'New Zealand'
            ]);
        }

        $clean_cost = preg_replace('/[^0-9.]/', '', $cost);

        $event_data = [
            'post_title'          => $title,
            'post_content'        => $desc,
            'post_status'         => 'publish',
            'EventStartDate'      => date('Y-m-d', $start_ts),
            'EventStartHour'      => date('H', $start_ts),
            'EventStartMinute'    => date('i', $start_ts),
            'EventEndDate'        => date('Y-m-d', $end_ts),
            'EventEndHour'        => date('H', $end_ts),
            'EventEndMinute'      => date('i', $end_ts),
            'EventCost'           => $clean_cost,
            'EventCurrencySymbol' => '$',
            'EventTimezone'       => 'Pacific/Auckland'
        ];

        if ($venue_id) {
            $event_data['Venue'] = ['VenueID' => $venue_id];
        }

        $event_id = 0;
        if (function_exists('tribe_create_event')) {
            $event_id = tribe_create_event($event_data);
        } else {
            $event_id = wp_insert_post([
                'post_title'   => $title,
                'post_content' => $desc,
                'post_status'  => 'publish',
                'post_type'    => 'tribe_events'
            ]);
        }

        if ($event_id && !is_wp_error($event_id)) {
            update_post_meta($event_id, '_EventStartDate', date('Y-m-d H:i:s', $start_ts));
            update_post_meta($event_id, '_EventEndDate', date('Y-m-d H:i:s', $end_ts));
            update_post_meta($event_id, '_EventCost', $clean_cost);
            update_post_meta($event_id, '_EventCurrencySymbol', '$');
            update_post_meta($event_id, '_EventTimezone', 'Pacific/Auckland');
            if ($venue_id) {
                update_post_meta($event_id, '_EventVenueID', $venue_id);
            }

            return wp_json_encode([
                'status'    => 'success',
                'event_id'  => $event_id,
                'title'     => $title,
                'datetime'  => date('l, j F Y \a\t g:i A', $start_ts),
                'venue'     => $venue_name,
                'cost'      => '$' . $clean_cost . ' NZD',
                'live_url'  => get_permalink($event_id),
                'admin_url' => admin_url("post.php?post={$event_id}&action=edit")
            ]);
        }

        return wp_json_encode(['status' => 'error', 'message' => 'Failed to create event in WordPress.']);
    }

    private function tool_admin_list_events(array $args): string {
        $limit = max(1, min(20, intval($args['limit'] ?? 10)));
        $posts = get_posts([
            'post_type'      => 'tribe_events',
            'post_status'    => 'any',
            'posts_per_page' => $limit,
            'orderby'        => 'meta_value',
            'meta_key'       => '_EventStartDate',
            'order'          => 'ASC'
        ]);

        $list = [];
        foreach ($posts as $p) {
            $venue_id = get_post_meta($p->ID, '_EventVenueID', true);
            $venue_title = $venue_id ? get_the_title($venue_id) : 'Takapuna';
            $start_date = get_post_meta($p->ID, '_EventStartDate', true);
            $cost = get_post_meta($p->ID, '_EventCost', true);

            $list[] = [
                'id'        => $p->ID,
                'title'     => $p->post_title,
                'status'    => $p->post_status,
                'date'      => $start_date ? date('l, j F Y \a\t g:i A', strtotime($start_date)) : 'TBD',
                'venue'     => $venue_title,
                'cost'      => !empty($cost) ? ('$' . $cost . ' NZD') : 'Free / Donation',
                'view_url'  => get_permalink($p->ID),
                'edit_url'  => admin_url("post.php?post={$p->ID}&action=edit")
            ];
        }

        return wp_json_encode(['total' => count($list), 'events' => $list]);
    }

    private function tool_admin_switch_theme(array $args): string {
        $concept = intval($args['concept_id'] ?? 1);
        $res = $this->apply_theme_concept($concept);
        if ($res['success']) {
            return wp_json_encode([
                'status'      => 'success',
                'message'     => "Theme switched to {$res['title']} successfully!",
                'concept_id'  => $concept,
                'concept_name'=> $res['title']
            ]);
        }
        return wp_json_encode(['status' => 'error', 'message' => $res['error'] ?? 'Switch failed.']);
    }

    private function tool_admin_update_announcement(array $args): string {
        $msg = sanitize_text_field($args['message'] ?? '');
        update_option('kfc_site_announcement', $msg);
        return wp_json_encode(['status' => 'success', 'announcement' => $msg]);
    }

    /* =========================================================================
     * LLM ORCHESTRATION LOOP (SHARED) WITH RETRY & FALLBACK
     * ========================================================================= */
    private function run_llm_loop(array $messages, array $tools, string $tier = 'public', int $depth = 0) {
        $clean_messages = array_map([$this, 'sanitize_message'], $messages);

        $payload = [
            'model'      => self::MODEL_NAME,
            'messages'   => $clean_messages,
            'max_tokens' => ($tier === 'public') ? 380 : 600
        ];

        // In AMD schema, tools must be included if tool responses exist in history
        if (!empty($tools)) {
            $payload['tools'] = $tools;
            // On depth >= 1, force model to generate answer without calling more tools
            $payload['tool_choice'] = ($depth >= 1) ? 'none' : 'auto';
        }

        $response = wp_remote_post(self::LLM_ENDPOINT, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . self::LLM_API_KEY
            ],
            'body'    => wp_json_encode($payload),
            'timeout' => 75
        ]);

        if (is_wp_error($response)) {
            $err_msg = $response->get_error_message();
            error_log('KFC AI Gateway WP_Error: ' . $err_msg);

            // Resilient fallback for visitors
            if ($tier === 'public') {
                return [
                    'reply'   => "Kia ora! I am briefly experiencing high latency with our AI service, but our charity events are always available. Please explore our upcoming concerts on our [Events Calendar](/events/) or email us at info@keysforcure.org.nz.",
                    'history' => $messages
                ];
            } else {
                return [
                    'reply'   => "The AI gateway encountered a network timeout ({$err_msg}). Please retry your instruction or execute directly using the quick action buttons.",
                    'history' => $messages
                ];
            }
        }

        $code = wp_remote_retrieve_response_code($response);
        $body_raw = wp_remote_retrieve_body($response);
        $body = json_decode($body_raw, true);

        if ($code !== 200 || empty($body['choices'][0]['message'])) {
            error_log("KFC AI Gateway Bad Response ($code): " . substr($body_raw, 0, 300));
            return [
                'reply'   => "I apologize, but the assistant service returned an unexpected response (Status $code). Please try again shortly or check /events/ directly.",
                'history' => $messages
            ];
        }

        $choice = $body['choices'][0]['message'];
        $choice = $this->sanitize_message($choice);

        // Tool Calling Execution (Only allowed once per user request to avoid loops)
        if ($depth === 0 && !empty($choice['tool_calls'])) {
            $tool_call = $choice['tool_calls'][0];
            $func = $tool_call['function']['name'];
            $args = json_decode($tool_call['function']['arguments'] ?? '{}', true);

            $result = '';
            if ($tier === 'public') {
                if ($func === 'query_upcoming_events') {
                    $result = $this->tool_query_upcoming_events($args);
                }
            } else {
                switch ($func) {
                    case 'create_event':
                        $result = $this->tool_admin_create_event($args);
                        break;
                    case 'list_events':
                        $result = $this->tool_admin_list_events($args);
                        break;
                    case 'switch_theme_concept':
                        $result = $this->tool_admin_switch_theme($args);
                        break;
                    case 'update_announcement':
                        $result = $this->tool_admin_update_announcement($args);
                        break;
                }
            }

            $messages[] = $choice;
            $messages[] = [
                'role'         => 'tool',
                'tool_call_id' => $tool_call['id'],
                'content'      => $result
            ];

            return $this->run_llm_loop($messages, $tools, $tier, 1);
        }

        $messages[] = $choice;
        return [
            'reply'   => $choice['content'] ?? '',
            'history' => $messages
        ];
    }

    /* =========================================================================
     * THEME CONCEPT SWITCHER ENGINE
     * ========================================================================= */
    public function apply_theme_concept(int $concept_id): array {
        $files = [
            1 => [
                'file'  => 'kfc-concept-1-symphonic-prestige.json',
                'title' => 'Concept 1: Symphonic Prestige',
                'desc'  => 'Midnight Navy & Champagne Gold Classical Elegance'
            ],
            2 => [
                'file'  => 'kfc-concept-2-harmonies-of-hope.json',
                'title' => 'Concept 2: Harmonies of Hope',
                'desc'  => 'Royal Blue & Sunshine Yellow Youthful Energy'
            ],
            3 => [
                'file'  => 'kfc-concept-3-nordic-minimalist.json',
                'title' => 'Concept 3: Nordic Minimalist',
                'desc'  => 'Architectural Zinc & Electric Cobalt Modern Impact'
            ]
        ];

        if (!isset($files[$concept_id])) {
            return ['success' => false, 'error' => 'Invalid concept ID'];
        }

        $config = $files[$concept_id];
        $filepath = get_theme_root() . '/twentytwentyfive/styles/' . $config['file'];
        if (!file_exists($filepath)) {
            return ['success' => false, 'error' => "Style file {$config['file']} not found."];
        }

        $var_data = json_decode(file_get_contents($filepath), true);
        if (!$var_data) {
            return ['success' => false, 'error' => 'Failed to parse theme style JSON.'];
        }

        $posts = get_posts([
            'post_type'      => 'wp_global_styles',
            'post_status'    => 'publish',
            'name'           => 'wp-global-styles-twentytwentyfive',
            'posts_per_page' => 1
        ]);

        if (empty($posts)) {
            return ['success' => false, 'error' => 'wp_global_styles post not found.'];
        }

        $post_id = $posts[0]->ID;
        $user_json = [
            'version'                     => 3,
            'isGlobalStylesUserThemeJSON' => true,
            'settings'                    => [
                'color' => [
                    'palette' => [
                        'theme' => $var_data['settings']['color']['palette'] ?? []
                    ]
                ]
            ],
            'styles'                      => $var_data['styles'] ?? []
        ];

        wp_update_post([
            'ID'           => $post_id,
            'post_content' => wp_json_encode($user_json)
        ]);

        // Dynamically update homepage (post ID 51) to match this concept's unique structural layout
        $layout_html = $this->get_concept_layout_html($concept_id);
        if (!empty($layout_html)) {
            $front_id = get_option('page_on_front') ?: 51;
            wp_update_post([
                'ID'           => $front_id,
                'post_content' => $layout_html
            ]);
        }

        update_option('kfc_active_theme_concept', $concept_id);

        return [
            'success' => true,
            'title'   => $config['title'],
            'desc'    => $config['desc']
        ];
    }

    private function get_concept_layout_html(int $concept_id): string {
        if (class_exists('KFC_Concept_Layouts')) {
            return KFC_Concept_Layouts::get_layout($concept_id);
        }
        return '';
    }

    public function handle_ajax_theme_switch_admin() {
        check_ajax_referer('kfc_admin_nonce', 'security');
        if (!current_user_can('edit_theme_options')) {
            wp_send_json_error(['message' => 'Unauthorized'], 403);
        }
        $concept_id = intval($_POST['concept_id'] ?? 1);
        $res = $this->apply_theme_concept($concept_id);
        if ($res['success']) {
            wp_send_json_success(['concept_id' => $concept_id, 'concept' => $res]);
        }
        wp_send_json_error(['message' => $res['error'] ?? 'Switch failed']);
    }

    public function handle_ajax_theme_switch_rest(WP_REST_Request $request) {
        $concept_id = intval($request->get_param('concept_id'));
        $res = $this->apply_theme_concept($concept_id);
        if ($res['success']) {
            return rest_ensure_response(['success' => true, 'concept_id' => $concept_id, 'concept' => $res]);
        }
        return new WP_Error('switch_failed', $res['error'] ?? 'Switch failed', ['status' => 400]);
    }

    public function handle_admin_theme_switch() {
        check_admin_referer('kfc_switch_theme_action');
        if (!current_user_can('edit_theme_options')) {
            wp_die('Unauthorized');
        }
        $concept = intval($_GET['concept'] ?? 1);
        $this->apply_theme_concept($concept);
        wp_safe_redirect(admin_url('admin.php?page=kfc-ai-events&theme_switched=' . $concept));
        exit;
    }

    /* =========================================================================
     * ADMIN MENU & DASHBOARD UI
     * ========================================================================= */
    public function register_admin_menu() {
        add_menu_page(
            'Keys for Cure AI Operations',
            'AI Event Manager',
            'edit_posts',
            'kfc-ai-events',
            [$this, 'render_admin_page'],
            'dashicons-format-audio',
            26
        );
    }

    public function render_admin_page() {
        $active_concept = (int) get_option('kfc_active_theme_concept', 1);
        $concepts = [
            1 => [
                'name'  => 'Concept 1: London Music Fund Gala',
                'desc'  => 'Prestigious Midnight & Gold Gala Editorial (Sphinx & London Music Fund)',
                'pill'  => 'Gala Elegance',
                'bg'    => '#090D16',
                'color' => '#C5A059'
            ],
            2 => [
                'name'  => 'Concept 2: Playing For Change Youth Movement',
                'desc'  => 'Vibrant Cobalt & Amber Asymmetric Split Hero (Playing For Change & El Sistema)',
                'pill'  => 'Youth Movement',
                'bg'    => '#0052CC',
                'color' => '#F59E0B'
            ],
            3 => [
                'name'  => 'Concept 3: Nordoff & Robbins Clinical Humanism',
                'desc'  => 'Scandinavian Architectural Minimalism & Music Therapy (Nordoff and Robbins)',
                'pill'  => 'Clinical Wellbeing',
                'bg'    => '#18181B',
                'color' => '#0D9488'
            ]
        ];

        $ajax_nonce = wp_create_nonce('kfc_admin_nonce');
        $rest_nonce = wp_create_nonce('wp_rest');

        global $wpdb;
        $table_name = $wpdb->prefix . 'kfc_registrations';
        $total_registrations = 0;
        $total_checked_in = 0;
        $total_pledged = 0;
        $has_table = ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name);
        if ($has_table) {
            $total_registrations = (int) $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE status IN ('confirmed', 'checked_in')");
            $total_checked_in = (int) $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE status = 'checked_in'");
            $total_pledged = (float) $wpdb->get_var("SELECT SUM(donation_pledge) FROM $table_name WHERE status IN ('confirmed', 'checked_in')");
        }
        $door_pin = get_option('kfc_door_pin', '2027');
        ?>
        <div class="wrap" style="max-width: 1200px; margin-top: 20px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
            <div style="background: #ffffff; border: 1px solid #ccd0d4; border-radius: 8px; padding: 24px 30px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                    <div>
                        <h1 style="margin: 0; font-size: 24px; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 10px;">
                            <span>Keys for Cure &mdash; Concert Operations Hub</span>
                        </h1>
                        <p style="margin: 6px 0 0; color: #64748b; font-size: 14px;">
                            Registered Charity: CC63798 &bull; Conversational event management &amp; live style variations.
                        </p>
                    </div>
                    <div>
                        <a href="<?php echo home_url('/'); ?>" target="_blank" class="button" style="padding: 6px 14px; font-size: 13px;">View Live Site &rarr;</a>
                        <a href="<?php echo home_url('/events/'); ?>" target="_blank" class="button" style="padding: 6px 14px; font-size: 13px;">Public Calendar &rarr;</a>
                    </div>
                </div>

                <!-- One-Click Theme Switcher Bar -->
                <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #e2e8f0;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; flex-wrap: wrap;">
                        <span style="font-weight: 600; font-size: 14px; color: #334155;">Live Theme Style Variations (1-Click Switch):</span>
                        <span id="kfc-theme-status-text" style="font-size: 13px; color: #0284c7; font-weight: 500;">
                            Currently Active: <strong><?php echo esc_html($concepts[$active_concept]['name']); ?></strong>
                        </span>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px;">
                        <?php foreach ($concepts as $cid => $c): ?>
                            <?php $is_act = ($cid === $active_concept); ?>
                            <div id="kfc-card-<?php echo $cid; ?>" style="border: 2px solid <?php echo $is_act ? '#0284c7' : '#e2e8f0'; ?>; border-radius: 8px; padding: 14px 16px; background: <?php echo $is_act ? '#f0f9ff' : '#ffffff'; ?>; display: flex; justify-content: space-between; align-items: center; transition: all 0.2s;">
                                <div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="display: inline-block; width: 14px; height: 14px; border-radius: 50%; background: <?php echo $c['bg']; ?>; border: 2px solid <?php echo $c['color']; ?>;"></span>
                                        <strong style="font-size: 14px; color: #0f172a;"><?php echo esc_html($c['name']); ?></strong>
                                    </div>
                                    <div style="font-size: 12px; color: #64748b; margin-top: 3px;"><?php echo esc_html($c['desc']); ?></div>
                                </div>
                                <button type="button" class="button kfc-switch-btn <?php echo $is_act ? 'button-primary' : ''; ?>" data-concept="<?php echo $cid; ?>" <?php echo $is_act ? 'disabled' : ''; ?> style="font-size: 12px; font-weight: 600;">
                                    <?php echo $is_act ? 'Active' : 'Switch'; ?>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Door Check-In & Calendar Operations -->
            <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: 8px; padding: 22px 28px; margin-bottom: 24px; color: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                    <div>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="background: #10b981; color: #ffffff; padding: 3px 8px; border-radius: 6px; font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Native System</span>
                            <h2 style="margin: 0; font-size: 18px; font-weight: 700; color: #ffffff;">Concert Door Check-In &amp; Event Calendar</h2>
                        </div>
                        <p style="margin: 6px 0 0; color: #94a3b8; font-size: 13.5px;">
                            $0-Cost Elfsight-style calendar card widget &bull; High-speed camera QR code check-in &bull; Duplicate-entry rejection.
                        </p>
                    </div>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <a href="<?php echo esc_url(home_url('/checkin/')); ?>" target="_blank" class="button button-primary" style="background: #2563eb; border-color: #2563eb; font-weight: 600; padding: 4px 16px; height: 34px; line-height: 24px; display: inline-flex; align-items: center; gap: 6px;">
                            <span>📷 Launch Door Scanner Portal</span>
                        </a>
                        <a href="<?php echo esc_url(admin_url('admin-ajax.php?action=kfc_export_csv')); ?>" class="button" style="background: #334155; border-color: #475569; color: #ffffff; font-weight: 600; padding: 4px 16px; height: 34px; line-height: 24px; display: inline-flex; align-items: center; gap: 6px;">
                            <span>📥 Export Guest List (CSV)</span>
                        </a>
                    </div>
                </div>

                <!-- Stats & Quick Reference -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px; margin-top: 18px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,0.1);">
                    <div style="background: rgba(255,255,255,0.06); padding: 12px 16px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.08);">
                        <div style="font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: 600; letter-spacing: 0.5px;">Total RSVPs</div>
                        <div style="font-size: 22px; font-weight: 700; color: #ffffff; margin-top: 4px;"><?php echo number_format($total_registrations); ?> <span style="font-size: 12px; font-weight: 400; color: #94a3b8;">attendees</span></div>
                    </div>
                    <div style="background: rgba(255,255,255,0.06); padding: 12px 16px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.08);">
                        <div style="font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: 600; letter-spacing: 0.5px;">Admitted at Door</div>
                        <div style="font-size: 22px; font-weight: 700; color: #10b981; margin-top: 4px;"><?php echo number_format($total_checked_in); ?> <span style="font-size: 12px; font-weight: 400; color: #94a3b8;">checked in</span></div>
                    </div>
                    <div style="background: rgba(255,255,255,0.06); padding: 12px 16px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.08);">
                        <div style="font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: 600; letter-spacing: 0.5px;">Charity Pledges</div>
                        <div style="font-size: 22px; font-weight: 700; color: #f59e0b; margin-top: 4px;">$<?php echo number_format($total_pledged, 2); ?> <span style="font-size: 12px; font-weight: 400; color: #94a3b8;">NZD</span></div>
                    </div>
                    <div style="background: rgba(255,255,255,0.06); padding: 12px 16px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.08);">
                        <div style="font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: 600; letter-spacing: 0.5px;">Door PIN &bull; Shortcode</div>
                        <div style="font-size: 13px; font-weight: 600; color: #e2e8f0; margin-top: 6px;">
                            PIN: <code style="background: rgba(0,0,0,0.3); padding: 2px 6px; border-radius: 4px; color: #38bdf8;"><?php echo esc_html($door_pin); ?></code> &bull; <code style="background: rgba(0,0,0,0.3); padding: 2px 6px; border-radius: 4px; color: #a78bfa;">[kfc_event_calendar]</code>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AI Operations Terminal -->
            <div style="display: grid; grid-template-columns: 1fr 340px; gap: 24px; align-items: start;">
                <!-- Chat Window -->
                <div style="background: #ffffff; border: 1px solid #ccd0d4; border-radius: 8px; display: flex; flex-direction: column; height: 600px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); overflow: hidden;">
                    <div style="padding: 14px 18px; background: #0f172a; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 600; font-size: 14px;">Concert Operations Assistant</span>
                        <span style="font-size: 11px; background: #0284c7; padding: 2px 8px; border-radius: 12px; text-transform: uppercase; font-weight: 600;">Admin Mode</span>
                    </div>

                    <!-- Message Feed -->
                    <div id="kfc-admin-feed" style="flex: 1; padding: 18px; overflow-y: auto; background: #f8fafc; display: flex; flex-direction: column; gap: 12px; font-size: 14px;">
                        <div style="align-self: flex-start; max-width: 90%; background: #ffffff; border: 1px solid #e2e8f0; padding: 12px 16px; border-radius: 8px; color: #1e293b; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
                            <strong>Welcome to the Keys for Cure Operations Assistant.</strong><br>
                            You can create concert events in The Events Calendar, inspect upcoming programs, or change the live website presentation style.<br><br>
                            <em>Example commands:</em><br>
                            &bull; "Show all scheduled upcoming concerts"<br>
                            &bull; "Create a youth cello recital on Saturday 20 March 2027 at 7pm at Takapuna Community Hall with $20 tickets"<br>
                            &bull; "Switch theme to Harmonies of Hope"
                        </div>
                    </div>

                    <div id="kfc-admin-typing" style="display: none; padding: 6px 18px; font-size: 12px; color: #64748b; font-style: italic; background: #f8fafc;">
                        Keys for Cure Assistant is processing...
                    </div>

                    <!-- Input Bar (Auto-expanding Textarea with Shift+Enter support) -->
                    <div style="padding: 12px 16px; background: #ffffff; border-top: 1px solid #e2e8f0; display: flex; align-items: flex-end; gap: 8px;">
                        <textarea id="kfc-admin-input" rows="1" placeholder="Type an instruction... (Shift+Enter for new line)" style="flex: 1; padding: 9px 12px; font-size: 13.5px; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; resize: none; max-height: 120px; overflow-y: auto; word-break: break-word; white-space: pre-wrap; font-family: inherit; line-height: 1.45;"></textarea>
                        <button id="kfc-admin-send" class="button button-primary" style="padding: 0 20px; font-size: 14px; height: 38px; font-weight: 600; align-self: flex-end;">Execute</button>
                    </div>
                </div>

                <!-- Quick Actions Sidebar -->
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div style="background: #ffffff; border: 1px solid #ccd0d4; border-radius: 8px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                        <h3 style="margin: 0 0 12px; font-size: 14px; font-weight: 600; color: #0f172a;">Quick Operational Shortcuts</h3>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <button class="button kfc-quick-btn" style="text-align: left; padding: 8px 12px; height: auto; white-space: normal;" data-prompt="List all upcoming concerts scheduled in the calendar">
                                Show all upcoming concerts
                            </button>
                            <button class="button kfc-quick-btn" style="text-align: left; padding: 8px 12px; height: auto; white-space: normal;" data-prompt="I want to create a new concert event">
                                Start new concert creation
                            </button>
                            <button class="button kfc-quick-btn" style="text-align: left; padding: 8px 12px; height: auto; white-space: normal;" data-prompt="Switch site theme to Concept 2: Harmonies of Hope">
                                Switch to Harmonies of Hope
                            </button>
                            <button class="button kfc-quick-btn" style="text-align: left; padding: 8px 12px; height: auto; white-space: normal;" data-prompt="Switch site theme to Concept 1: Symphonic Prestige">
                                Switch to Symphonic Prestige
                            </button>
                        </div>
                    </div>

                    <div style="background: #ffffff; border: 1px solid #ccd0d4; border-radius: 8px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                        <h3 style="margin: 0 0 10px; font-size: 14px; font-weight: 600; color: #0f172a;">Operations Guardrails</h3>
                        <ul style="margin: 0; padding-left: 18px; font-size: 12.5px; color: #475569; line-height: 1.6;">
                            <li>Zero local software required for charity managers.</li>
                            <li>Events are directly saved into The Events Calendar database.</li>
                            <li>Conversational slot-filling ensures dates, venues, and ticket pricing are validated.</li>
                            <li>Live theme switching preserves all page content and block layouts.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
        (function() {
            const feed = document.getElementById("kfc-admin-feed");
            const input = document.getElementById("kfc-admin-input");
            const sendBtn = document.getElementById("kfc-admin-send");
            const typing = document.getElementById("kfc-admin-typing");
            const AJAX_URL = "<?php echo esc_url(admin_url('admin-ajax.php')); ?>";
            const AJAX_NONCE = "<?php echo esc_js($ajax_nonce); ?>";
            let adminHistory = [];

            function renderMarkdown(text) {
                if (!text) return "";
                let escaped = text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
                escaped = escaped.replace(/^### (.*$)/gim, '<h4 style="margin:8px 0 4px 0;font-size:14px;font-weight:700;">$1</h4>');
                escaped = escaped.replace(/^## (.*$)/gim, '<h3 style="margin:10px 0 4px 0;font-size:15px;font-weight:700;">$1</h3>');
                escaped = escaped.replace(/\*\*([^*]+)\*\*/g, "<strong>$1</strong>");
                escaped = escaped.replace(/\*([^*]+)\*/g, "<em>$1</em>");
                escaped = escaped.replace(/_([^_]+)_/g, "<em>$1</em>");
                escaped = escaped.replace(/\[([^\]]+)\]\(([^)]+)\)/g, function(match, label, url) {
                    const cleanUrl = url.replace(/["'<>]/g, "");
                    return `<a href="${cleanUrl}" target="_blank" rel="noopener noreferrer" style="color: #0284c7; text-decoration: underline; font-weight: 600;">${label}</a>`;
                });

                // Parse list items
                const lines = escaped.split("\n");
                let inUl = false;
                let inOl = false;
                let out = [];

                for (let i = 0; i < lines.length; i++) {
                    const line = lines[i];
                    const ulMatch = line.match(/^\s*[-*]\s+(.+)/);
                    const olMatch = line.match(/^\s*(\d+)\.\s+(.+)/);

                    if (ulMatch) {
                        if (inOl) { out.push("</ol>"); inOl = false; }
                        if (!inUl) { out.push('<ul style="margin:6px 0;padding-left:18px;list-style-type:disc;">'); inUl = true; }
                        out.push(`<li style="margin-bottom:3px;">${ulMatch[1]}</li>`);
                    } else if (olMatch) {
                        if (inUl) { out.push("</ul>"); inUl = false; }
                        if (!inOl) { out.push('<ol style="margin:6px 0;padding-left:18px;">'); inOl = true; }
                        out.push(`<li style="margin-bottom:3px;">${olMatch[2]}</li>`);
                    } else {
                        if (inUl) { out.push("</ul>"); inUl = false; }
                        if (inOl) { out.push("</ol>"); inOl = false; }
                        out.push(line);
                    }
                }
                if (inUl) out.push("</ul>");
                if (inOl) out.push("</ol>");

                let formatted = out.join("\n");
                formatted = formatted.replace(/\n{2,}/g, '<div style="height:8px;"></div>');
                return formatted.replace(/\n/g, "<br>");
            }

            function appendAdminMsg(role, text) {
                const msg = document.createElement("div");
                msg.style.maxWidth = "88%";
                msg.style.padding = "12px 16px";
                msg.style.borderRadius = "8px";
                msg.style.lineHeight = "1.5";
                msg.style.fontSize = "13.5px";
                msg.style.wordBreak = "break-word";
                msg.style.overflowWrap = "break-word";

                if (role === "user") {
                    msg.style.alignSelf = "flex-end";
                    msg.style.background = "#0284c7";
                    msg.style.color = "#ffffff";
                    msg.textContent = text;
                } else {
                    msg.style.alignSelf = "flex-start";
                    msg.style.background = "#ffffff";
                    msg.style.color = "#1e293b";
                    msg.style.border = "1px solid #e2e8f0";
                    msg.style.boxShadow = "0 1px 2px rgba(0,0,0,0.04)";
                    msg.innerHTML = renderMarkdown(text);
                }
                feed.appendChild(msg);
                feed.scrollTop = feed.scrollHeight;
                adminHistory.push({ role: role, content: text });
                if (adminHistory.length > 12) adminHistory = adminHistory.slice(-12);
            }

            async function submitAdminPrompt(promptText) {
                const text = promptText || input.value.trim();
                if (!text || sendBtn.disabled) return;

                appendAdminMsg("user", text);
                input.value = "";
                input.style.height = "auto";
                sendBtn.disabled = true;
                typing.style.display = "block";
                feed.scrollTop = feed.scrollHeight;

                try {
                    const formData = new FormData();
                    formData.append("action", "kfc_admin_chat");
                    formData.append("security", AJAX_NONCE);
                    formData.append("messages", JSON.stringify(adminHistory));

                    const res = await fetch(AJAX_URL, {
                        method: "POST",
                        credentials: "same-origin",
                        body: formData
                    });

                    const data = await res.json();
                    typing.style.display = "none";

                    if (data.success && data.data && data.data.reply) {
                        appendAdminMsg("assistant", data.data.reply);
                    } else if (data.data && data.data.message) {
                        appendAdminMsg("assistant", data.data.message);
                    } else {
                        appendAdminMsg("assistant", "Operation completed. If you don't see expected changes, please refresh.");
                    }
                } catch(e) {
                    typing.style.display = "none";
                    appendAdminMsg("assistant", "Error connecting to server. Please check connection and try again.");
                } finally {
                    sendBtn.disabled = false;
                    feed.scrollTop = feed.scrollHeight;
                }
            }

            sendBtn.onclick = () => submitAdminPrompt();

            // Auto-expanding textarea & Shift+Enter support
            input.addEventListener("input", function() {
                this.style.height = "auto";
                this.style.height = Math.min(this.scrollHeight, 120) + "px";
            });

            input.addEventListener("keydown", function(e) {
                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    submitAdminPrompt();
                }
            });

            document.querySelectorAll(".kfc-quick-btn").forEach(btn => {
                btn.onclick = () => submitAdminPrompt(btn.getAttribute("data-prompt"));
            });

            // 1-Click Theme Switcher via admin-ajax
            document.querySelectorAll(".kfc-switch-btn").forEach(btn => {
                btn.onclick = async () => {
                    const cid = btn.getAttribute("data-concept");
                    btn.disabled = true;
                    btn.textContent = "Switching...";

                    try {
                        const formData = new FormData();
                        formData.append("action", "kfc_switch_theme");
                        formData.append("security", AJAX_NONCE);
                        formData.append("concept_id", cid);

                        const res = await fetch(AJAX_URL, {
                            method: "POST",
                            credentials: "same-origin",
                            body: formData
                        });
                        const data = await res.json();
                        if (data.success && data.data && data.data.concept) {
                            document.querySelectorAll("[id^='kfc-card-']").forEach(c => {
                                c.style.borderColor = "#e2e8f0";
                                c.style.background = "#ffffff";
                            });
                            document.querySelectorAll(".kfc-switch-btn").forEach(b => {
                                b.classList.remove("button-primary");
                                b.disabled = false;
                                b.textContent = "Switch";
                            });

                            const activeCard = document.getElementById("kfc-card-" + cid);
                            if (activeCard) {
                                activeCard.style.borderColor = "#0284c7";
                                activeCard.style.background = "#f0f9ff";
                            }
                            btn.classList.add("button-primary");
                            btn.disabled = true;
                            btn.textContent = "✓ Active";

                            document.getElementById("kfc-theme-status-text").innerHTML = 
                                "Currently Active: <strong>" + data.data.concept.title + "</strong> (Switched live!)";
                        } else {
                            alert("Failed to switch theme: " + ((data.data && data.data.message) || "Unknown error"));
                            btn.disabled = false;
                            btn.textContent = "Switch";
                        }
                    } catch(e) {
                        alert("Error connecting to theme switcher.");
                        btn.disabled = false;
                        btn.textContent = "Switch";
                    }
                };
            });
        })();
        </script>
        <?php
    }

    /* =========================================================================
     * PUBLIC CHAT WIDGET (FRONTEND)
     * ========================================================================= */
    public function render_public_chat_widget() {
        if (is_admin()) return;
        ?>
        <style>
        #kfc-widget-root {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999999;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        #kfc-chat-btn {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #0051ba;
            color: #fff;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(0, 81, 186, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: transform 0.2s ease, background 0.2s ease;
        }
        #kfc-chat-btn:hover {
            transform: scale(1.06);
            background: #003e8f;
        }
        #kfc-chat-drawer {
            display: none;
            position: absolute;
            bottom: 74px;
            right: 0;
            width: min(360px, calc(100vw - 32px));
            height: min(500px, 78vh);
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 10px 32px rgba(0, 0, 0, 0.18);
            border: 1px solid #e2e8f0;
            overflow: hidden;
            flex-direction: column;
            animation: kfcFadeUp 0.25s ease-out;
        }
        @keyframes kfcFadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .kfc-header {
            background: #0051ba;
            color: #ffffff;
            padding: 14px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .kfc-header-title {
            font-weight: 600;
            font-size: 15px;
            line-height: 1.2;
        }
        .kfc-header-sub {
            font-size: 11.5px;
            opacity: 0.85;
            margin-top: 2px;
        }
        .kfc-close-btn {
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
            padding: 4px 8px;
            opacity: 0.8;
        }
        .kfc-close-btn:hover { opacity: 1; }
        .kfc-stream {
            flex: 1;
            padding: 14px;
            overflow-y: auto;
            background: #f8fafc;
            font-size: 13.5px;
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .kfc-msg {
            max-width: 86%;
            padding: 10px 14px;
            border-radius: 12px;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }
        .kfc-msg ul, .kfc-msg ol {
            margin: 6px 0 6px 0;
            padding-left: 18px;
        }
        .kfc-msg li {
            margin-bottom: 3px;
            line-height: 1.45;
        }
        .kfc-msg-bot {
            align-self: flex-start;
            background: #ffffff;
            color: #1e293b;
            border: 1px solid #e2e8f0;
            border-bottom-left-radius: 2px;
        }
        .kfc-msg-bot a {
            color: #0051ba;
            text-decoration: underline;
            font-weight: 500;
        }
        .kfc-msg-user {
            align-self: flex-end;
            background: #0051ba;
            color: #ffffff;
            border-bottom-right-radius: 2px;
            white-space: pre-wrap;
        }
        .kfc-typing {
            font-size: 12px;
            color: #64748b;
            font-style: italic;
            display: none;
            padding: 4px 10px;
        }
        .kfc-footer-bar {
            display: flex;
            align-items: flex-end;
            padding: 10px 12px;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            gap: 8px;
        }
        .kfc-input {
            flex: 1;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 9px 12px;
            font-size: 13.5px;
            line-height: 1.45;
            font-family: inherit;
            outline: none;
            resize: none;
            max-height: 120px;
            overflow-y: auto;
            word-break: break-word;
            white-space: pre-wrap;
            box-sizing: border-box;
            transition: border-color 0.15s ease;
        }
        .kfc-input:focus { border-color: #0051ba; }
        .kfc-send-btn {
            background: #0051ba;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0 16px;
            height: 38px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            align-self: flex-end;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .kfc-send-btn:disabled {
            background: #94a3b8;
            cursor: not-allowed;
        }
        </style>

        <div id="kfc-widget-root">
            <button id="kfc-chat-btn" aria-label="Open Keys for Cure Assistant">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </button>
            <div id="kfc-chat-drawer">
                <div class="kfc-header">
                    <div>
                        <div class="kfc-header-title">Keys for Cure Guide</div>
                        <div class="kfc-header-sub">Concerts, Charity &amp; Donations</div>
                    </div>
                    <button class="kfc-close-btn" id="kfc-chat-close">✕</button>
                </div>
                <div class="kfc-stream" id="kfc-chat-stream">
                    <div class="kfc-msg kfc-msg-bot">
                        Welcome to Keys for Cure. How can I help you today? Ask about our upcoming concerts, ticket reservations, or how your donation supports children's health.
                    </div>
                </div>
                <div class="kfc-typing" id="kfc-typing-indicator">Keys for Cure Guide is checking...</div>
                <div class="kfc-footer-bar">
                    <textarea id="kfc-user-in" class="kfc-input" rows="1" placeholder="Ask about concerts or donations... (Shift+Enter for newline)"></textarea>
                    <button id="kfc-user-send" class="kfc-send-btn">Send</button>
                </div>
            </div>
        </div>

        <script>
        (function() {
            const btn     = document.getElementById("kfc-chat-btn");
            const drawer  = document.getElementById("kfc-chat-drawer");
            const closeBtn= document.getElementById("kfc-chat-close");
            const stream  = document.getElementById("kfc-chat-stream");
            const input   = document.getElementById("kfc-user-in");
            const sendBtn = document.getElementById("kfc-user-send");
            const typing  = document.getElementById("kfc-typing-indicator");
            const STORAGE_KEY = "kfc_chat_history_v3";
            const STATE_KEY   = "kfc_chat_open_v3";

            let history = [];

            try {
                const saved = sessionStorage.getItem(STORAGE_KEY);
                if (saved) {
                    history = JSON.parse(saved);
                    history.forEach(m => {
                        if (m.role === "user" || m.role === "assistant") {
                            appendMessage(m.role, m.content, false);
                        }
                    });
                }
                if (sessionStorage.getItem(STATE_KEY) === "1") {
                    drawer.style.display = "flex";
                }
            } catch(e) {}

            function toggleDrawer() {
                const isOpen = drawer.style.display === "flex";
                drawer.style.display = isOpen ? "none" : "flex";
                sessionStorage.setItem(STATE_KEY, isOpen ? "0" : "1");
                if (!isOpen) {
                    input.focus();
                    stream.scrollTop = stream.scrollHeight;
                }
            }

            btn.onclick = toggleDrawer;
            closeBtn.onclick = toggleDrawer;

            function renderMarkdown(text) {
                if (!text) return "";
                let escaped = text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
                escaped = escaped.replace(/^### (.*$)/gim, '<h4 style="margin:8px 0 4px 0;font-size:14px;font-weight:700;">$1</h4>');
                escaped = escaped.replace(/^## (.*$)/gim, '<h3 style="margin:10px 0 4px 0;font-size:15px;font-weight:700;">$1</h3>');
                escaped = escaped.replace(/\*\*([^*]+)\*\*/g, "<strong>$1</strong>");
                escaped = escaped.replace(/\*([^*]+)\*/g, "<em>$1</em>");
                escaped = escaped.replace(/_([^_]+)_/g, "<em>$1</em>");
                escaped = escaped.replace(/\[([^\]]+)\]\(([^)]+)\)/g, function(match, label, url) {
                    const cleanUrl = url.replace(/["'<>]/g, "");
                    return `<a href="${cleanUrl}" target="_blank" rel="noopener noreferrer" style="color: #0051ba; text-decoration: underline; font-weight: 600;">${label}</a>`;
                });

                // Parse lists
                const lines = escaped.split("\n");
                let inUl = false;
                let inOl = false;
                let out = [];

                for (let i = 0; i < lines.length; i++) {
                    const line = lines[i];
                    const ulMatch = line.match(/^\s*[-*]\s+(.+)/);
                    const olMatch = line.match(/^\s*(\d+)\.\s+(.+)/);

                    if (ulMatch) {
                        if (inOl) { out.push("</ol>"); inOl = false; }
                        if (!inUl) { out.push('<ul style="margin:6px 0;padding-left:18px;list-style-type:disc;">'); inUl = true; }
                        out.push(`<li style="margin-bottom:3px;">${ulMatch[1]}</li>`);
                    } else if (olMatch) {
                        if (inUl) { out.push("</ul>"); inUl = false; }
                        if (!inOl) { out.push('<ol style="margin:6px 0;padding-left:18px;">'); inOl = true; }
                        out.push(`<li style="margin-bottom:3px;">${olMatch[2]}</li>`);
                    } else {
                        if (inUl) { out.push("</ul>"); inUl = false; }
                        if (inOl) { out.push("</ol>"); inOl = false; }
                        out.push(line);
                    }
                }
                if (inUl) out.push("</ul>");
                if (inOl) out.push("</ol>");

                let formatted = out.join("\n");
                formatted = formatted.replace(/\n{2,}/g, '<div style="height:8px;"></div>');
                return formatted.replace(/\n/g, "<br>");
            }

            function appendMessage(role, text, persist = true) {
                const msg = document.createElement("div");
                msg.className = "kfc-msg " + (role === "user" ? "kfc-msg-user" : "kfc-msg-bot");
                if (role === "user") {
                    msg.textContent = text;
                } else {
                    msg.innerHTML = renderMarkdown(text);
                }
                stream.appendChild(msg);
                stream.scrollTop = stream.scrollHeight;

                if (persist) {
                    history.push({ role: role === "user" ? "user" : "assistant", content: text });
                    if (history.length > 8) history = history.slice(-8);
                    try { sessionStorage.setItem(STORAGE_KEY, JSON.stringify(history)); } catch(e) {}
                }
            }

            async function submitMessage() {
                const text = input.value.trim();
                if (!text || sendBtn.disabled) return;

                appendMessage("user", text);
                input.value = "";
                input.style.height = "auto";
                sendBtn.disabled = true;
                typing.style.display = "block";
                stream.scrollTop = stream.scrollHeight;

                try {
                    const res = await fetch("/wp-json/kfc-agent/v1/public", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ messages: history })
                    });
                    const data = await res.json();
                    typing.style.display = "none";

                    const reply = data.reply || "Thank you for reaching out! Please check our Events page for more details.";
                    appendMessage("assistant", reply);
                } catch(e) {
                    typing.style.display = "none";
                    appendMessage("assistant", "I am having trouble connecting right now. Please explore our events directly at [/events/](/events/) or email us at info@keysforcure.org.nz.");
                } finally {
                    sendBtn.disabled = false;
                    stream.scrollTop = stream.scrollHeight;
                }
            }

            sendBtn.onclick = submitMessage;

            // Auto-expanding textarea & Shift+Enter support
            input.addEventListener("input", function() {
                this.style.height = "auto";
                this.style.height = Math.min(this.scrollHeight, 120) + "px";
            });

            input.addEventListener("keydown", function(e) {
                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    submitMessage();
                }
            });
        })();
        </script>
        <?php
    }
}

new KeysForCureAI();
