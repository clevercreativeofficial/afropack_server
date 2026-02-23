<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/constants.php';

// Define the base URL of the website
$current_URL = "http" . (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$title = ''; // Initialize an empty title variable

// Check the current URL and set the title accordingly
switch ($current_URL) {
    case $url . 'admin/':
        $title = 'AFROPACK - Admin Dashboard';
        break;

    case $url . 'admin/hero/':
        $title = 'AFROPACK - Hero Carousel';
        break;

    case $url . 'admin/news/':
        $title = 'AFROPACK - Manage News';
        break;

    case $url . 'admin/events/':
        $title = 'AFROPACK - Manage Events';
        break;

    case $url . 'admin/videos/':
        $title = 'AFROPACK - Manage Videos';
        break;

    case $url . 'admin/brochures/':
        $title = 'AFROPACK - Manage Brochures';
        break;

    case $url . 'admin/subscribers/':
        $title = 'AFROPACK - Manage Subscribers';
        break;

    case $url . 'admin/settings/':
        $title = 'AFROPACK - Settings';
        break;

    case $url . 'admin/users/':
        $title = 'AFROPACK - Manage Users';
        break;

    default:
        $title = 'AFROPACK - Admin Dashboard';
}

// Function to determine active menu item
function getActiveMenu($current_URL, $base_url)
{
    // Define menu items with their paths and names
    $menu_items = [
        'admin' => $base_url . 'admin/',
        'hero' => $base_url . 'admin/hero/',
        'news' => $base_url . 'admin/news/',
        'events' => $base_url . 'admin/events/',
        'videos' => $base_url . 'admin/videos/',
        'brochures' => $base_url . 'admin/brochures/',
        'subscribers' => $base_url . 'admin/subscribers/',
        'users' => $base_url . 'admin/users/',
        'settings' => $base_url . 'admin/settings/',
    ];
    
    // Check each menu item
    foreach ($menu_items as $menu_name => $menu_url) {
        // Remove trailing slashes for comparison
        $current = rtrim($current_URL, '/');
        $menu = rtrim($menu_url, '/');
        
        // Check if current URL matches the menu URL
        if ($current === $menu) {
            return $menu_name;
        }
    }
    
    return '';
}

// Usage
$active_menu = getActiveMenu($current_URL, $url);