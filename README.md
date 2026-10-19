# Villa Galle Fort — WordPress Boutique Guesthouse & Villa Website

A bespoke WordPress hospitality website built for a luxury Sri Lankan coastal villa in Galle Fort. Features a custom child theme, custom post types (`room`), Advanced Custom Fields (ACF) integration, a real-time weather REST API integration, and direct WhatsApp booking inquiry channels.

Designed specifically to match the hospitality and tourism clientele of agencies like **Smart eWorks**.

---

## 📸 Key Features

- **Custom Post Type (`room`) & Taxonomy (`room_category`):**
  - Managed completely via code in `functions.php` (no slow drag-and-drop post type plugins).
  - Custom admin list columns for Price/Night, Max Occupancy, and Bedding.
- **Advanced Custom Fields (ACF) Ready:**
  - Precision metadata fields: Nightly Price ($ USD), Max Guests, Bed Configuration, Room Size, Scenic View, and Amenities checklist.
  - JSON field group export included for 1-click import.
- **Tailored Single Room Template (`single-room.php`):**
  - Full-width hero with dynamic cover image and breadcrumbs.
  - 4-card key specifications grid (Capacity, Bedding, Size, View).
  - Amenities grid with Font Awesome icons.
  - Sticky direct-booking card with automated WhatsApp inquiry generation.
- **Rooms Archive & Showcase (`archive-room.php`):**
  - Responsive 3-column room grid with price badges and hover micro-animations.
  - Dedicated "Exclusive Whole-Villa Buyout" booking banner.
- **REST API Live Weather Widget (`[galle_weather]`):**
  - Live temperature, condition, and humidity fetched from Open-Meteo REST API for Galle Fort coordinates (`6.0535° N, 80.2210° E`).
  - Implements WordPress Transients API (2-hour caching) to ensure 0ms page load impact.
- **Direct WhatsApp Booking Engine:**
  - Floating WhatsApp widget with breathing pulse animation.
  - Context-aware dynamic messaging: pre-populates the exact room name and price when clicking from a room page.
- **Quick Availability Search Bar (`[villa_booking_bar]`):**
  - Check-in / Check-out date pickers with automatic date advancement.
  - Pre-populates contact and reservation inquiry forms via URL parameters.

---

## 📁 Project Directory Structure

```text
sri-lanka-villa-wordpress/
├── astra-villa-child/                   # The custom child theme
│   ├── style.css                        # Child theme headers & CSS variables
│   ├── functions.php                    # CPT, taxonomy, weather API, WhatsApp hooks
│   ├── single-room.php                  # Custom template for individual rooms
│   ├── archive-room.php                 # Custom template for rooms listing
│   └── assets/
│       ├── css/
│       │   └── villa-custom.css         # Luxury resort design system & responsive rules
│       └── js/
│           └── villa-custom.js          # Date validation & query param pre-fills
├── acf-export/
│   └── acf-room-fields.json             # 1-click ACF field group import
├── database/
│   └── sample-rooms-seed.sql            # 4 pre-configured Sri Lankan luxury suites
└── README.md                            # Documentation & CV guide
```

---

## 🚀 Setup & Installation (XAMPP Local Environment)

### 1. Database & Local Setup
1. Open XAMPP Control Panel and ensure **Apache** and **MySQL** are running.
2. In phpMyAdmin (`http://localhost/phpmyadmin/`), verify the database `villa_wp` exists.
3. Access your WordPress site at `http://localhost/villa_wp/` (or your configured virtual host).

### 2. Activate the Child Theme
1. Ensure the parent theme **Astra** is installed in `wp-content/themes/astra`.
2. Copy `astra-villa-child/` to `wp-content/themes/astra-villa-child/`.
3. In WordPress Admin, go to **Appearance → Themes** and activate **Villa Galle Fort - Astra Child**.
4. Go to **Settings → Permalinks**, select **Post name** (`/%postname%/`), and click **Save Changes** to flush rewrite rules.

### 3. Import Custom Fields (ACF)
1. Install and activate the free **Advanced Custom Fields** plugin.
2. Go to **Custom Fields → Tools → Import Field Groups**.
3. Select `acf-export/acf-room-fields.json` and click **Import JSON**.
4. You will now see the "Villa Room & Suite Details" panel on all Room edit screens!

### 4. Seed Sample Rooms
- Run `database/sample-rooms-seed.sql` in phpMyAdmin under `villa_wp`, or manually create rooms in **Villa Rooms → Add New Room**:
  - *The Dutch Galle Master Suite* (Rs. 68,000/night, 2 Guests)
  - *Kandyan Garden Plunge Villa* (Rs. 56,000/night, 3 Guests)
  - *Lighthouse Ocean Horizon Suite* (Rs. 60,000/night, 2 Guests)
  - *Ceylon Cinnamon Courtyard Room* (Rs. 42,000/night, 2 Guests)

---

## 💼 CV Points & Portfolio Description

Add these bullet points to your CV / Resume:

> **WordPress & Front-End Developer | Luxury Hospitality Website (Villa Galle Fort)**
> - Engineered a bespoke boutique villa website targeting the Sri Lankan tourism market with an Astra child theme and custom PHP.
> - Developed a Custom Post Type (`room`) and custom taxonomy with custom admin columns and Advanced Custom Fields (ACF) for dynamic room management.
> - Coded modular PHP templates (`single-room.php` and `archive-room.php`) featuring a 4-metric specifications bar, responsive amenities checklist, and sticky direct booking card.
> - Built an automated WhatsApp direct-booking engine that dynamically injects room metadata into prefilled inquiries (`wa.me` API).
> - Integrated an external weather REST API with WordPress Transients caching to display live Galle Fort weather with zero performance overhead.

---

## ✉️ Follow-Up Message to Smart eWorks

Use this draft when emailing or messaging Smart eWorks:

> **Subject:** Portfolio Project: Custom WordPress Villa & Direct Booking System (Galle Fort)
>
> Hi [Hiring Manager / Team at Smart eWorks],
>
> Knowing your focus on high-performing websites for Sri Lankan hospitality and tourism brands, I built a bespoke boutique villa website prototype: **Villa Galle Fort**.
>
> Key highlights of what I built:
> 1. **Custom PHP Development:** Rather than relying purely on page builders, I developed a custom `room` post type and taxonomy in an Astra child theme with clean PHP templates (`single-room.php` and `archive-room.php`).
> 2. **Advanced Custom Fields (ACF):** Configured structured metadata (nightly rates, guest limits, bed types, size, and amenities) so client staff can manage suites without touching layouts.
> 3. **Conversion & Direct Bookings:** Engineered a context-aware floating WhatsApp engine that auto-fills inquiry messages with the specific room and rate being browsed, bypassing OTA commissions.
> 4. **API Integration:** Implemented live Sri Lanka coastal weather via a REST API with transient caching for speed.
>
> You can inspect the theme code and structure on my GitHub here: [GitHub Repository Link].
>
> I would love the opportunity to bring these technical and design skills to the client projects at Smart eWorks. Looking forward to your thoughts!
>
> Best regards,  
> **Muflah**
