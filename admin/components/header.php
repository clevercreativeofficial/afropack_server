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
    <meta name="description" content="AFROPACK GROUP - Admin Dashboard">
    <meta name="author" content="AFROPACK">

    <title>AFROPACK - Admin Dashboard</title>

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
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>


</head>

<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="sidebar bg-white w-64 shrink-0 text-gray-700 hidden md:flex flex-col border z-40">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10">
                    <img src="<?= $url ?>assets/images/logo/Logo_AfropackGroup.svg" alt="AFROPACK Logo">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">AFROPACK</h1>
                    <p class="text-xs text-gray-600">Admin Dashboard</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex-1 overflow-y-auto py-4">
            <div class="px-4 mb-6">
                <h3 class="text-xs uppercase tracking-wider text-gray-500 mb-2">Main</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="<?= $url ?>admin/"
                            class="<?= $active_menu === $url . 'admin/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-dashboard translate-y-0.5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 mb-6">
                <h3 class="text-xs uppercase tracking-wider text-gray-500 mb-2">Content Management</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="<?= $url ?>/admin/hero/"
                            class="<?= $active_menu === $url . 'admin/hero/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-picture translate-y-0.5"></i>
                            <span>Hero Carousel</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 mb-6">
                <h3 class="text-xs uppercase tracking-wider text-gray-500 mb-2">News & Resources</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="<?= $url ?>admin/news/" class="<?= $active_menu === $url . 'admin/news/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-bell translate-y-0.5"></i>
                            <span>News</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>admin/events/"
                            class="<?= $active_menu === $url . 'admin/events/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-calendar-day translate-y-0.5"></i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>admin/videos/"
                            class="<?= $active_menu === $url . 'admin/videos/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-play-alt translate-y-0.5"></i>
                            <span>Videos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>admin/brochures/"
                            class="<?= $active_menu === $url . 'admin/brochures/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-book translate-y-0.5"></i>
                            <span>Brochures</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 mb-6">
                <h3 class="text-xs uppercase tracking-wider text-gray-500 mb-2">Contact & Subscribers</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="<?= $url ?>admin/subscribers/"
                            class="<?= $active_menu === $url . 'admin/subscribers/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-users translate-y-0.5"></i>
                            <span>Subscribers</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4">
                <h3 class="text-xs uppercase tracking-wider text-gray-500 mb-2">System</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="<?= $url ?>admin/users/"
                            class="<?= $active_menu === $url . 'admin/users/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-user translate-y-0.5"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>admin/settings/"
                            class="<?= $active_menu === $url . 'admin/settings/' ? 'bg-accent text-white' : ' hover:bg-bg-alt hover:text-accent' ?> flex items-center gap-3 px-4 py-3">
                            <i class="fi fi-rr-settings translate-y-0.5"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#logout"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-accent text-accent hover:text-white">
                            <i class="fi fi-rr-sign-out-alt translate-y-0.5"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fi fi-rr-user text-gray-600 translate-y-0.5"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900">Admin User</p>
                    <p class="text-xs text-gray-600">Administrator</p>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-30 z-10 translate-x-[100%]"></div>
