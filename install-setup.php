<?php
/**
 * Automated WordPress Initial Setup Script
 */
define('WP_INSTALLING', true);
require_once __DIR__ . '/wp-load.php';
require_once __DIR__ . '/wp-admin/includes/upgrade.php';
require_once __DIR__ . '/wp-admin/includes/translation-install.php';

echo "Checking if WordPress is already installed...\n";
if (is_blog_installed()) {
    echo "WordPress is already installed!\n";
} else {
    echo "Installing WordPress...\n";
    $result = wp_install(
        'Villa Galle Fort',       // Site Title
        'admin',                  // Admin Username
        'admin@villagalle.local', // Admin Email
        true,                     // Public (search engines allowed)
        '',                       // Deprecated
        'admin123'                // Admin Password
    );
    echo "WordPress installed successfully!\n";
    print_r($result);
}

// Set site options
update_option('blogdescription', 'Luxury Boutique Sanctuary in Galle Fort, Sri Lanka');
update_option('permalink_structure', '/%postname%/');

// Activate the Astra Child theme
echo "Activating astra-villa-child theme...\n";
switch_theme('astra-villa-child');
echo "Current theme is now: " . get_stylesheet() . " (Template: " . get_template() . ")\n";

echo "Setup completed successfully!\n";
