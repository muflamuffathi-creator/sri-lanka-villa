<?php
/**
 * Template Name: Room Archive Template
 * Description: The main listing template for all rooms and suites at the villa.
 *
 * @package Astra_Villa_Child
 */

get_header(); ?>

<main id="primary" class="site-main villa-rooms-archive-page">

    <!-- Archive Hero Header -->
    <header class="villa-archive-hero">
        <div class="villa-container">
            <span class="villa-subtitle-badge"><i class="fa-solid fa-umbrella-beach"></i> Authentic Sri Lankan Hospitality</span>
            <h1 class="archive-main-title">Suites & Private Villas</h1>
            <p class="archive-description">
                Immerse yourself in Dutch-colonial architecture, open-air courtyards, and panoramic views of the turquoise Indian Ocean. Every suite is individually curated with antique teakwood, bespoke fabrics, and modern comforts.
            </p>
            <div class="archive-weather-bar">
                <?php echo do_shortcode('[galle_weather]'); ?>
            </div>
        </div>
    </header>

    <!-- Rooms Grid Section -->
    <section class="villa-rooms-grid-section">
        <div class="villa-container">

            <?php if (have_posts()) : ?>
                <div class="villa-rooms-grid">
                    <?php while (have_posts()) : the_post(); 
                        $post_id    = get_the_ID();
                        $price      = function_exists('get_field') ? get_field('room_price') : get_post_meta($post_id, 'room_price', true);
                        $guests     = function_exists('get_field') ? get_field('room_guests') : get_post_meta($post_id, 'room_guests', true);
                        $bed_type   = function_exists('get_field') ? get_field('bed_type') : get_post_meta($post_id, 'bed_type', true);
                        $room_size  = function_exists('get_field') ? get_field('room_size') : get_post_meta($post_id, 'room_size', true);

                        $price      = $price ?: '150';
                        $guests     = $guests ?: '2';
                        $bed_type   = $bed_type ?: 'King Bed';
                        $room_size  = $room_size ?: '48 m²';

                        $categories = get_the_terms($post_id, 'room_category');
                        $cat_name   = ($categories && !is_wp_error($categories)) ? $categories[0]->name : 'Luxury Suite';

                        $thumb_url = get_the_post_thumbnail_url($post_id, 'large');
                        if (!$thumb_url) {
                            $thumb_url = 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=800&q=80';
                        }

                        $wa_msg = urlencode("Hello! I want to check availability for " . get_the_title() . " ($" . $price . "/night).");
                        $wa_url = "https://wa.me/94771234567?text=" . $wa_msg;
                    ?>

                    <article class="villa-room-card">
                        <!-- Image Container with Badges -->
                        <div class="room-card-image-wrap">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            </a>
                            <span class="card-category-tag"><?php echo esc_html($cat_name); ?></span>
                            <div class="card-price-tag">
                                <span class="prefix">From</span>
                                <span class="cost">$<?php echo esc_html($price); ?></span>
                                <span class="unit">/ night</span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="room-card-body">
                            <h3 class="room-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <!-- Mini Specs -->
                            <div class="room-card-specs">
                                <span><i class="fa-solid fa-users"></i> <?php echo esc_html($guests); ?> Guests</span>
                                <span><i class="fa-solid fa-bed"></i> <?php echo esc_html($bed_type); ?></span>
                                <span><i class="fa-solid fa-maximize"></i> <?php echo esc_html($room_size); ?></span>
                            </div>

                            <div class="room-card-excerpt">
                                <?php 
                                if (has_excerpt()) {
                                    echo esc_html(wp_trim_words(get_the_excerpt(), 18));
                                } else {
                                    echo 'Colonial-inspired sanctuary offering sweeping ocean breezes, four-poster teak bed, and open-air rain shower.';
                                }
                                ?>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="room-card-actions">
                                <a href="<?php the_permalink(); ?>" class="btn-card-explore">
                                    <span>Suite Details</span>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-card-wa" title="Instant WhatsApp Enquiry">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="villa-pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '<i class="fa-solid fa-arrow-left"></i> Previous',
                        'next_text' => 'Next <i class="fa-solid fa-arrow-right"></i>',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="villa-no-rooms">
                    <i class="fa-solid fa-hotel fa-3x"></i>
                    <h3>Rooms are being prepared</h3>
                    <p>Please check back shortly or enquire directly with our concierge via WhatsApp.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- Whole Villa Buyout Banner -->
    <section class="villa-buyout-banner">
        <div class="villa-container">
            <div class="buyout-box">
                <div class="buyout-text">
                    <span class="buyout-tag">Private Exclusive Escape</span>
                    <h3>Exclusive Whole Villa Buyout</h3>
                    <p>Celebrating a wedding, wellness retreat, or family reunion? Rent all 6 suites exclusively with private swimming pool, full villa staff, and personal private chef.</p>
                </div>
                <div class="buyout-action">
                    <a href="https://wa.me/94771234567?text=Hello%20Villa%20Galle!%20I%20am%20interested%20in%20a%20Private%20Whole%20Villa%20Buyout." target="_blank" class="btn-buyout-wa">
                        <i class="fa-brands fa-whatsapp"></i> Enquire for Whole Villa
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
