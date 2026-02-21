<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';
?>
<!-- hero section -->
<section class="relative h-[40vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="w-full h-full overflow-hidden">
        <img class="w-full h-full object-cover"
            src="https://images.unsplash.com/photo-1523473827533-2a64d0d36748?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGRhaXJ5fGVufDB8fDB8fHww"
            alt="">
    </div>
</section>

<!-- Overview Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                'Dairy Processing Excellence',
                'Complete',
                'Diary Solutions',
                'AFROPACK specializes in designing, engineering, and supplying turnkey plants, processing lines, and equipment for raw milk processing and the production of milk-based products.',
            );
            ?>
        </div>


        <!-- Main Content Card -->
        <div data-aos="fade-up" class="bg-white mb-16 shadow-2xl shadow-gray-200">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="p-6 md:p-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Overview</h3>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        We deliver high-quality products, maximum yield, and the lowest investment costs through
                        customized and optimized solutions for each customer.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        Our focus is on delivering comprehensive solutions for raw milk processing and the
                        production of milk-based products such as butter, yogurt, ice-cream bases, whey, and its
                        derivatives.
                    </p>
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="bg-red-50 border border-red-200 py-2 px-4 text-sm rounded-full">Customized Solutions</span>
                        <span class="bg-red-50 border border-red-200 py-2 px-4 text-sm rounded-full">Maximum Yield</span>
                        <span class="bg-red-50 border border-red-200 py-2 px-4 text-sm rounded-full">Cost Efficiency</span>
                    </div>
                </div>
                <div class="w-full h-64 md:h-80 lg:h-full overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1523473827533-2a64d0d36748?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGRhaXJ5fGVufDB8fDB8fHww"
                        alt="Dairy Processing">
                </div>
            </div>
        </div>


        <!-- Dairy Products Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Milk & Derivatives -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                    <i class="fi fi-rr-milk text-xl mt-2"></i>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-3">Milk & Milk Derivatives</h4>
                <p class="text-gray-600 mb-4">
                    Complete processing solutions for fresh milk and various milk-based products
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Fresh milk processing</span>
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Milk derivatives production</span>
                    </li>
                </ul>
            </div>

            <!-- Yogurt Products -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                    <i class="fi fi-rr-glass text-xl mt-2"></i>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-3">Yogurt & Fermented Products</h4>
                <p class="text-gray-600 mb-4">
                    Advanced fermentation and processing systems for yogurt and cultured dairy products
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Yogurt production lines</span>
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Fermented dairy systems</span>
                    </li>
                </ul>
            </div>

            <!-- Cream & Butter -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                    <i class="fi fi-rr-cream text-xl mt-2"></i>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-3">Cream & Butter</h4>
                <p class="text-gray-600 mb-4">
                    Specialized equipment for cream separation and butter manufacturing
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Cream processing systems</span>
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Butter production lines</span>
                    </li>
                </ul>
            </div>

            <!-- Ice Cream -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                    <i class="fi fi-rr-ice-cream text-xl mt-2"></i>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-3">Ice Cream & Mixes</h4>
                <p class="text-gray-600 mb-4">
                    Complete systems for ice cream bases and frozen dessert manufacturing
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Ice cream mix production</span>
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Frozen dessert systems</span>
                    </li>
                </ul>
            </div>

            <!-- Cheese Products -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                    <i class="fi fi-rr-cheese text-xl mt-2"></i>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-3">Cheese Production</h4>
                <p class="text-gray-600 mb-4">
                    Complete cheese making systems including cream cheese, mascarpone, and ricotta
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Cream cheese systems</span>
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Soft cheese production</span>
                    </li>
                </ul>
            </div>

            <!-- Whey Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                    <i class="fi fi-rr-milk-alt text-xl mt-2"></i>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-3">Whey Processing</h4>
                <p class="text-gray-600 mb-4">
                    Advanced systems for whey recovery and processing into valuable derivatives
                </p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Whey recovery systems</span>
                    </li>
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fi fi-rr-check-circle text-accent"></i>
                        <span>Derivative processing</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Milk Treatment Process Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="mb-16">
            <!-- Section Header -->
            <div data-aos="fade-up">
                <?php
                render_header_section(
                    'Processing Solutions',
                    'Milk Treatment',
                    'Process',
                    'Complete turnkey plants covering the entire journey from raw material reception to final packaging.'
                );
                ?>
            </div>

            <div class="grid lg:grid-cols-1 gap-12">
                <div class="">
                    <!-- Process Steps -->
                    <div class="mb-8">
                        <h4 data-aos="fade-up" class="text-2xl font-bold text-center text-gray-900 mb-6">Complete Process Coverage</h4>
                        <div class="grid md:grid-cols-3 gap-4">

                            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-4 flex flex-col gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-check-circle mt-1 text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-gray-900">Raw Milk Reception</h5>
                                    <p class="text-gray-600 text-sm">Quality testing and initial processing</p>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-4 flex flex-col gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-check-circle mt-1 text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-gray-900">Separation & Standardization</h5>
                                    <p class="text-gray-600 text-sm">Precise fat content adjustment</p>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-4 flex flex-col gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-check-circle mt-1 text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-gray-900">Heat Treatment</h5>
                                    <p class="text-gray-600 text-sm">Pasteurization and UHT processing</p>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-4 flex flex-col gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-check-circle mt-1 text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-gray-900">Homogenization</h5>
                                    <p class="text-gray-600 text-sm">Particle size reduction and stabilization
                                    </p>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-4 flex flex-col gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-check-circle mt-1 text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-gray-900">Cooling Systems</h5>
                                    <p class="text-gray-600 text-sm">Temperature-controlled storage</p>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-4 flex flex-col gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-check-circle mt-1 text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-gray-900">Packaging Lines</h5>
                                    <p class="text-gray-600 text-sm">Automated filling and sealing</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="">
                    <h4 data-aos="fade-up" class="text-2xl font-bold text-center text-gray-900 mb-6">Types of Milk Treatment</h4>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div data-aos="fade-up" class="flex flex-col gap-3 bg-white shadow-2xl shadow-gray-200 p-4">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                <i class="fi fi-rr-temperature-high"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Fresh Pasteurized, ESL, and UHT Milk</h5>
                                <p class="text-gray-600 text-sm">Complete systems for various milk shelf-life
                                    requirements</p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex flex-col gap-3 bg-white shadow-2xl shadow-gray-200 p-4">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                <i class="fi fi-rr-glass"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Yogurt and Fermented Products</h5>
                                <p class="text-gray-600 text-sm">Specialized fermentation and processing equipment
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex flex-col gap-3 bg-white shadow-2xl shadow-gray-200 p-4">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                <i class="fi fi-rr-cream"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Cream and Butter</h5>
                                <p class="text-gray-600 text-sm">Complete cream separation and butter manufacturing
                                    lines</p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex flex-col gap-3 bg-white shadow-2xl shadow-gray-200 p-4">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                <i class="fi fi-rr-ice-cream"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Ice Cream and Ice Cream Mixes</h5>
                                <p class="text-gray-600 text-sm">Advanced systems for frozen dessert production</p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex flex-col gap-3 bg-white shadow-2xl shadow-gray-200 p-4">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-red-50 border border-red-200 text-accent flex-shrink-0">
                                <i class="fi fi-rr-cheese"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Cheese Production</h5>
                                <p class="text-gray-600 text-sm">Complete systems for cream cheese, mascarpone, and
                                    ricotta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-16 flex flex-col gap-12">
            <!-- Video Section Title -->
            <div class="text-center">
                <h4 data-aos="fade-up" class="text-2xl font-bold text-center text-gray-900 mb-6">Advanced Dairy Processing Solutions</h4>
                <p data-aos="fade-up" class="text-md text-gray-600 max-w-3xl mx-auto">Discover how our state-of-the-art dairy processing equipment can optimize your production line, improve efficiency, and deliver superior quality milk, cheese, and yogurt products.</p>
            </div>

            <div data-aos="fade-up" class="w-full md:w-1/2 h-64 md:h-80 lg:h-full overflow-hidden mx-auto">
                <iframe class="mx-auto w-full h-full aspect-video text-center" src="https://www.youtube.com/embed/vkYFV75FTNk?si=3FOBIgU9ygE7MK-u" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div data-aos="fade-up" class="max-w-2xl mx-auto mt-6 text-center">
                <p class="text-gray-600 pb-3">Our dairy processing solutions feature FRAUGROUP's advanced milk processing technology — from pasteurization and homogenization to cheese vats and membrane filtration systems, we provide complete integrated solutions for modern dairy facilities.</p>
                <a href="https://www.fraugroup.com/machines-plants-for-processing-milk-cheese-derivatives/index.php" target="_blank"
                    class="inline-flex items-center gap-2 text-accent font-semibold hover:underline">
                    <span>Explore FRAUGROUP Dairy Processing Systems</span>
                    <i class="fi fi-rr-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Customized Systems Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="mb-16">
            <h4 data-aos="fade-up" class="text-2xl font-bold text-center text-gray-900 mb-4">Customized Systems and Equipment</h4>
            <p data-aos="fade-up" class="text-gray-600 text-center mb-10">Wide range of equipment and turnkey solutions for dairy processing</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Turnkey Dairy Plants -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-milk-alt"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Turnkey Dairy Plants</h5>
                    <p class="text-gray-600 text-sm">
                        Complete end-to-end dairy processing facilities designed and installed
                    </p>
                </div>

                <!-- Pasteurizers -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-temperature-high"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Pasteurizers: HTST / ESL / UHT</h5>
                    <p class="text-gray-600 text-sm">
                        Advanced heat treatment systems for various milk processing requirements
                    </p>
                </div>

                <!-- Ultra Clean / Aseptic Tanks -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-sparkles"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Ultra Clean / Aseptic Tanks</h5>
                    <p class="text-gray-600 text-sm">
                        Hygienic storage solutions for sensitive dairy products
                    </p>
                </div>

                <!-- Milk Reception Lines -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-truck-loading"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Milk Reception Lines</h5>
                    <p class="text-gray-600 text-sm">
                        Complete systems for raw milk intake, testing, and storage
                    </p>
                </div>

                <!-- Yogurt Plants -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-glass"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Yogurt Plants</h5>
                    <p class="text-gray-600 text-sm">
                        Complete fermentation and processing systems for yogurt production
                    </p>
                </div>

                <!-- Mini Dairy Plants -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-milk"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Mini Dairy Plants</h5>
                    <p class="text-gray-600 text-sm">
                        Compact solutions for small to medium-scale dairy operations
                    </p>
                </div>

                <!-- Whey Processing Plants -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-glass"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Whey Processing Plants</h5>
                    <p class="text-gray-600 text-sm">
                        Specialized systems for whey recovery and value addition
                    </p>
                </div>

                <!-- CIP Plants -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-sparkles"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">CIP (Clean-in-Place) Plants</h5>
                    <p class="text-gray-600 text-sm">
                        Automated cleaning systems for maintaining dairy hygiene standards
                    </p>
                </div>

                <!-- Process Automation Systems -->
                <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 border border-red-200 text-accent">
                        <i class="fi fi-rr-robot"></i>
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 mb-3">Process Automation Systems</h5>
                    <p class="text-gray-600 text-sm">
                        Advanced control systems for optimized dairy processing operations
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<?php require_once ROOT_PATH . '/components/footer.php'; ?>

</body>

</html>