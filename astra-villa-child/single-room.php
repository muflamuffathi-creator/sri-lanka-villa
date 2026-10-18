<?php
/**
 * Template Name: Single Room Template
 * Description: Bespoke single room template with ACF integration, specifications bar, amenities, and sticky direct booking card.
 *
 * @package Astra_Villa_Child
 */

get_header(); ?>

<main id="primary" class="site-main villa-single-room-page">
    <?php while (have_posts()) : the_post(); 
        $post_id    = get_the_ID();
        $room_title = get_the_title();

        // ACF helpers with native fallback
        $price       = function_exists('get_field') ? get_field('room_price') : get_post_meta($post_id, 'room_price', true);
        $guests      = function_exists('get_field') ? get_field('room_guests') : get_post_meta($post_id, 'room_guests', true);
        $bed_type    = function_exists('get_field') ? get_field('bed_type') : get_post_meta($post_id, 'bed_type', true);
        $room_size   = function_exists('get_field') ? get_field('room_size') : get_post_meta($post_id, 'room_size', true);
        $room_view   = function_exists('get_field') ? get_field('room_view') : get_post_meta($post_id, 'room_view', true);
        $amenities   = function_exists('get_field') ? get_field('room_amenities') : get_post_meta($post_id, 'room_amenities', true);

        // Fallback default values
        $price     = $price ?: '165';
        $guests    = $guests ?: '2';
        $bed_type  = $bed_type ?: 'King Size Canopy Bed';
        $room_size = $room_size ?: '52 m² / 560 sq.ft';
        $room_view = $room_view ?: 'Indian Ocean & Sunset View';

        if (empty($amenities) || !is_array($amenities)) {
            $amenities = array(
                'Private Oceanfront Balcony',
                'Handcrafted Teak Furniture',
                'En-suite Open Air Rain Shower',
                'Ceylon Artisan Coffee & Tea Station',
                'Individually Controlled Air Conditioning',
                'Complimentary High-Speed Wi-Fi',
                'In-room Laptop Safe & Organic Toiletries',
                'Nightly Turndown Service'
            );
        }

        $hero_img = get_the_post_thumbnail_url($post_id, 'full');
        if (!$hero_img) {
            $hero_img = 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1920&q=80';
        }

        // WhatsApp direct enquiry URL
        $wa_number  = '94771234567';
        $wa_message = "Hello Villa Galle! I would like to enquire about reserving the *" . $room_title . "* ($" . $price . "/night). Are these dates available?";
        $wa_url     = "https://wa.me/" . $wa_number . "?text=" . rawurlencode($wa_message);
    ?>

    <!-- Room Hero Banner -->
    <header class="villa-room-hero" style="background-image: linear-gradient(180deg, rgba(24,59,54,0.4) 0%, rgba(24,59,54,0.85) 100%), url('<?php echo esc_url($hero_img); ?>');">
        <div class="villa-container">
            <nav class="villa-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa-solid fa-house"></i> Home</a>
                <span class="sep">/</span>
                <a href="<?php echo esc_url(get_post_type_archive_link('room')); ?>">Rooms & Suites</a>
                <span class="sep">/</span>
                <span class="current"><?php echo esc_html($room_title); ?></span>
            </nav>

            <span class="villa-badge-tag"><i class="fa-solid fa-crown"></i> Boutique Luxury Collection</span>
            <h1 class="villa-room-heading"><?php echo esc_html($room_title); ?></h1>
            <p class="villa-room-subline">Experience tranquil coastal living inside historical Galle Fort</p>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="villa-container villa-main-wrapper">
        <div class="villa-content-columns">
            
            <!-- Left Column: Specs, Story & Amenities -->
            <article class="villa-room-details">

                <!-- Key Specifications Bar -->
                <div class="villa-specs-grid">
                    <div class="spec-card">
                        <div class="spec-icon"><i class="fa-solid fa-user-group"></i></div>
                        <div class="spec-text">
                            <span class="spec-label">Capacity</span>
                            <span class="spec-value"><?php echo esc_html($guests); ?> Guests</span>
                        </div>
                    </div>
                    <div class="spec-card">
                        <div class="spec-icon"><i class="fa-solid fa-bed"></i></div>
                        <div class="spec-text">
                            <span class="spec-label">Bedding</span>
                            <span class="spec-value"><?php echo esc_html($bed_type); ?></span>
                        </div>
                    </div>
                    <div class="spec-card">
                        <div class="spec-icon"><i class="fa-solid fa-expand"></i></div>
                        <div class="spec-text">
                            <span class="spec-label">Floor Space</span>
                            <span class="spec-value"><?php echo esc_html($room_size); ?></span>
                        </div>
                    </div>
                    <div class="spec-card">
                        <div class="spec-icon"><i class="fa-solid fa-compass"></i></div>
                        <div class="spec-text">
                            <span class="spec-label">Panorama</span>
                            <span class="spec-value"><?php echo esc_html($room_view); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Room Description Text -->
                <section class="villa-section villa-room-narrative">
                    <h2>Suite Overview</h2>
                    <div class="entry-content">
                        <?php 
                        if (get_the_content()) {
                            the_content();
                        } else {
                            echo '<p>Designed to blend Dutch-colonial heritage with modern tropical minimalism, this suite features hand-carved Sri Lankan teak furnishings, soaring ceilings, and expansive French doors that open to let the sea breeze drift through.</p><p>Wake up to the gentle hum of the Indian Ocean, savor your morning cup of world-renowned Ceylon Pekoe tea on your private terrace, and enjoy personalized butler attention during your stay.</p>';
                        }
                        ?>
                    </div>
                </section>

                <!-- Amenities Checklist with Font Awesome -->
                <section class="villa-section villa-amenities-block">
                    <h2>Suite Amenities & Comforts</h2>
                    <div class="amenities-grid-two-col">
                        <?php foreach ($amenities as $item) : ?>
                            <div class="amenity-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span><?php echo esc_html($item); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Villa Highlights / Guarantee -->
                <section class="villa-section villa-perks-box">
                    <div class="perk-card">
                        <i class="fa-solid fa-utensils"></i>
                        <div>
                            <h4>Complimentary Ceylon Breakfast</h4>
                            <p>Daily feast of hoppers, fresh tropical fruits, and artisanal coffee.</p>
                        </div>
                    </div>
                    <div class="perk-card">
                        <i class="fa-solid fa-bell-concierge"></i>
                        <div>
                            <h4>Dedicated Concierge</h4>
                            <p>Custom whale watching, tea estate tours, and surf lessons arranged on request.</p>
                        </div>
                    </div>
                </section>

            </article>

            <!-- Right Column: Sticky Reservation & WhatsApp Card -->
            <aside class="villa-room-sidebar">
                <div class="villa-booking-card-sticky">
                    <div class="booking-price-header">
                        <span class="price-prefix">From</span>
                        <div class="price-main">
                            <span class="currency">$</span>
                            <span class="figure"><?php echo esc_html($price); ?></span>
                            <span class="period">/ night</span>
                        </div>
                        <span class="price-tax-note">Includes taxes, Wi-Fi & daily breakfast</span>
                    </div>

                    <div class="booking-perks-list">
                        <div><i class="fa-solid fa-bolt"></i> Instant WhatsApp Confirmation</div>
                        <div><i class="fa-solid fa-hand-holding-dollar"></i> Best Rate Guarantee — No Middleman Fees</div>
                        <div><i class="fa-solid fa-shield-halved"></i> Free Cancellation up to 7 days before arrival</div>
                    </div>

                    <!-- Direct WhatsApp Booking Button -->
                    <a href="<?php echo esc_url($wa_url); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="villa-btn-whatsapp-large" 
                       id="btnBookWhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>Enquire on WhatsApp</span>
                    </a>

                    <div class="booking-divider">
                        <span>OR EMAIL RESERVATION</span>
                    </div>

                    <!-- Direct Email Enquiry Trigger -->
                    <a href="#villa-reservation-form" class="villa-btn-email-enquiry">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Submit Booking Request</span>
                    </a>

                    <div class="direct-booking-trust">
                        <i class="fa-solid fa-phone"></i> Direct Villa Desk: +94 (0) 77 123 4567
                    </div>
                </div>
            </aside>

        </div>
    </div>

    <!-- Email Enquiry Form Section -->
    <section id="villa-reservation-form" class="villa-enquiry-section">
        <div class="villa-container">
            <div class="enquiry-card-wrapper">
                <div class="enquiry-intro">
                    <span class="section-subtitle">Reservations</span>
                    <h3>Enquire About <?php echo esc_html($room_title); ?></h3>
                    <p>Tell us your preferred dates and guest count. Our reservations desk will reply within 2 hours with customized rates.</p>
                </div>

                <div class="enquiry-form-embed">
                    <!-- Standard Fallback Form (or replace with Contact Form 7 / WPForms shortcode) -->
                    <form class="villa-direct-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
                        <input type="hidden" name="action" value="villa_send_enquiry">
                        <input type="hidden" name="room_name" value="<?php echo esc_attr($room_title); ?>">

                        <div class="form-row form-row-2">
                            <div class="form-group">
                                <label for="guest_name">Your Full Name *</label>
                                <input type="text" id="guest_name" name="guest_name" placeholder="e.g. John Doe" required>
                            </div>
                            <div class="form-group">
                                <label for="guest_email">Email Address *</label>
                                <input type="email" id="guest_email" name="guest_email" placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div class="form-row form-row-3">
                            <div class="form-group">
                                <label for="checkin_date">Check-in Date *</label>
                                <input type="date" id="checkin_date" name="checkin_date" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="checkout_date">Check-out Date *</label>
                                <input type="date" id="checkout_date" name="checkout_date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="guest_count">Total Guests *</label>
                                <select id="guest_count" name="guest_count">
                                    <option value="1">1 Guest</option>
                                    <option value="2" selected>2 Guests</option>
                                    <option value="3">3 Guests</option>
                                    <option value="4+">4+ Guests</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="guest_notes">Special Requests / Airport Transfer</label>
                            <textarea id="guest_notes" name="guest_notes" rows="3" placeholder="Let us know if you require Bandaranaike International Airport (CMB) pickup, dietary preferences, or honeymoon arrangements..."></textarea>
                        </div>

                        <button type="submit" class="villa-submit-btn">
                            <i class="fa-solid fa-paper-plane"></i> Send Reservation Enquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
