<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/constants.php';

// Define the base URL of the website
$current_URL = "http" . (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$title = ''; // Initialize an empty title variable

// Check the current URL and set the title accordingly
switch ($current_URL) {
    case $url:
        $title = 'AFROPACK - Food Processing and Packaging Company';
        break;

    case $url . 'about/':
        $title = 'AFROPACK - About Us';
        break;

    case $url . 'contact/':
        $title = 'AFROPACK - Contact Us';
        break;

    case $url . 'news-and-resources/brochures/':
        $title = 'AFROPACK - Brochures';
        break;

    case $url . 'news-and-resources/news/':
        $title = 'AFROPACK - News';
        break;

    case $url . 'news-and-resources/upcoming-events/':
        $title = 'AFROPACK - Upcoming Events';
        break;

    case $url . 'news-and-resources/videos/':
        $title = 'AFROPACK - Videos';
        break;

    case $url . 'solutions/beverage-processing-and-filling-equipment/':
        $title = 'AFROPACK - Beverage Processing & Filling Equipment';
        break;

    case $url . 'solutions/dairy-processing-equipment/':
        $title = 'AFROPACK - Dairy Processing Equipment';
        break;

    case $url . 'solutions/food-processing/':
        $title = 'AFROPACK - Food Processing';
        break;

    case $url . 'solutions/fruits-and-vegetable-processing-equipment/':
        $title = 'AFROPACK - Fruits & Vegetable Processing Equipment';
        break;

    case $url . 'solutions/packaging-filling-labelling-equipment/':
        $title = 'AFROPACK - Packaging, Filling & Labelling Equipment';
        break;

    case $url . 'solutions/pharma-home-and-personal-care-equipment/':
        $title = 'AFROPACK - Pharma & Home / Personal Care Equipment';
        break;

    case $url . 'login/':
        $title = 'AFROPACK - Login';
        break;

    case $url . 'not-found/':
        $title = 'AFROPACK - 404 Not Found';
        break;

    default:
        $title = 'AFROPACK - Food Processing and Packaging Company';
}

// Function to determine active menu item based on the current URL
function isActiveMenu($current_URL, $url)
{
    // Check for exact matches first
    if ($current_URL === $url . 'admin/') {
        return 'dashboard';
    }
    return '';
}

// Usage
$active_menu = isActiveMenu($current_URL, $url);
