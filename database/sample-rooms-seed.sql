-- =========================================================================
-- Villa Galle Fort - Sample Rooms Seed Data
-- Database: villa_wp
-- Description: Inserts sample luxury rooms with meta fields into WordPress
-- =========================================================================

-- Note: Run this script after initial WordPress installation on database `villa_wp`

-- 1. Insert Room 1: The Dutch Galle Master Suite
INSERT INTO wp_posts (
    post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
    post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt,
    post_type, comment_count
) VALUES (
    1, NOW(), NOW(),
    'An ode to 17th-century craftsmanship and oceanfront serenity. Featuring soaring timber-beam ceilings, authentic Sri Lankan teak antiques, and double mahogany French doors opening directly to your private verandah overlooking the ramparts.\n\nWake up to the gentle murmur of the Indian Ocean, indulge in breakfast served on your terrace, and unwind in the hand-carved stone soaking tub.',
    'The Dutch Galle Master Suite',
    'Soaring timber-beam ceilings, authentic Sri Lankan teak antiques, and panoramic Indian Ocean views.',
    'publish', 'closed', 'closed', 'dutch-galle-master-suite', NOW(), NOW(),
    'room', 0
);

SET @room1_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@room1_id, 'room_price', '220'),
(@room1_id, 'room_guests', '2'),
(@room1_id, 'bed_type', 'Four-Poster Teak King Bed'),
(@room1_id, 'room_size', '65 m² / 700 sq.ft'),
(@room1_id, 'room_view', 'Panoramic Ramparts & Indian Ocean');


-- 2. Insert Room 2: Kandyan Garden Plunge Villa
INSERT INTO wp_posts (
    post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
    post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt,
    post_type, comment_count
) VALUES (
    1, NOW(), NOW(),
    'Nestled amidst lush bougainvillea and frangipani blossoms, this secluded chalet features its own private outdoor plunge pool and sun deck.\n\nDesigned for ultimate privacy, the villa includes an en-suite open-air tropical rain shower, artisanal wicker loungers, and complimentary afternoon Ceylon tea service delivered to your poolside cabana.',
    'Kandyan Garden Plunge Villa',
    'Secluded chalet with private plunge pool, frangipani gardens, and outdoor rain shower.',
    'publish', 'closed', 'closed', 'kandyan-garden-plunge-villa', NOW(), NOW(),
    'room', 0
);

SET @room2_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@room2_id, 'room_price', '185'),
(@room2_id, 'room_guests', '3'),
(@room2_id, 'bed_type', 'King Size Canopy Bed'),
(@room2_id, 'room_size', '58 m² / 624 sq.ft'),
(@room2_id, 'room_view', 'Private Pool & Frangipani Garden');


-- 3. Insert Room 3: Lighthouse Ocean Horizon Suite
INSERT INTO wp_posts (
    post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
    post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt,
    post_type, comment_count
) VALUES (
    1, NOW(), NOW(),
    'Perched on the upper tier of the villa, commanding unhindered views of the historic Galle Lighthouse and fiery tropical sunsets.\n\nRelax on the expansive cushioned balcony daybed as passing sailboats dot the horizon. Includes high-speed fiber Wi-Fi, Nespresso and single-estate Ceylon tea maker, and evening cocktail turndown service.',
    'Lighthouse Ocean Horizon Suite',
    'Upper-level suite with direct vistas of Galle Lighthouse and sweeping sunset horizons.',
    'publish', 'closed', 'closed', 'lighthouse-ocean-horizon-suite', NOW(), NOW(),
    'room', 0
);

SET @room3_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@room3_id, 'room_price', '195'),
(@room3_id, 'room_guests', '2'),
(@room3_id, 'bed_type', 'King Size Canopy Bed'),
(@room3_id, 'room_size', '50 m² / 538 sq.ft'),
(@room3_id, 'room_view', 'Galle Lighthouse & Sunset Horizon');


-- 4. Insert Room 4: Ceylon Cinnamon Courtyard Room
INSERT INTO wp_posts (
    post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
    post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt,
    post_type, comment_count
) VALUES (
    1, NOW(), NOW(),
    'A tranquil sanctuary surrounding our central lotus pond. Breezy corridors, hand-poured encaustic tiles, and soothing water features create a peaceful haven after a day exploring the cobblestone streets of Galle Fort.\n\nFitted with luxury organic cotton linens, quiet inverter air conditioning, and a writing desk handcrafted from reclaimed railway timbers.',
    'Ceylon Cinnamon Courtyard Room',
    'Peaceful courtyard sanctuary surrounding the lotus pond with hand-poured encaustic tiles.',
    'publish', 'closed', 'closed', 'ceylon-cinnamon-courtyard-room', NOW(), NOW(),
    'room', 0
);

SET @room4_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
(@room4_id, 'room_price', '140'),
(@room4_id, 'room_guests', '2'),
(@room4_id, 'bed_type', 'Queen Size Heritage Bed'),
(@room4_id, 'room_size', '42 m² / 452 sq.ft'),
(@room4_id, 'room_view', 'Central Lotus Pond Courtyard');
