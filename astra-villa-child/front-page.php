<?php
/**
 * Template Name: Merged Luxury Villa Front Page
 * Description: Unified one-page luxury boutique showcase merging hero, suites, gallery, experiences, buyout, and direct reservations.
 *
 * @package Astra_Villa_Child
 */

get_header(); ?>

<main id="primary" class="site-main villa-merged-homepage">

    <!-- Hero Section -->
    <section class="hero-section" id="hero" style="position:relative; min-height:85vh; display:flex; align-items:center; background:#000; overflow:hidden;">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero-villa.jpg'); ?>" alt="Villa Galle Fort Exterior" class="hero-bg" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; opacity:0.82;">
        <div class="hero-overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background:linear-gradient(180deg, rgba(10,30,27,0.4) 0%, rgba(10,30,27,0.85) 100%);"></div>
        <div class="container hero-content" style="position:relative; z-index:2; color:#fff; max-width:880px; padding:80px 28px 140px; margin:0 auto;">
            <span class="hero-tag" style="display:inline-flex; align-items:center; gap:10px; background:rgba(197,160,89,0.2); border:1px solid rgba(197,160,89,0.5); color:#DFBA73; font-size:0.8rem; font-weight:700; letter-spacing:3px; text-transform:uppercase; padding:8px 18px; border-radius:50px; margin-bottom:24px;">
                <i class="fa-solid fa-star"></i> Ceylon Boutique Hospitality
            </span>
            <h2 class="hero-title" style="font-size:3.8rem; color:#fff; margin-bottom:20px; line-height:1.15;">
                Where Colonial Heritage Meets <em style="font-style:italic; color:#DFBA73;">The Indian Ocean</em>
            </h2>
            <p class="hero-subtitle" style="font-size:1.2rem; color:rgba(255,255,255,0.9); margin-bottom:36px; line-height:1.6;">
                An intimate luxury retreat enveloped inside the 17th-century ramparts of UNESCO Galle Fort. Featuring handcrafted teak suites, private plunge pools, and bespoke private chef dining.
            </p>
            <div style="display:flex; gap:16px; flex-wrap:wrap;">
                <a href="#suites" class="btn-gold" style="padding:15px 32px; background:linear-gradient(135deg, #C5A059 0%, #A6833E 100%); color:#fff; font-weight:700; text-transform:uppercase; border-radius:4px; text-decoration:none;">
                    <span>Explore Our 4 Suites</span> <i class="fa-solid fa-arrow-down"></i>
                </a>
                <a href="https://wa.me/94771234567?text=Hello%20Villa%20Galle!%20I%20am%20enquiring%20about%20staying%20at%20your%20villa." target="_blank" style="padding:15px 26px; background:#25D366; color:#fff; font-weight:700; border-radius:4px; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                    <i class="fa-brands fa-whatsapp"></i> Chat with Villa Host
                </a>
            </div>
        </div>
    </section>

    <!-- Floating Booking Bar -->
    <div class="container" style="max-width:1280px; margin:-70px auto 70px; padding:0 28px; position:relative; z-index:20;">
        <div style="background:#fff; border-radius:12px; padding:28px 32px; box-shadow:0 20px 50px rgba(10,30,27,0.12); border:1px solid rgba(197,160,89,0.25);">
            <form onsubmit="event.preventDefault(); document.getElementById('reservations').scrollIntoView({behavior: 'smooth'});" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)) 1.2fr; gap:16px; align-items:flex-end;">
                <div>
                    <label style="display:block; font-size:0.75rem; font-weight:700; text-transform:uppercase; color:#12302B; margin-bottom:8px;"><i class="fa-regular fa-calendar" style="color:#C5A059;"></i> Check-in</label>
                    <input type="date" id="wp_checkin" style="width:100%; padding:12px 14px; border:1px solid #E8E5DD; border-radius:6px; background:#F9F7F2;" required>
                </div>
                <div>
                    <label style="display:block; font-size:0.75rem; font-weight:700; text-transform:uppercase; color:#12302B; margin-bottom:8px;"><i class="fa-regular fa-calendar-check" style="color:#C5A059;"></i> Check-out</label>
                    <input type="date" id="wp_checkout" style="width:100%; padding:12px 14px; border:1px solid #E8E5DD; border-radius:6px; background:#F9F7F2;" required>
                </div>
                <div>
                    <label style="display:block; font-size:0.75rem; font-weight:700; text-transform:uppercase; color:#12302B; margin-bottom:8px;"><i class="fa-solid fa-bed" style="color:#C5A059;"></i> Suite</label>
                    <select id="wp_suite_select" style="width:100%; padding:12px 14px; border:1px solid #E8E5DD; border-radius:6px; background:#F9F7F2;">
                        <option value="The Dutch Galle Master Suite (Rs. 68,000)">The Dutch Galle Master Suite (Rs. 68,000)</option>
                        <option value="Kandyan Garden Plunge Villa (Rs. 56,000)">Kandyan Garden Plunge Villa (Rs. 56,000)</option>
                        <option value="Lighthouse Ocean Horizon Suite (Rs. 60,000)">Lighthouse Ocean Horizon Suite (Rs. 60,000)</option>
                        <option value="Ceylon Cinnamon Courtyard Room (Rs. 42,000)">Ceylon Cinnamon Courtyard Room (Rs. 42,000)</option>
                        <option value="Entire Private Villa Buyout (Rs. 260,000)">Entire Private Villa Buyout (Rs. 260,000)</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; font-size:0.75rem; font-weight:700; text-transform:uppercase; color:#12302B; margin-bottom:8px;"><i class="fa-solid fa-user-group" style="color:#C5A059;"></i> Guests</label>
                    <select style="width:100%; padding:12px 14px; border:1px solid #E8E5DD; border-radius:6px; background:#F9F7F2;">
                        <option value="1">1 Guest</option>
                        <option value="2" selected>2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4+">4+ Guests / Whole Villa</option>
                    </select>
                </div>
                <div>
                    <button type="submit" style="width:100%; height:48px; background:#12302B; color:#fff; font-weight:700; text-transform:uppercase; letter-spacing:1px; border:none; border-radius:6px; cursor:pointer;">
                        <span>Check Rates</span> <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Editorial Story Section -->
    <section class="section-padding" id="about" style="padding:80px 0;">
        <div class="container" style="max-width:1280px; margin:0 auto; padding:0 28px; display:grid; grid-template-columns:1.1fr 1fr; gap:60px; align-items:center;">
            <div>
                <span style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:3px; color:#C5A059; display:block; margin-bottom:12px;">The Heritage Story</span>
                <h3 style="font-size:2.4rem; color:#12302B; margin-bottom:20px;">A Handcrafted Haven in Galle's Historic Citadel</h3>
                <p style="font-size:1.1rem; color:#1D4740; font-weight:500; margin-bottom:16px;">Originally built during the Dutch-colonial era of maritime trade, Villa Galle Fort has been meticulously restored into an ultra-exclusive private sanctuary.</p>
                <p style="color:#5E6966; margin-bottom:18px;">High timber-beam ceilings, authentic Sri Lankan jackwood antiques, and hand-poured encaustic tiles echo centuries of island history. Step through our arched doorway into a serene oasis of central lotus courtyards, frangipani blossoms, and the whisper of sea breezes.</p>
                <div style="display:flex; gap:24px; padding-top:24px; border-top:1px solid #E8E5DD;">
                    <div>
                        <strong style="color:#12302B; display:block;"><i class="fa-solid fa-award" style="color:#C5A059;"></i> TripAdvisor 2026</strong>
                        <small style="color:#5E6966;">Travelers' Choice Best of the Best</small>
                    </div>
                    <div>
                        <strong style="color:#12302B; display:block;"><i class="fa-solid fa-gem" style="color:#C5A059;"></i> Condé Nast Johansens</strong>
                        <small style="color:#5E6966;">Heritage Luxury Selected</small>
                    </div>
                </div>
            </div>
            <div style="position:relative;">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/spa-pool.jpg'); ?>" alt="Villa Plunge Pool" style="border-radius:12px; box-shadow:0 20px 50px rgba(10,30,27,0.12); width:100%;">
            </div>
        </div>
    </section>

    <!-- Suites & Accommodations Grid (Merged With Specifications) -->
    <section class="section-padding" id="suites" style="background:#FCFAF7; padding:90px 0; border-top:1px solid #E8E5DD; border-bottom:1px solid #E8E5DD;">
        <div class="container" style="max-width:1280px; margin:0 auto; padding:0 28px;">
            <div style="text-align:center; max-width:700px; margin:0 auto 50px;">
                <span style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:3px; color:#C5A059; display:block; margin-bottom:12px;">Accommodations</span>
                <h2 style="font-size:2.8rem; color:#12302B; margin-bottom:14px;">Rooms & Private Suites</h2>
                <p style="color:#5E6966;">Individually appointed sanctuaries in Galle Fort. All rates are quoted in Sri Lankan Rupees (Rs.) including daily breakfast.</p>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(500px, 1fr)); gap:36px;">
                
                <!-- Suite 1 -->
                <article style="background:#fff; border-radius:14px; overflow:hidden; border:1px solid #E8E5DD; box-shadow:0 10px 30px rgba(10,30,27,0.06);">
                    <div style="position:relative; height:300px; overflow:hidden;">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/suite-master.jpg'); ?>" alt="Master Suite" style="width:100%; height:100%; object-fit:cover;">
                        <span style="position:absolute; top:16px; left:16px; background:rgba(10,30,27,0.85); color:#fff; font-size:0.75rem; font-weight:700; text-transform:uppercase; padding:6px 14px; border-radius:50px;">Master Ocean Suite</span>
                        <div style="position:absolute; bottom:16px; right:16px; background:#fff; padding:6px 16px; border-radius:50px; font-weight:700; color:#12302B;">
                            From <span style="color:#C5A059;">Rs. 68,000</span> <small style="color:#888;">/ night</small>
                        </div>
                    </div>
                    <div style="padding:28px;">
                        <h3 style="font-size:1.6rem; color:#12302B; margin-bottom:12px;">The Dutch Galle Master Suite</h3>
                        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:8px; background:#F9F7F2; padding:12px; border-radius:8px; margin-bottom:16px; font-size:0.8rem;">
                            <div><small style="color:#888; display:block;">Capacity</small><strong>2 Guests</strong></div>
                            <div><small style="color:#888; display:block;">Bed</small><strong>Teak King</strong></div>
                            <div><small style="color:#888; display:block;">Size</small><strong>65 m²</strong></div>
                            <div><small style="color:#888; display:block;">View</small><strong>Ocean Fort</strong></div>
                        </div>
                        <p style="color:#5E6966; font-size:0.92rem; margin-bottom:20px;">Flagship suite boasting soaring timber ceilings, hand-carved Dutch antiques, stone soaking tub, and private verandah overlooking the ramparts.</p>
                        <div style="display:grid; grid-template-columns:1fr 50px; gap:10px;">
                            <a href="#reservations" style="background:#12302B; color:#fff; text-align:center; padding:12px; border-radius:6px; font-weight:700; text-transform:uppercase; font-size:0.85rem; text-decoration:none;">Reserve Suite</a>
                            <a href="https://wa.me/94771234567?text=Hi%20Villa%20Galle!%20Enquiry%20for%20The%20Dutch%20Galle%20Master%20Suite%20(Rs.%2068,000/night)." target="_blank" style="background:#25D366; color:#fff; display:flex; align-items:center; justify-content:center; border-radius:6px; font-size:1.3rem; text-decoration:none;"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </article>

                <!-- Suite 2 -->
                <article style="background:#fff; border-radius:14px; overflow:hidden; border:1px solid #E8E5DD; box-shadow:0 10px 30px rgba(10,30,27,0.06);">
                    <div style="position:relative; height:300px; overflow:hidden;">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/suite-garden.jpg'); ?>" alt="Garden Chalet" style="width:100%; height:100%; object-fit:cover;">
                        <span style="position:absolute; top:16px; left:16px; background:rgba(10,30,27,0.85); color:#fff; font-size:0.75rem; font-weight:700; text-transform:uppercase; padding:6px 14px; border-radius:50px;">Garden Chalet</span>
                        <div style="position:absolute; bottom:16px; right:16px; background:#fff; padding:6px 16px; border-radius:50px; font-weight:700; color:#12302B;">
                            From <span style="color:#C5A059;">Rs. 56,000</span> <small style="color:#888;">/ night</small>
                        </div>
                    </div>
                    <div style="padding:28px;">
                        <h3 style="font-size:1.6rem; color:#12302B; margin-bottom:12px;">Kandyan Garden Plunge Villa</h3>
                        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:8px; background:#F9F7F2; padding:12px; border-radius:8px; margin-bottom:16px; font-size:0.8rem;">
                            <div><small style="color:#888; display:block;">Capacity</small><strong>3 Guests</strong></div>
                            <div><small style="color:#888; display:block;">Bed</small><strong>Canopy King</strong></div>
                            <div><small style="color:#888; display:block;">Size</small><strong>58 m²</strong></div>
                            <div><small style="color:#888; display:block;">View</small><strong>Private Pool</strong></div>
                        </div>
                        <p style="color:#5E6966; font-size:0.92rem; margin-bottom:20px;">Secluded garden chalet featuring private outdoor plunge pool, frangipani sun deck, outdoor rain shower, and afternoon tea service delivered poolside.</p>
                        <div style="display:grid; grid-template-columns:1fr 50px; gap:10px;">
                            <a href="#reservations" style="background:#12302B; color:#fff; text-align:center; padding:12px; border-radius:6px; font-weight:700; text-transform:uppercase; font-size:0.85rem; text-decoration:none;">Reserve Suite</a>
                            <a href="https://wa.me/94771234567?text=Hi%20Villa%20Galle!%20Enquiry%20for%20Kandyan%20Garden%20Plunge%20Villa%20(Rs.%2056,000/night)." target="_blank" style="background:#25D366; color:#fff; display:flex; align-items:center; justify-content:center; border-radius:6px; font-size:1.3rem; text-decoration:none;"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </article>

                <!-- Suite 3 -->
                <article style="background:#fff; border-radius:14px; overflow:hidden; border:1px solid #E8E5DD; box-shadow:0 10px 30px rgba(10,30,27,0.06);">
                    <div style="position:relative; height:300px; overflow:hidden;">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/suite-ocean.jpg'); ?>" alt="Ocean Suite" style="width:100%; height:100%; object-fit:cover;">
                        <span style="position:absolute; top:16px; left:16px; background:rgba(10,30,27,0.85); color:#fff; font-size:0.75rem; font-weight:700; text-transform:uppercase; padding:6px 14px; border-radius:50px;">Ocean Suite</span>
                        <div style="position:absolute; bottom:16px; right:16px; background:#fff; padding:6px 16px; border-radius:50px; font-weight:700; color:#12302B;">
                            From <span style="color:#C5A059;">Rs. 60,000</span> <small style="color:#888;">/ night</small>
                        </div>
                    </div>
                    <div style="padding:28px;">
                        <h3 style="font-size:1.6rem; color:#12302B; margin-bottom:12px;">Lighthouse Ocean Horizon Suite</h3>
                        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:8px; background:#F9F7F2; padding:12px; border-radius:8px; margin-bottom:16px; font-size:0.8rem;">
                            <div><small style="color:#888; display:block;">Capacity</small><strong>2 Guests</strong></div>
                            <div><small style="color:#888; display:block;">Bed</small><strong>King Bed</strong></div>
                            <div><small style="color:#888; display:block;">Size</small><strong>50 m²</strong></div>
                            <div><small style="color:#888; display:block;">View</small><strong>Lighthouse</strong></div>
                        </div>
                        <p style="color:#5E6966; font-size:0.92rem; margin-bottom:20px;">Commanding unhindered views of the historic Galle Lighthouse and sunset horizons with an expansive cushioned daybed on the private ocean balcony.</p>
                        <div style="display:grid; grid-template-columns:1fr 50px; gap:10px;">
                            <a href="#reservations" style="background:#12302B; color:#fff; text-align:center; padding:12px; border-radius:6px; font-weight:700; text-transform:uppercase; font-size:0.85rem; text-decoration:none;">Reserve Suite</a>
                            <a href="https://wa.me/94771234567?text=Hi%20Villa%20Galle!%20Enquiry%20for%20Lighthouse%20Ocean%20Horizon%20Suite%20(Rs.%2060,000/night)." target="_blank" style="background:#25D366; color:#fff; display:flex; align-items:center; justify-content:center; border-radius:6px; font-size:1.3rem; text-decoration:none;"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </article>

                <!-- Suite 4 -->
                <article style="background:#fff; border-radius:14px; overflow:hidden; border:1px solid #E8E5DD; box-shadow:0 10px 30px rgba(10,30,27,0.06);">
                    <div style="position:relative; height:300px; overflow:hidden;">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/suite-courtyard.jpg'); ?>" alt="Courtyard Room" style="width:100%; height:100%; object-fit:cover;">
                        <span style="position:absolute; top:16px; left:16px; background:rgba(10,30,27,0.85); color:#fff; font-size:0.75rem; font-weight:700; text-transform:uppercase; padding:6px 14px; border-radius:50px;">Heritage Courtyard</span>
                        <div style="position:absolute; bottom:16px; right:16px; background:#fff; padding:6px 16px; border-radius:50px; font-weight:700; color:#12302B;">
                            From <span style="color:#C5A059;">Rs. 42,000</span> <small style="color:#888;">/ night</small>
                        </div>
                    </div>
                    <div style="padding:28px;">
                        <h3 style="font-size:1.6rem; color:#12302B; margin-bottom:12px;">Ceylon Cinnamon Courtyard Room</h3>
                        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:8px; background:#F9F7F2; padding:12px; border-radius:8px; margin-bottom:16px; font-size:0.8rem;">
                            <div><small style="color:#888; display:block;">Capacity</small><strong>2 Guests</strong></div>
                            <div><small style="color:#888; display:block;">Bed</small><strong>Queen Bed</strong></div>
                            <div><small style="color:#888; display:block;">Size</small><strong>42 m²</strong></div>
                            <div><small style="color:#888; display:block;">View</small><strong>Lotus Pond</strong></div>
                        </div>
                        <p style="color:#5E6966; font-size:0.92rem; margin-bottom:20px;">Peaceful courtyard sanctuary surrounding the lotus pond with hand-poured encaustic tiles, breezy verandah, and quiet inverter air conditioning.</p>
                        <div style="display:grid; grid-template-columns:1fr 50px; gap:10px;">
                            <a href="#reservations" style="background:#12302B; color:#fff; text-align:center; padding:12px; border-radius:6px; font-weight:700; text-transform:uppercase; font-size:0.85rem; text-decoration:none;">Reserve Suite</a>
                            <a href="https://wa.me/94771234567?text=Hi%20Villa%20Galle!%20Enquiry%20for%20Ceylon%20Cinnamon%20Courtyard%20Room%20(Rs.%2042,000/night)." target="_blank" style="background:#25D366; color:#fff; display:flex; align-items:center; justify-content:center; border-radius:6px; font-size:1.3rem; text-decoration:none;"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Whole Villa Buyout (Rs. 260,000) -->
    <div class="container" style="max-width:1280px; margin:40px auto; padding:0 28px;">
        <div style="background:linear-gradient(135deg, #0A1E1B 0%, #153833 100%); border-radius:20px; padding:60px; color:#fff; display:grid; grid-template-columns:1.4fr 1fr; gap:40px; align-items:center;">
            <div>
                <span style="color:#C5A059; font-weight:700; text-transform:uppercase; letter-spacing:2px; font-size:0.8rem; display:block; margin-bottom:10px;"><i class="fa-solid fa-crown"></i> Complete Exclusivity</span>
                <h3 style="font-size:2.6rem; color:#fff; margin-bottom:16px;">Rent The Entire Private Villa</h3>
                <p style="color:rgba(255,255,255,0.85); margin-bottom:24px;">Host an intimate destination wedding, multi-generational retreat, or executive escape. Secure exclusive private access to all 4 luxury suites, swimming pool, private estate grounds, and full villa staff including private chef.</p>
                <a href="https://wa.me/94771234567?text=Hello%20Villa%20Galle!%20Enquiry%20for%20Whole%20Villa%20Buyout%20(Rs.%20260,000/night)." target="_blank" style="display:inline-flex; align-items:center; gap:10px; background:#C5A059; color:#fff; padding:15px 30px; border-radius:4px; font-weight:700; text-decoration:none;">
                    <i class="fa-brands fa-whatsapp"></i> Enquire for Whole Villa
                </a>
            </div>
            <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.18); border-radius:14px; padding:36px; text-align:center;">
                <h4 style="color:#DFBA73; margin-bottom:8px;">Private Buyout Rate</h4>
                <div style="font-size:2.8rem; font-weight:700; color:#fff; margin:10px 0;"><span style="color:#C5A059; font-size:0.7em;">Rs.</span> 260,000</div>
                <p style="font-size:0.85rem; color:rgba(255,255,255,0.7);">Per night • All 4 suites included • Daily gourmet breakfast included</p>
            </div>
        </div>
    </div>

    <!-- Direct Reservations & Contact Section -->
    <section class="section-padding" id="reservations" style="padding:90px 0;">
        <div class="container" style="max-width:1280px; margin:0 auto; padding:0 28px;">
            <div style="background:#fff; border-radius:16px; padding:50px; border:1px solid #E8E5DD; box-shadow:0 20px 50px rgba(10,30,27,0.08); display:grid; grid-template-columns:1fr 1.3fr; gap:50px;">
                <div>
                    <span style="font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:3px; color:#C5A059; display:block; margin-bottom:10px;">Direct Reservations</span>
                    <h3 style="font-size:2.2rem; color:#12302B; margin-bottom:16px;">Plan Your Ceylon Escape</h3>
                    <p style="color:#5E6966; margin-bottom:24px;">Direct reservations receive complimentary airport concierge assistance, daily tropical breakfast, and flexible cancellation.</p>
                    <div style="display:flex; align-items:center; gap:16px; background:#F9F7F2; padding:18px; border-radius:10px; border-left:4px solid #C5A059; margin-bottom:24px;">
                        <div style="width:50px; height:50px; border-radius:50%; background:#12302B; color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.3rem;">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div>
                            <strong style="color:#12302B; display:block;">Mr. Shantha Wickramasinghe</strong>
                            <small style="color:#5E6966; display:block;">Resident Villa Manager</small>
                            <small style="color:#C5A059; font-weight:700;"><i class="fa-solid fa-circle" style="font-size:0.5rem;"></i> Active on WhatsApp now</small>
                        </div>
                    </div>
                    <p style="margin-bottom:10px;"><i class="fa-brands fa-whatsapp" style="color:#25D366; width:20px;"></i> <strong>WhatsApp:</strong> +94 (0) 77 123 4567</p>
                    <p><i class="fa-solid fa-location-dot" style="color:#C5A059; width:20px;"></i> 42 Light House Street, Galle Fort, Sri Lanka</p>
                </div>

                <div>
                    <form onsubmit="event.preventDefault(); alert('Ayubowan! Your reservation enquiry has been dispatched to our Villa Manager. We will reply via WhatsApp or email within 2 hours.');">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                            <div>
                                <label style="display:block; font-size:0.8rem; font-weight:700; text-transform:uppercase; margin-bottom:6px;">Your Name *</label>
                                <input type="text" placeholder="e.g. David Miller" style="width:100%; padding:12px; border:1px solid #E8E5DD; border-radius:6px;" required>
                            </div>
                            <div>
                                <label style="display:block; font-size:0.8rem; font-weight:700; text-transform:uppercase; margin-bottom:6px;">Email Address *</label>
                                <input type="email" placeholder="david@example.com" style="width:100%; padding:12px; border:1px solid #E8E5DD; border-radius:6px;" required>
                            </div>
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr 1.2fr; gap:16px; margin-bottom:16px;">
                            <div>
                                <label style="display:block; font-size:0.8rem; font-weight:700; text-transform:uppercase; margin-bottom:6px;">Check-in *</label>
                                <input type="date" style="width:100%; padding:12px; border:1px solid #E8E5DD; border-radius:6px;" required>
                            </div>
                            <div>
                                <label style="display:block; font-size:0.8rem; font-weight:700; text-transform:uppercase; margin-bottom:6px;">Check-out *</label>
                                <input type="date" style="width:100%; padding:12px; border:1px solid #E8E5DD; border-radius:6px;" required>
                            </div>
                            <div>
                                <label style="display:block; font-size:0.8rem; font-weight:700; text-transform:uppercase; margin-bottom:6px;">Suite *</label>
                                <select style="width:100%; padding:12px; border:1px solid #E8E5DD; border-radius:6px;">
                                    <option value="The Dutch Galle Master Suite (Rs. 68,000)">The Dutch Galle Master Suite (Rs. 68,000)</option>
                                    <option value="Kandyan Garden Plunge Villa (Rs. 56,000)">Kandyan Garden Plunge Villa (Rs. 56,000)</option>
                                    <option value="Lighthouse Ocean Horizon Suite (Rs. 60,000)">Lighthouse Ocean Horizon Suite (Rs. 60,000)</option>
                                    <option value="Ceylon Cinnamon Courtyard Room (Rs. 42,000)">Ceylon Cinnamon Courtyard Room (Rs. 42,000)</option>
                                    <option value="Entire Private Villa (Rs. 260,000)">Entire Private Villa (Rs. 260,000)</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-bottom:20px;">
                            <label style="display:block; font-size:0.8rem; font-weight:700; text-transform:uppercase; margin-bottom:6px;">Notes / Airport Transfer</label>
                            <textarea rows="3" placeholder="Let us know if you require CMB airport transfer, special celebrations, or dietary requests..." style="width:100%; padding:12px; border:1px solid #E8E5DD; border-radius:6px;"></textarea>
                        </div>
                        <button type="submit" style="width:100%; padding:16px; background:#12302B; color:#fff; font-weight:700; font-size:1rem; text-transform:uppercase; border:none; border-radius:6px; cursor:pointer;">
                            <i class="fa-solid fa-paper-plane"></i> Send Reservation Enquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
