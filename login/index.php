<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/button.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AFROPACK GROUP - Food Processing and Packaging Company.">
    <meta name="keywords" content="Afropack Group, packaging, food processing,">
    <meta name="author" content="AFROPACK- Food Processing and Packaging Company">

    <title>AFROPACK - Login</title>

    <meta name="theme-color" content="#CE0B10">

    <!-- favicon -->
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-bg-alt">

    <!-- loader -->
    <div id="loader" class="fixed top-0 left-0 w-full h-full bg-white z-[100]">
        <div class="flex flex-col justify-center items-center gap-4 h-full">
            Loading...
            <div class="progress"></div>
        </div>
    </div>


    <!-- Login section -->
    <section class="relative h-screen flex flex-col justify-center items-center py-10">
        <div class="max-w-3xl mx-auto w-full md:bg-background bg-transparent flex">
            <div data-aos="fade-up" class="hidden md:block w-1/2">
                <img src="<?= $url ?>assets/images/machines (4).jpeg" alt="Afropack Logo" class="w-full h-full object-cover">
            </div>
            <form action="#" method="POST" class="space-y-6 w-full md:w-1/2 bg-white p-8 shadow-2xl shadow-gray-100">
                <div data-aos="fade-up" class="flex flex-col gap-2 mb-8">
                    <h3 class="text-3xl font-bold text-gray-900">Welcome Back</h3>
                    <p class="text-gray-600">Please login to continue</p>
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                        class="border-b border-gray-300 py-3 focus:ring-accent focus:border-accent outline-none duration-300"
                        placeholder="Your email address">
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="border-b border-gray-300 py-3 focus:ring-accent focus:border-accent outline-none duration-300"
                        placeholder="Your password">
                </div>
                <small class="block">Don't have an account? <a href="/" class="text-accent">Back to Homepage</a></small>

                <button type="submit" class="w-full bg-accent text-white px-8 py-4 font-semibold hover:bg-accent-dark duration-300 ease-in-out
                                   flex items-center justify-center gap-2 group">
                    Sign In to Dashboard
                </button>
            </form>
        </div>
    </section>

    <!-- custom color -->
    <script src="../assets/js/tailwind_config.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="../assets/js/slick_custom.js"></script>

    <!-- loader -->
    <script type="text/javascript" src="../assets/js/loader.js"></script>


</body>

</html>