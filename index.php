<?php
require_once __DIR__ . '/path.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';
?>

<!-- hero section -->
<section class="flex flex-col justify-center items-center overflow-hidden">
    <!-- carousel -->
    <div class="carousel bg-white w-full max-h-[415px] overflow-hidden">
        <div class="w-full h-[415px]">
            <img class="w-full h-full object-cover"
                src="https://www.tnasolutions.com/wp-content/uploads/2023/10/Website-Header-Image.png" alt="">
        </div>
        <div class="w-full h-[415px]">
            <img class="w-full h-full object-cover"
                src="https://www.tnasolutions.com/wp-content/uploads/2024/06/TNA-sections-header-scaled.jpg" alt="">
        </div>
        <div class="w-full h-[415px]">
            <img class="w-full h-full object-cover"
                src="https://www.tnasolutions.com/wp-content/uploads/2024/06/TNA-distribution-header.jpg" alt="">
        </div>
        <div class="w-full h-[415px]">
            <img class="w-full h-full object-cover"
                src="https://www.tnasolutions.com/wp-content/uploads/2024/06/TNA-equipment-upgrades-main-header.jpg"
                alt="">
        </div>
    </div>
</section>

<!-- Premium About -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-7xl mx-auto">

        <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
            <!-- Content Column -->
            <div data-aos="fade-up" class="flex flex-col justify-center">
                <div>
                    <h1 class="title text-gray-900 mb-6 leading-tight">
                        Advanced <span class="text-accent-dark">Processing & Packaging</span> Solutions
                    </h1>
                    <p class="paragraph mb-8 leading-relaxed">
                        AFROPACK delivers complete plants and advanced equipment for the food, beverage,
                        pharmaceutical, and home & personal care industries. We provide end-to-end solutions
                        that drive efficiency, reliability, and growth.
                    </p>
                </div>

                <!-- Key Features -->
                <div class="space-y-2 paragraph mb-8 text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fi fi-rr-check-circle mt-1"></i>
                        Complete plant solutions & individual equipment
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fi fi-rr-check-circle mt-1"></i>
                        Multiple industry expertise & customization
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fi fi-rr-check-circle mt-1"></i>
                        Advanced technology & sustainable solutions
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <?php
                    render_button(
                        "Find a solution",
                        "$url" . "contact",
                        "primary",
                        "sm:w-auto w-full text-center"
                    );
                    ?>
                </div>
            </div>

            <!-- Video Column -->
            <div data-aos="fade-up" class="relative">
                <!-- Video Container -->
                <div class="relative overflow-hidden shadow-2xl shadow-gray-200">
                    <div class="aspect-video">
                        <iframe class="w-full h-full"
                            src="https://www.youtube.com/embed/xGH1NwrBwc4?si=SOag-tpFP0Rm2tlr"
                            title="AFROPACK Solutions Video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Commit section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto w-full content-padding">
        <div class="flex flex-col gap-6">
            <div data-aos="fade-up" class="text-center mx-auto">
                <?php
                render_header_section(
                    "Trustedby Industry Leaders",
                    "Committed to Your",
                    "Success",
                    "At Afropack, we create and sustain food processing and packaging solutions that enable you to realize goals and exceed market expectations."
                );
                ?>
            </div>
            <div class="max-w-xlg mx-auto flex items-start md:flex-row flex-col gap-6">
                <div data-aos="fade-up" class="max-w-sm flex flex-col justify-center items-center overflow-hidden">
                    <img class="object-cover"
                        src="https://www.tnasolutions.com/wp-content/uploads/2024/06/Mask-Group-11.png" alt="">
                    <div class="relative bg-secondary p-4 w-full">
                        <h3 class="text-white text-2xl font-semibold mb-4 mt-6">
                            Engineering & Service Presence
                        </h3>
                        <p class="text-surface mb-4">
                            With Italian engineering, innovative technologies, and a strong service presence across
                            Africa, AFROPACK supports its customers with reliable, efficient, and customized
                            solutions—from raw material processing to final packaging.
                        </p>
                        <div class="absolute -bottom-10 -right-14 w-[80px] h-[80px] rotate-[130deg] bg-white"></div>
                    </div>
                </div>
                <div data-aos="fade-up" class="max-w-sm flex flex-col justify-center items-center overflow-hidden">
                    <img class="object-cover"
                        src="https://www.tnasolutions.com/wp-content/uploads/2024/06/Mask-Group-22.png" alt="">
                    <div class="relative bg-accent-dark p-4 w-full">
                        <h3 class="text-white text-2xl font-semibold mb-4 mt-6">
                            One Afropack, one extraordinary mission
                        </h3>
                        <p class="text-surface mb-4">
                            We partner with food and beverage manufacturers to create high-performing, customised
                            packaging solutions that meet operational goals and exceed market expectations. Our
                            systems deliver precision, efficiency, and scalability.
                        </p>
                        <div class="absolute -bottom-10 -right-14 w-[80px] h-[80px] rotate-[130deg] bg-white"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Solutions section - Card Grid with Icons -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                "Comprehensive Solutions",
                "Industry-Tailored",
                "Processing Solutions",
                "Complete processing and packaging solutions engineered for maximum efficiency, product consistency, and superior quality across diverse industries."
            );
            ?>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div data-aos="fade-up" class="bg-white card-padding">
                <div class="flex flex-col gap-4 mb-6">
                    <div class="w-14 h-14 flex items-center justify-center bg-red-50 border border-red-200 text-accent p-3">
                        <i class="fi fi-rr-utensils text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-gray-800 text-2xl font-bold">Food Processing</h3>
                </div>
                <p>Processing solutions for a wide range of food products, including:</p>
                <div class="my-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Pasta</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Snacks</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Cereals</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Coffee</span>
                    </div>
                </div>
                <hr>
                <p class="text-sm my-4">
                    These solutions are designed to ensure efficiency, product consistency, and high quality.
                </p>
                <a href="#" class="text-sm text-accent hover:underline">
                    Learn more
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Card 2 -->
            <div data-aos="fade-up" class="bg-white card-padding">
                <div class="flex flex-col gap-4 mb-6">
                    <div class="w-14 h-14 flex items-center justify-center bg-red-50 border border-red-200 text-accent p-3">
                        <i class="fi fi-rr-cheese text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-gray-800 text-2xl font-bold">Dairy Processing Equipment</h3>
                </div>
                <p>Complete dairy processing solutions for:</p>
                <div class="my-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Milk</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Yogurt</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Cheese</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Other dairy products</span>
                    </div>
                </div>
                <hr>
                <p class="text-sm my-4">
                    Covering the entire process from raw milk reception to processing, treatment, and packaging.
                </p>
                <a href="#" class="text-sm text-accent hover:underline">
                    Learn more
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Card 3 -->
            <div data-aos="fade-up" class="bg-white card-padding">
                <div class="flex flex-col gap-4 mb-6">
                    <div class="w-14 h-14 flex items-center justify-center bg-red-50 border border-red-200 text-accent p-3">
                        <i class="fi fi-rr-peach text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-gray-800 text-2xl font-bold">
                        Fruit & Vegetable Processing Equipment
                    </h3>
                </div>
                <p>
                    Machines and complete plants for the processing of continental and tropical fruits and vegetables,
                    producing:
                </p>
                <div class="my-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Juice</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Purées</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Concentrates</span>
                    </div>
                </div>
                <hr>
                <p class="text-sm my-4">These systems deliver high yields and superior product quality.
                </p>
                <a href="#" class="text-sm text-accent hover:underline">
                    Learn more
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Card 4 -->
            <div data-aos="fade-up" class="bg-white card-padding">
                <div class="flex flex-col gap-4 mb-6">
                    <div class="w-14 h-14 flex items-center justify-center bg-red-50 border border-red-200 text-accent p-3">
                        <i class="fi fi-rr-drink-alt text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-gray-800 text-2xl font-bold">
                        Beverage Processing & Filling Equipment
                    </h3>
                </div>
                <p>
                    Advanced production lines for:
                </p>
                <div class="my-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Juices</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Soft drinks</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Beer</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Other beverages</span>
                    </div>
                </div>
                <hr>
                <p class="text-sm my-4">Including mixing, pasteurization, filling, and packaging, with
                    high levels of automation and reliability.
                </p>
                <a href="#" class="text-sm text-accent hover:underline">
                    Learn more
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Card 5 -->
            <div data-aos="fade-up" class="bg-white card-padding">
                <div class="flex flex-col gap-4 mb-6">
                    <div class="w-14 h-14 flex items-center justify-center bg-red-50 border border-red-200 text-accent p-3">
                        <i class="fi fi-rr-hand-holding-heart text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-gray-800 text-2xl font-bold">
                        Pharma & Home / Personal Care Equipment
                    </h3>
                </div>
                <p>
                    Customized solutions for:
                </p>
                <div class="my-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Detergent products</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Cosmetic products</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Pharmaceutical products</span>
                    </div>
                </div>
                <hr>
                <p class="text-sm my-4">
                    Including powder and liquid processing, filling, capping,
                    labelling, and secondary packaging systems.
                </p>
                <a href="#" class="text-sm text-accent hover:underline">
                    Learn more
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Card 6 -->
            <div data-aos="fade-up" class="bg-white card-padding">
                <div class="flex flex-col gap-4 mb-6">
                    <div class="w-14 h-14 flex items-center justify-center bg-red-50 border border-red-200 text-accent p-3">
                        <i class="fi fi-rr-box-open text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-gray-800 text-2xl font-bold">
                        Packaging, Filling & Labelling Equipment
                    </h3>
                </div>
                <p>
                    A complete range of flexible and rigid packaging solutions, including:
                </p>
                <div class="my-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Form-fill-seal machines</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Bottling lines</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Filling systems</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Labelling equipment</span>
                        <span class="bg-red-50 border border-red-200 px-3 py-1 rounded-full text-sm">Automated packaging lines</span>
                    </div>
                </div>
                <hr>
                <p class="text-sm my-4">Fully automated packaging lines designed for multiple industries
                    with high-speed operation and reliability.</p>
                <a href="#" class="text-sm text-accent hover:underline">
                    Learn more
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Premium Partners Logo Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                "Trusted by Industry Leaders",
                "Our Valued",
                "Partners",
                "Collaborating with the world's most innovative companies to deliver exceptional solutions"
            );
            ?>
        </div>


        <!-- Logo Grid -->
        <div data-aos="fade-up" class="relative">
            <!-- Gradient Overlays (Optional) -->
            <div
                class="hidden lg:block absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none">
            </div>
            <div
                class="hidden lg:block absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none">
            </div>

            <!-- Logo Container -->
            <div class="relative overflow-hidden">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 md:gap-12">
                    <!-- Partner Logo Item -->
                    <div class="group relative">
                        <div class="aspect-square bg-white
                                 border border-gray-100 hover:border-gray-200 p-6 flex items-center justify-center">
                            <img class="w-full h-auto max-h-16 object-contain opacity-90 group-hover:opacity-100 
                                      transition-opacity duration-300 grayscale group-hover:grayscale-0"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/01/logo-1.png"
                                alt="Partner Company">
                        </div>
                        <!-- Hover Tooltip -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 
                                   group-hover:opacity-100 group-hover:-bottom-4 transition-all duration-300 z-20">
                            <div
                                class="bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg whitespace-nowrap">
                                Partner Company
                                <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-45 
                                           w-2 h-2 bg-gray-900"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Partner Logo Item -->
                    <div class="group relative">
                        <div class="aspect-square bg-white
                                 border border-gray-100 hover:border-gray-200 p-6 flex items-center justify-center">
                            <img class="w-full h-auto max-h-16 object-contain opacity-90 group-hover:opacity-100 
                                      transition-opacity duration-300 grayscale group-hover:grayscale-0"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/01/logo-1.png"
                                alt="Partner Company">
                        </div>
                        <!-- Hover Tooltip -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 
                                   group-hover:opacity-100 group-hover:-bottom-4 transition-all duration-300 z-20">
                            <div
                                class="bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg whitespace-nowrap">
                                Partner Company
                                <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-45 
                                           w-2 h-2 bg-gray-900"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Partner Logo Item -->
                    <div class="group relative">
                        <div class="aspect-square bg-white
                                 border border-gray-100 hover:border-gray-200 p-6 flex items-center justify-center">
                            <img class="w-full h-auto max-h-16 object-contain opacity-90 group-hover:opacity-100 
                                      transition-opacity duration-300 grayscale group-hover:grayscale-0"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/01/logo-1.png"
                                alt="Partner Company">
                        </div>
                        <!-- Hover Tooltip -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 
                                   group-hover:opacity-100 group-hover:-bottom-4 transition-all duration-300 z-20">
                            <div
                                class="bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg whitespace-nowrap">
                                Partner Company
                                <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-45 
                                           w-2 h-2 bg-gray-900"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Partner Logo Item -->
                    <div class="group relative">
                        <div class="aspect-square bg-white
                                 border border-gray-100 hover:border-gray-200 p-6 flex items-center justify-center">
                            <img class="w-full h-auto max-h-16 object-contain opacity-90 group-hover:opacity-100 
                                      transition-opacity duration-300 grayscale group-hover:grayscale-0"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/01/logo-1.png"
                                alt="Partner Company">
                        </div>
                        <!-- Hover Tooltip -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 
                                   group-hover:opacity-100 group-hover:-bottom-4 transition-all duration-300 z-20">
                            <div
                                class="bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg whitespace-nowrap">
                                Partner Company
                                <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-45 
                                           w-2 h-2 bg-gray-900"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Partner Logo Item -->
                    <div class="group relative">
                        <div class="aspect-square bg-white
                                 border border-gray-100 hover:border-gray-200 p-6 flex items-center justify-center">
                            <img class="w-full h-auto max-h-16 object-contain opacity-90 group-hover:opacity-100 
                                      transition-opacity duration-300 grayscale group-hover:grayscale-0"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/01/logo-1.png"
                                alt="Partner Company">
                        </div>
                        <!-- Hover Tooltip -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 
                                   group-hover:opacity-100 group-hover:-bottom-4 transition-all duration-300 z-20">
                            <div
                                class="bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg whitespace-nowrap">
                                Partner Company
                                <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-45 
                                           w-2 h-2 bg-gray-900"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Partner Logo Item -->
                    <div class="group relative">
                        <div class="aspect-square bg-white
                                 border border-gray-100 hover:border-gray-200 p-6 flex items-center justify-center">
                            <img class="w-full h-auto max-h-16 object-contain opacity-90 group-hover:opacity-100 
                                      transition-opacity duration-300 grayscale group-hover:grayscale-0"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/01/logo-1.png"
                                alt="Partner Company">
                        </div>
                        <!-- Hover Tooltip -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 
                                   group-hover:opacity-100 group-hover:-bottom-4 transition-all duration-300 z-20">
                            <div
                                class="bg-gray-900 text-white text-sm font-medium px-3 py-2 rounded-lg whitespace-nowrap">
                                Partner Company
                                <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-45 
                                           w-2 h-2 bg-gray-900"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Premium Events Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                "Industry Engagement",
                "Upcoming",
                "Events & Exhibitions",
                "Join us at premier industry events worldwide to explore innovations, network with experts, and discover cutting-edge processing solutions."
            );
            ?>
        </div>


        <!-- Events Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Event Card 1 -->
            <div data-aos="fade-up" class="group relative bg-white shadow-2xl shadow-gray-200 transition-all duration-300 
                       border border-gray-100 hover:border-accent/20 overflow-hidden">
                <!-- Event Date Badge -->
                <div class="absolute top-6 left-6 z-10">
                    <div class="bg-white bg-opacity-60 backdrop-blur-sm shadow-lg px-4 py-3 text-center">
                        <div class="text-accent-dark font-bold text-xl leading-none">5-7</div>
                        <div class="text-gray-600 text-sm font-medium mt-1">SEP</div>
                        <div class="text-gray-500 text-xs">2024</div>
                    </div>
                </div>

                <!-- Event Image -->
                <div class="relative h-56 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://plus.unsplash.com/premium_photo-1682147951156-5a8c1ed8b72f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGZvb2QlMjBwcm9jZXNzaW5nfGVufDB8fDB8fHww"
                        alt="Sustainable Food Processing Conference">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>

                <!-- Event Content -->
                <div class="p-6">
                    <h3
                        class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-accent-dark transition-colors">
                        Sustainable Food Processing Conference
                    </h3>

                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-gray-600">
                            <i class="fi fi-rr-calendar w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                            <span class="text-sm">September 5-7, 2024 • 3 Days</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fi fi-rr-marker w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                            <span class="text-sm">Tokyo International Forum, Japan</span>
                        </div>
                    </div>

                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">
                        Exploring sustainable technologies and practices in food processing,
                        focusing on energy efficiency, waste reduction, and circular economy principles.
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="#" class="inline-flex items-center text-accent-dark font-semibold group text-sm">
                            <span>View Details</span>
                            <i
                                class="fi fi-rr-angle-small-right w-4 h-4 ml-2 text-accent transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div data-aos="fade-up" class="group relative bg-white shadow-2xl shadow-gray-200 transition-all duration-300 
                       border border-gray-100 hover:border-accent/20 overflow-hidden">
                <!-- Event Date Badge -->
                <div class="absolute top-6 left-6 z-10">
                    <div class="bg-white bg-opacity-60 backdrop-blur-sm shadow-lg px-4 py-3 text-center">
                        <div class="text-accent-dark font-bold text-xl leading-none">5-7</div>
                        <div class="text-gray-600 text-sm font-medium mt-1">SEP</div>
                        <div class="text-gray-500 text-xs">2024</div>
                    </div>
                </div>

                <!-- Event Image -->
                <div class="relative h-56 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://images.unsplash.com/photo-1567613745630-541570172a15?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Zm9vZCUyMHByb2Nlc3Npbmd8ZW58MHx8MHx8fDA%3D"
                        alt="Sustainable Food Processing Conference">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>

                <!-- Event Content -->
                <div class="p-6">
                    <h3
                        class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-accent-dark transition-colors">
                        Sustainable Food Processing Conference
                    </h3>

                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-gray-600">
                            <i class="fi fi-rr-calendar w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                            <span class="text-sm">September 5-7, 2024 • 3 Days</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fi fi-rr-marker w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                            <span class="text-sm">Tokyo International Forum, Japan</span>
                        </div>
                    </div>

                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">
                        Exploring sustainable technologies and practices in food processing,
                        focusing on energy efficiency, waste reduction, and circular economy principles.
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="#" class="inline-flex items-center text-accent-dark font-semibold group text-sm">
                            <span>View Details</span>
                            <i
                                class="fi fi-rr-angle-small-right w-4 h-4 ml-2 text-accent transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div data-aos="fade-up" class="group relative bg-white shadow-2xl shadow-gray-200 transition-all duration-300 
                       border border-gray-100 hover:border-accent/20 overflow-hidden">
                <!-- Event Date Badge -->
                <div class="absolute top-6 left-6 z-10">
                    <div class="bg-white bg-opacity-60 backdrop-blur-sm shadow-lg px-4 py-3 text-center">
                        <div class="text-accent-dark font-bold text-xl leading-none">5-7</div>
                        <div class="text-gray-600 text-sm font-medium mt-1">SEP</div>
                        <div class="text-gray-500 text-xs">2024</div>
                    </div>
                </div>

                <!-- Event Image -->
                <div class="relative h-56 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://images.unsplash.com/photo-1532635241-17e820acc59f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Sustainable Food Processing Conference">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>

                <!-- Event Content -->
                <div class="p-6">
                    <h3
                        class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-accent-dark transition-colors">
                        Sustainable Food Processing Conference
                    </h3>

                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-gray-600">
                            <i class="fi fi-rr-calendar w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                            <span class="text-sm">September 5-7, 2024 • 3 Days</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fi fi-rr-marker w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                            <span class="text-sm">Tokyo International Forum, Japan</span>
                        </div>
                    </div>

                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">
                        Exploring sustainable technologies and practices in food processing,
                        focusing on energy efficiency, waste reduction, and circular economy principles.
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="#" class="inline-flex items-center text-accent-dark font-semibold group text-sm">
                            <span>View Details</span>
                            <i
                                class="fi fi-rr-angle-small-right w-4 h-4 ml-2 text-accent transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- view all events button -->
        <div data-aos="fade-up" class="mt-12 flex justify-center">
            <?php
            render_button(
                "View all events",
                "$url" . "news-and-resources/upcoming-events",
                "outline",
                "sm:w-auto w-full text-center"
            );
            ?>
        </div>
    </div>
</section>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>

<!-- Slick Carousel -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= $url ?>assets/js/slick_custom.js"></script>

</body>

</html>