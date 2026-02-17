<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/config/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AFROPACK GROUP - Food Processing and Packaging Company.">
    <meta name="keywords" content="Afropack Group, packaging, food processing,">
    <meta name="author" content="AFROPACK- Food Processing and Packaging Company">

    <title><?= $title ?></title>

    <!-- favicon -->
    <link rel="icon" href="<?= $url ?>assets/favicon.ico" type="image/x-icon">

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="<?= $url ?>assets/css/global.css">

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flaticon icons -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>

    <!-- Lucide Icons -->
    <!-- Development version -->
    <!-- <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script> -->
    <!-- Production version -->
    <!-- <script src="https://unpkg.com/lucide@latest"></script> -->

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- Notyf (Toast Notifications) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <style>
        .slick-dots {
            bottom: 20px;
        }

        .slick-dots li button:before {
            font-size: 8px;
            color: #fff;
            opacity: 0.5;
            transition: color 0.3s, opacity 0.3s;
        }

        .slick-dots li.slick-active button:before {
            color: #CE0B10;
            opacity: 1;
        }

        .slick-dotted.slick-slider {
            margin-bottom: 0;
        }

        /* Consistent spacing classes */
        .section-padding {
            padding: 2rem 1rem;
        }

        @media (min-width: 768px) {
            .section-padding {
                padding: 4rem 1rem;
            }
        }

        .content-padding {
            padding: 1.5rem;
        }

        @media (min-width: 768px) {
            .content-padding {
                padding: 2rem;
            }
        }

        .card-padding {
            padding: 2rem;
        }
    </style>

</head>

<body class="bg-bg-alt">

    <!-- loader -->
    <div id="loader" class="fixed top-0 left-0 w-full h-full bg-white z-[100]">
        <div class="flex flex-col justify-center items-center gap-4 h-full">
            Loading...
            <div class="progress"></div>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar sticky top-0 md:max-h-none max-h-[80px] bg-white bg-opacity-70 backdrop-blur-lg z-50">
        <div class="max-w-7xl m-auto px-3 flex justify-between items-center">

            <!-- Logo -->
            <div class="md:w-14 w-10 py-2">
                <a href="<?= $url ?>">
                    <img src="<?= $url ?>assets/images/logo/Logo_AfropackGroup.svg" alt="logo">
                </a>
            </div>

            <!-- NAV ITEMS -->
            <ul id="navItems" class="lg:relative fixed top-0 left-0 lg:bg-transparent bg-background
            lg:w-auto w-full min-h-screen lg:min-h-0 flex lg:flex-row flex-col text-sm text-text-color
            lg:items-center justify-start lg:px-0 px-10 lg:py-0 py-6 lg:gap-10 gap-6 -translate-x-[1024px] lg:-translate-x-0
            duration-500 z-50">

                <!-- Mobile Logo -->
                <div class="lg:hidden block w-16 pb-4">
                    <a href="<?= $url ?>">
                        <img class="w-10" src="<?= $url ?>assets/images/logo/Logo_AfropackGroup.svg" alt="logo">
                    </a>
                </div>

                <!-- HOME -->
                <li>
                    <a href="<?= $url ?>" class="<?= $active_menu === 'home' ? 'text-accent' : '' ?>">Home</a>
                </li>

                <!-- SOLUTIONS (Desktop) -->
                <li class="relative group hidden lg:block">
                    <a href="#" class="<?= $active_menu === 'solutions' ? 'text-accent' : '' ?> md:py-6 py-3 px-3 block group-hover:text-white group-hover:bg-accent duration-300">
                        Solutions
                        <i class="fi fi-rr-angle-small-down text-lg inline-block translate-y-1"></i>
                    </a>

                    <div
                        class="absolute left-0 top-full pt-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">

                        <div
                            class="absolute left-8 top-1 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-accent">
                        </div>

                        <ul class="w-[315px] bg-accent px-10 py-8 grid grid-cols-1 gap-4">
                            <li class="text-white flex items-center mt-2 gap-3">
                                <i class="fi fi-rr-utensils text-xl"></i>
                                <a href="<?= $url ?>solutions/food-processing/" class="py-1 hover:underline">Food Processing</a>
                            </li>

                            <li class="text-white flex items-center mt-2 gap-3">
                                <i class="fi fi-rr-cheese text-xl"></i>
                                <a href="<?= $url ?>solutions/dairy-processing-equipment/" class="py-1 hover:underline">Dairy Processing
                                    Equipment</a>
                            </li>

                            <li class="text-white flex items-center mt-2 gap-3">
                                <i class="fi fi-rr-peach text-xl"></i>
                                <a href="<?= $url ?>solutions/fruits-and-vegetable-processing-equipment/" class="py-1 hover:underline">Fruit & Vegetable Processing
                                    Equipment</a>
                            </li>

                            <li class="text-white flex items-center mt-2 gap-3">
                                <i class="fi fi-rr-drink-alt text-xl"></i>
                                <a href="<?= $url ?>solutions/beverage-processing-and-filling-equipment/" class="py-1 hover:underline">Beverage Processing &
                                    Filling Equipment</a>
                            </li>

                            <li class="text-white flex items-center mt-2 gap-3">
                                <i class="fi fi-rr-hand-holding-heart text-xl"></i>
                                <a href="<?= $url ?>solutions/pharma-home-and-personal-care-equipment/" class="py-1 hover:underline">Pharma & Home /
                                    Personal Care Equipment</a>
                            </li>

                            <li class="text-white flex items-center mt-2 gap-3">
                                <i class="fi fi-rr-box-open text-xl"></i>
                                <a href="<?= $url ?>solutions/packaging-filling-and-labelling-equipment/" class="py-1 hover:underline">Packaging, Filling &
                                    Labelling Equipment</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- SOLUTIONS (Mobile Accordion) -->
                <li class="lg:hidden">
                    <button class="w-full flex justify-between items-center py-3 font-medium"
                        onclick="toggleMobile(this)">
                        Solutions
                        <i class="fi fi-rr-angle-small-down text-lg"></i>
                    </button>

                    <ul class="pt-2 hidden flex-col gap-4 text-text-color">
                        <li class="flex items-center mt-2 gap-3 border-b py-2">
                            <i class="fi fi-rr-utensils"></i>
                            <a href="<?= $url ?>solutions/food-processing/" class="hover:underline">Food Processing</a>
                        </li>

                        <li class="flex items-center mt-2 gap-3 border-b py-2">
                            <i class="fi fi-rr-cheese"></i>
                            <a href="<?= $url ?>solutions/dairy-processing-equipment/" class="hover:underline">Dairy Processing Equipment</a>
                        </li>

                        <li class="flex items-center mt-2 gap-3 border-b py-2">
                            <i class="fi fi-rr-peach"></i>
                            <a href="<?= $url ?>solutions/fruitss-and-vegetable-processing/" class="hover:underline">Fruit & Vegetable Processing Equipment</a>
                        </li>

                        <li class="flex items-center mt-2 gap-3 border-b py-2">
                            <i class="fi fi-rr-drink-alt"></i>
                            <a href="<?= $url ?>solutions/beverage-processing-&-filling-equipment/" class="hover:underline">Beverage Processing & Filling
                                Equipment</a>
                        </li>

                        <li class="flex items-center mt-2 gap-3 border-b py-2">
                            <i class="fi fi-rr-hand-holding-heart"></i>
                            <a href="<?= $url ?>solutions/pharma-and-home-personal-care-equipment/" class="hover:underline">Pharma & Home / Personal
                                Care Equipment</a>
                        </li>

                        <li class="flex items-center mt-2 gap-3 py-2">
                            <i class="fi fi-rr-stethoscope"></i>
                            <a href="<?= $url ?>solutions/packaging-filling-labelling-equipment/" class="hover:underline">Packaging, Filling &
                                Labelling Equipment</a>
                        </li>
                    </ul>
                </li>

                <!-- ABOUT -->
                <li>
                    <a href="<?= $url ?>about/"
                        class="<?= $active_menu === 'about' ? 'text-accent' : '' ?> md:py-6 py-3 md:px-3 px-0 block md:hover:text-white md:hover:bg-accent duration-300">
                        About Us
                    </a>
                </li>

                <!-- NEWS (Desktop) -->
                <li class="relative group hidden lg:block">
                    <a href="#" class="<?= $active_menu === 'news-and-resources' ? 'text-accent' : '' ?> py-6 px-3 block group-hover:text-white group-hover:bg-accent duration-300">
                        News & Resources
                        <i class="fi fi-rr-angle-small-down text-lg inline-block translate-y-1"></i>
                    </a>

                    <div class="absolute left-0 top-full pt-3 opacity-0 invisible
                group-hover:opacity-100 group-hover:visible transition-all duration-300">

                        <div class="absolute left-8 top-1 w-0 h-0
                    border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-accent"></div>

                        <ul class="w-[315px] bg-accent px-10 py-8 grid grid-cols-1 gap-4">
                            <li class="text-white flex gap-3">
                                <i class="fi fi-rr-bell"></i>
                                <a href="<?= $url ?>news-and-resources/news/" class="hover:underline">News</a>
                            </li>
                            <li class="text-white flex gap-3">
                                <i class="fi fi-rr-calendar-day"></i>
                                <a href="<?= $url ?>news-and-resources/upcoming-events/" class="hover:underline">Upcoming
                                    Events</a>
                            </li>
                            <li class="text-white flex gap-3">
                                <i class="fi fi-rr-play-alt"></i>
                                <a href="<?= $url ?>news-and-resources/videos/" class="hover:underline">Videos</a>
                            </li>
                            <li class="text-white flex gap-3">
                                <i class="fi fi-rr-book"></i>
                                <a href="<?= $url ?>news-and-resources/brochures/" class="hover:underline">Brochures</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- NEWS (Mobile Accordion) -->
                <li class="lg:hidden">
                    <button class="w-full flex justify-between items-center py-3 font-medium"
                        onclick="toggleMobile(this)">
                        News & Resources
                        <i class="fi fi-rr-angle-small-down text-lg"></i>
                    </button>

                    <ul class="pl-3 pt-2 hidden flex-col gap-4 text-text-color">
                        <li class="flex gap-3 border-b py-2">
                            <i class="fi fi-rr-bell"></i>
                            <a href="<?= $url ?>news-and-resources/news/" class="hover:underline">News</a>
                        </li>

                        <li class="flex gap-3 border-b py-2">
                            <i class="fi fi-rr-calendar-day"></i>
                            <a href="<?= $url ?>news-and-resources/upcoming-events/" class="hover:underline">Upcoming Events</a>
                        </li>

                        <li class="flex gap-3 border-b py-2">
                            <i class="fi fi-rr-play-alt"></i>
                            <a href="<?= $url ?>news-and-resources/videos/" class="hover:underline">Videos</a>
                        </li>

                        <li class="flex gap-3 py-2">
                            <i class="fi fi-rr-book"></i>
                            <a href="<?= $url ?>news-and-resources/brochures/" class="hover:underline">Brochures</a>
                        </li>
                    </ul>
                </li>

                <!-- CONTACT -->
                <a href="<?= $url ?>contact/"
                    class="<?= $active_menu === 'contact' ? 'text-accent' : '' ?> py-3 px-3 lg:py-6 flex justify-center items-center gap-2 min-w-[125px] bg-accent text-white">
                    <i class="fi fi-rr-envelope translate-y-0.5"></i>
                    Contact Us
                </a>
            </ul>

            <!-- MOBILE MENU ICON -->
            <div id="menu-bar"
                class="hamburger lg:hidden w-8 h-8 flex items-center justify-center bg-accent text-white cursor-pointer z-50">
                <i class="fi fi-rr-bars text-lg translate-y-0.5"></i>
            </div>

        </div>
    </nav>