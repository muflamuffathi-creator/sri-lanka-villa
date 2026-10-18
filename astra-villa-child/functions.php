<?php
/**
 * Villa Galle Fort - Astra Child Theme Functions
 *
 * @package Astra_Villa_Child
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * 1. Enqueue Styles & Scripts
 */
function villa_enqueue_assets() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'astra-parent-theme-css',
        get_template_directory_uri() . '/style.css',
        array(),
        defined('ASTRA_THEME_VERSION') ? ASTRA_THEME_VERSION : '1.0.0'
    );

    // Google Fonts (Playfair Display & Plus Jakarta Sans)
    wp_enqueue_style(
        'villa-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Font Awesome 6 Free
    wp_enqueue_style(
        'font-awesome-6',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Child theme main style
    wp_enqueue_style(
        'astra-villa-child-style',
        get_stylesheet_uri(),
        array('astra-parent-theme-css', 'villa-google-fonts'),
        '1.0.0'
    );

    // Bespoke Villa custom CSS
    wp_enqueue_style(
        'villa-custom-css',
        get_stylesheet_directory_uri() . '/assets/css/villa-custom.css',
        array('astra-villa-child-style'),
        '1.0.0'
    );

    // Custom Frontend JavaScript
    wp_enqueue_script(
        'villa-custom-js',
        get_stylesheet_directory_uri() . '/assets/js/villa-custom.js',
        array('jquery'),
        '1.0.0',
        true
    );

    // Localize data for JS (e.g., WhatsApp number and room info)
    wp_localize_script('villa-custom-js', 'villaData', array(
        'ajaxUrl'     => admin_url('admin-ajax.php'),
        'waNumber'    => '94771234567',
        'villaName'   => 'Villa Galle Fort',
        'currentRoom' => is_singular('room') ? get_the_title() : '',
    ));
}
add_action('wp_enqueue_scripts', 'villa_enqueue_assets');


/**
 * 2. Register Custom Post Type: "Room"
 */
function villa_register_room_cpt() {
    $labels = array(
        'name'                  => _x('Rooms & Suites', 'Post type general name', 'astra-villa-child'),
        'singular_name'         => _x('Room', 'Post type singular name', 'astra-villa-child'),
        'menu_name'             => _x('Villa Rooms', 'Admin Menu text', 'astra-villa-child'),
        'name_admin_bar'        => _x('Room', 'Add New on Toolbar', 'astra-villa-child'),
        'add_new'               => __('Add New Room', 'astra-villa-child'),
        'add_new_item'          => __('Add New Room / Suite', 'astra-villa-child'),
        'new_item'              => __('New Room', 'astra-villa-child'),
        'edit_item'             => __('Edit Room', 'astra-villa-child'),
        'view_item'             => __('View Room Details', 'astra-villa-child'),
        'all_items'             => __('All Rooms', 'astra-villa-child'),
        'search_items'          => __('Search Rooms', 'astra-villa-child'),
        'parent_item_colon'     => __('Parent Rooms:', 'astra-villa-child'),
        'not_found'             => __('No rooms found in villa records.', 'astra-villa-child'),
        'not_found_in_trash'    => __('No rooms found in Trash.', 'astra-villa-child'),
        'featured_image'        => _x('Room Hero Cover Image', 'Overrides "Featured Image"', 'astra-villa-child'),
        'set_featured_image'    => _x('Set room cover image', 'Overrides "Set featured image"', 'astra-villa-child'),
        'remove_featured_image' => _x('Remove room cover image', 'Overrides "Remove featured image"', 'astra-villa-child'),
        'use_featured_image'    => _x('Use as room cover image', 'Overrides "Use as featured image"', 'astra-villa-child'),
        'archives'              => _x('Room Archives', 'The post type archive label', 'astra-villa-child'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'rooms', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true, // Enables Gutenberg editor & REST API endpoints
    );

    register_post_type('room', $args);

    // Register Custom Taxonomy: "Room Category"
    $tax_labels = array(
        'name'              => _x('Room Categories', 'taxonomy general name', 'astra-villa-child'),
        'singular_name'     => _x('Room Category', 'taxonomy singular name', 'astra-villa-child'),
        'search_items'      => __('Search Room Categories', 'astra-villa-child'),
        'all_items'         => __('All Categories', 'astra-villa-child'),
        'parent_item'       => __('Parent Category', 'astra-villa-child'),
        'parent_item_colon' => __('Parent Category:', 'astra-villa-child'),
        'edit_item'         => __('Edit Category', 'astra-villa-child'),
        'update_item'       => __('Update Category', 'astra-villa-child'),
        'add_new_item'      => __('Add New Category', 'astra-villa-child'),
        'new_item_name'     => __('New Category Name', 'astra-villa-child'),
        'menu_name'         => __('Categories', 'astra-villa-child'),
    );

    register_taxonomy('room_category', array('room'), array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'room-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'villa_register_room_cpt');


/**
 * 3. Custom Admin Columns for Rooms
 * Displays Price, Guests, and Bed Type in WP Admin list
 */
function villa_add_room_admin_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $title) {
        $new_columns[$key] = $title;
        if ($key === 'title') {
            $new_columns['room_price'] = __('Price / Night', 'astra-villa-child');
            $new_columns['room_guests'] = __('Max Guests', 'astra-villa-child');
            $new_columns['room_bed'] = __('Bed Type', 'astra-villa-child');
        }
    }
    return $new_columns;
}
add_filter('manage_room_posts_columns', 'villa_add_room_admin_columns');

function villa_render_room_admin_columns($column, $post_id) {
    if ($column === 'room_price') {
        $price = get_post_meta($post_id, 'room_price', true);
        echo $price ? '<strong>$' . esc_html($price) . '</strong>' : '<span style="color:#999;">—</span>';
    } elseif ($column === 'room_guests') {
        $guests = get_post_meta($post_id, 'room_guests', true);
        echo $guests ? esc_html($guests) . ' Guests' : '<span style="color:#999;">—</span>';
    } elseif ($column === 'room_bed') {
        $bed = get_post_meta($post_id, 'bed_type', true);
        echo $bed ? esc_html($bed) : '<span style="color:#999;">—</span>';
    }
}
add_action('manage_room_posts_custom_column', 'villa_render_room_admin_columns', 10, 2);


/**
 * 4. Live Weather REST API Shortcode (Galle Fort, Sri Lanka)
 * Fetches real-time weather from Open-Meteo with 2-hour Transient Caching
 * Usage: [galle_weather]
 */
function villa_weather_shortcode($atts) {
    $atts = shortcode_atts(array(
        'city' => 'Galle Fort',
        'lat'  => '6.0535',
        'lon'  => '80.2210',
    ), $atts, 'galle_weather');

    $transient_key = 'villa_weather_' . sanitize_key($atts['city']);
    $weather_data  = get_transient($transient_key);

    if (false === $weather_data) {
        $api_url = sprintf(
            'https://api.open-meteo.com/v1/forecast?latitude=%s&longitude=%s&current=temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m&timezone=auto',
            urlencode($atts['lat']),
            urlencode($atts['lon'])
        );

        $response = wp_remote_get($api_url, array('timeout' => 5));

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return '<div class="villa-weather-pill"><i class="fa-solid fa-sun"></i> ' . esc_html($atts['city']) . ': 29°C Tropical Warmth</div>';
        }

        $body = wp_remote_retrieve_body($response);
        $json = json_decode($body, true);

        $temp      = isset($json['current']['temperature_2m']) ? round($json['current']['temperature_2m']) : 29;
        $humidity  = isset($json['current']['relative_humidity_2m']) ? round($json['current']['relative_humidity_2m']) : 75;
        $wcode     = $json['current']['weather_code'] ?? 0;

        // Interpret WMO weather codes
        if ($wcode === 0) {
            $condition = 'Clear & Sunny';
            $icon = 'fa-sun';
        } elseif ($wcode <= 3) {
            $condition = 'Partly Cloudy';
            $icon = 'fa-cloud-sun';
        } elseif ($wcode >= 51 && $wcode <= 67) {
            $condition = 'Tropical Shower';
            $icon = 'fa-cloud-showers-heavy';
        } else {
            $condition = 'Pleasant Breeze';
            $icon = 'fa-wind';
        }

        $weather_data = array(
            'temp'      => $temp,
            'humidity'  => $humidity,
            'condition' => $condition,
            'icon'      => $icon,
            'city'      => $atts['city'],
        );

        // Cache for 2 hours (7200 seconds)
        set_transient($transient_key, $weather_data, 2 * HOUR_IN_SECONDS);
    }

    ob_start();
    ?>
    <div class="villa-weather-pill" title="Live weather in <?php echo esc_attr($weather_data['city']); ?>">
        <i class="fa-solid <?php echo esc_attr($weather_data['icon']); ?> weather-icon"></i>
        <span class="weather-city"><?php echo esc_html($weather_data['city']); ?></span>
        <span class="weather-temp"><?php echo esc_html($weather_data['temp']); ?>°C</span>
        <span class="weather-cond"><?php echo esc_html($weather_data['condition']); ?></span>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('galle_weather', 'villa_weather_shortcode');


/**
 * 5. Floating WhatsApp Direct Booking Button
 * Automatically pre-fills current room details when visitor is browsing a room
 */
function villa_render_floating_whatsapp() {
    $wa_number = '94771234567'; // Sri Lanka country code 94

    if (is_singular('room')) {
        $price = get_post_meta(get_the_ID(), 'room_price', true);
        $price_str = $price ? " ($" . $price . "/night)" : "";
        $message = "Hello Villa Galle! I am interested in booking the *" . get_the_title() . "*" . $price_str . ". Could you share availability?";
    } else {
        $message = "Hello Villa Galle! I would like to enquire about room availability and villa experiences.";
    }

    $wa_url = 'https://wa.me/' . $wa_number . '?text=' . rawurlencode($message);
    ?>
    <aside class="villa-whatsapp-floating-wrap" aria-label="Direct WhatsApp Contact">
        <a href="<?php echo esc_url($wa_url); ?>" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="villa-floating-wa-btn" 
           id="villaFloatingWa">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="wa-label">Direct Villa Chat</span>
        </a>
    </aside>
    <?php
}
add_action('wp_footer', 'villa_render_floating_whatsapp');


/**
 * 6. Quick Booking & Availability Search Bar Shortcode
 * Usage: [villa_booking_bar]
 */
function villa_booking_bar_shortcode() {
    $rooms = get_posts(array(
        'post_type'      => 'room',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ));

    ob_start();
    ?>
    <div class="villa-booking-bar-container">
        <form class="villa-booking-bar-form" action="<?php echo esc_url(home_url('/contact/')); ?>" method="GET">
            <div class="booking-field">
                <label for="bar-checkin"><i class="fa-regular fa-calendar-check"></i> Check-in</label>
                <input type="date" id="bar-checkin" name="checkin" required min="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="booking-field">
                <label for="bar-checkout"><i class="fa-regular fa-calendar-xmark"></i> Check-out</label>
                <input type="date" id="bar-checkout" name="checkout" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
            </div>

            <div class="booking-field">
                <label for="bar-room"><i class="fa-solid fa-bed"></i> Preferred Suite</label>
                <select id="bar-room" name="room_selection">
                    <option value="">Any Suite / Villa</option>
                    <?php foreach ($rooms as $room) : ?>
                        <option value="<?php echo esc_attr($room->post_title); ?>">
                            <?php echo esc_html($room->post_title); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="booking-field">
                <label for="bar-guests"><i class="fa-solid fa-user-group"></i> Guests</label>
                <select id="bar-guests" name="guests">
                    <option value="1">1 Guest</option>
                    <option value="2" selected>2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4+">4+ Guests / Whole Villa</option>
                </select>
            </div>

            <div class="booking-field booking-submit-wrap">
                <button type="submit" class="villa-btn-book">
                    <span>Enquire Dates</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('villa_booking_bar', 'villa_booking_bar_shortcode');
