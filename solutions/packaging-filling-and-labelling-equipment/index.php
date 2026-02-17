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
            src="https://images.unsplash.com/photo-1607082350899-7e105aa886ae?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBhY2thZ2luZyUyMG1hY2hpbmVyeXxlbnwwfHwwfHx8MA%3D%3D"
            alt="Packaging Machinery">
    </div>
</section>

<!-- Overview Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                'Packaging, Filling & Labelling Equipment',
                'Complete',
                'Packaging Solutions',
                'Afropack provides a comprehensive range of flexible packaging solutions, meeting every form, fill, and seal packaging requirement for diverse industries with precision and reliability.',
            );
            ?>
        </div>


        <!-- Main Content Card -->
        <div class="bg-white mb-16 shadow-2xl shadow-gray-200">
            <div data-aos="fade-up" class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="p-6 md:p-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Packaging Solutions Portfolio</h3>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        From horizontal and vertical form-fill-seal machines to thermoforming and vacuum packaging systems, AFROPACK delivers equipment that combines exceptional quality with competitive pricing.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        Our thermoforming machines stand out for their outstanding quality–price ratio, providing maximum packaging safety with fully automatic, fast, reliable, and precise operation.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Form Fill Seal</span>
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Thermoforming</span>
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Vacuum Packaging</span>
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Modified Atmosphere</span>
                    </div>
                </div>

                <div class="w-full h-64 md:h-80 lg:h-full overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                        alt="Fruit Processing Plant">
                </div>
            </div>
        </div>

        <!-- Vision & Mission Section -->
        <div class="bg-white mb-16 shadow-2xl shadow-gray-200 p-6 md:p-12">
            <div data-aos="fade-up" class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Vision & Mission</h3>
                    <p class="text-gray-600">Partnering for packaging excellence</p>
                </div>
            </div>

            <div data-aos="fade-up" class="grid lg:grid-cols-2 gap-12">
                <div data-aos="fade-up">
                    <div class="flex flex-col gap-4 mb-8">
                        <div class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                            <i class="fi fi-rr-eye text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-2">Our Vision</h4>
                            <p class="text-gray-700">
                                To be your long-term partner for complete flexible packaging solutions, exceeding expectations and providing high added-value equipment.
                            </p>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-up">
                    <div class="flex flex-col gap-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                            <i class="fi fi-rr-target text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-2">Our Mission</h4>
                            <p class="text-gray-700">
                                To deliver flexible packaging solutions precisely customized to your needs, highly reliable equipment, and responsive after-sales service and maintenance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" class="mt-8 pt-8 border-t border-gray-100">
                <p class="text-gray-700">
                    Our R&D department collaborates closely with customers to provide effective and efficient packaging solutions, supporting clients at every stage from initial consultation to post-sales assistance and ongoing machine maintenance.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Packaging Equipment Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                'Comprehensive Equipment Range',
                'Packaging',
                'Machinery Portfolio',
                'AFROPACK offers a wide range of packaging machinery, including flow wrap machines, vertical baggers, thermoforming machines, and vacuum packaging systems, designed to meet the diverse needs of our customers with precision and reliability.',
            );
            ?>
        </div>


        <!-- Packaging Equipment Grid -->
        <div class="grid grid-col-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-16">
            <!-- Flow Wrap HFFS -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-box-open text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Flow Wrap Machines HFFS</h4>
                <p class="text-gray-600 mb-4">Horizontal Form Fill & Seal solutions</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">High-speed horizontal packaging</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Versatile for various product types</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Precise and reliable operation</span>
                    </div>
                </div>
                <a href="https://www.laferpack.com/categories" target="_blank" class="mt-4 inline-flex items-center gap-2 text-accent text-sm font-medium">
                    <span>Learn more</span>
                    <i class="fi fi-rr-external-link"></i>
                </a>
            </div>

            <!-- Vertical Baggers VFFS -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-box-alt text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Vertical Baggers VFFS</h4>
                <p class="text-gray-600 mb-4">Vertical Form Fill & Seal systems</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Efficient vertical packaging lines</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Suitable for granular and powdered products</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Compact footprint design</span>
                    </div>
                </div>
                <a href="https://www.mielepackaging.it/en/automatic-lines/" target="_blank" class="mt-4 inline-flex items-center gap-2 text-accent text-sm font-medium">
                    <span>Learn more</span>
                    <i class="fi fi-rr-external-link"></i>
                </a>
            </div>

            <!-- Thermoforming Machines -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-cube text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Thermoforming Machines</h4>
                <p class="text-gray-600 mb-4">Exceptional quality–price ratio packaging</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Fully automatic and fast operation</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Outstanding packaging safety</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Suitable for vacuum and modified atmosphere</span>
                    </div>
                </div>
                <a href="https://bmbpack.com/en/tipologia/thermoforming-machines/" target="_blank" class="mt-4 inline-flex items-center gap-2 text-accent text-sm font-medium">
                    <span>Learn more</span>
                    <i class="fi fi-rr-external-link"></i>
                </a>
            </div>

            <!-- Vacuum & MAP Machines -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-wind text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Vacuum & MAP Machines</h4>
                <p class="text-gray-600 mb-4">Modified Atmosphere Packaging solutions</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Extended product shelf life</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Vacuum chamber and belt systems</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Precise gas flushing technology</span>
                    </div>
                </div>
                <div class="mt-4 space-y-2">
                    <a href="https://bmbpack.com/en/tipologia/vacuum-machines/" target="_blank" class="block text-accent text-sm font-medium hover:underline">Vacuum Machines</a>
                    <a href="https://bmbpack.com/en/tipologia/chamber-belt-vacuum-machines/" target="_blank" class="block text-accent text-sm font-medium hover:underline">Chamber Belt Systems</a>
                </div>
            </div>

            <!-- Additional Packaging Solutions -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-conveyor-belt text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Complete Packaging Lines</h4>
                <p class="text-gray-600 mb-4">End-to-end packaging solutions</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Tray sealers and sealing systems</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Shrinking and drying units</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Product handling and automation</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Counting and weighing machines</span>
                    </div>
                </div>
                <div class="mt-4 space-y-2">
                    <a href="https://bmbpack.com/en/tipologia/traysealers/" target="_blank" class="block text-accent text-sm font-medium hover:underline">Tray Sealers</a>
                    <a href="https://bmbpack.com/en/tipologia/shrinking-and-drying-units/" target="_blank" class="block text-accent text-sm font-medium hover:underline">Shrinking Units</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industry Expertise Section -->
<section class="bg-gray-50 section-padding">
    <div class="max-w-5xl mx-auto">

    <div data-aos="fade-up">
        <?php
        render_header_section(
            'Industry Expertise',
            'Serving',
            'Multiple Industries',
            'AFROPACK has dedicated industry managers with extensive hands-on experience in specific sectors, ensuring tailored packaging solutions that meet the unique needs of each industry we serve.',
        );
        ?>
    </div>
        

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- Food Industry -->
            <div data-aos="fade-up" class="bg-white p-6">
                <div class="text-accent mb-4 flex items-center justify-center w-14 h-14 bg-red-50">
                    <i class="fi fi-rr-utensils text-xl"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-3">Food Industry</h4>
                <p class="text-gray-600 text-sm">
                    Specialized packaging solutions for perishable and shelf-stable food products with focus on hygiene and preservation.
                </p>
            </div>

            <!-- Pharmaceutical -->
            <div data-aos="fade-up" class="bg-white p-6">
                <div class="text-accent mb-4 flex items-center justify-center w-14 h-14 bg-red-50">
                    <i class="fi fi-rr-pills text-xl"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-3">Pharmaceutical</h4>
                <p class="text-gray-600 text-sm">
                    Precision packaging for medical devices and pharmaceutical products meeting strict regulatory standards.
                </p>
            </div>

            <!-- Home & Personal Care -->
            <div data-aos="fade-up" class="bg-white p-6">
                <div class="text-accent mb-4 flex items-center justify-center w-14 h-14 bg-red-50">
                    <i class="fi fi-rr-soap text-xl"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-3">Home & Personal Care</h4>
                <p class="text-gray-600 text-sm">
                    Efficient packaging solutions for cosmetics, toiletries, and household products with aesthetic appeal.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Filling & Bottling Solutions Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6 md:p-12">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Filling, Capping & Labelling Technologies</h3>
                    <p class="text-gray-600">Complete bottling and packaging lines for diverse industries</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div data-aos="fade-up">
                    <p class="text-gray-700 mb-6">
                        AFROPACK provides advanced filling technologies offering versatile solutions for both small artisans and high-volume production facilities.
                    </p>

                    <h4 class="text-xl font-bold text-gray-900 mb-6">Complete Bottling & Packaging Lines</h4>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div data-aos="fade-up">
                            <h5 class="font-semibold text-gray-900 mb-3">Beverage Lines</h5>
                            <ul class="space-y-2 text-gray-600 text-sm">
                                <li class="flex items-start gap-2">
                                    <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                                    <span>Wine & Spirits plants</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                                    <span>Beer production facilities</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                                    <span>Water & CSD plants</span>
                                </li>
                            </ul>
                        </div>

                        <div data-aos="fade-up">
                            <h5 class="font-semibold text-gray-900 mb-3">Other Industries</h5>
                            <ul class="space-y-2 text-gray-600 text-sm">
                                <li class="flex items-start gap-2">
                                    <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                                    <span>Edible Oil & Food</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                                    <span>Home & Personal Care</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                                    <span>Chemical products</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <a href="https://www.ferreromachines.com/en/index.html" target="_blank" class="mt-8 inline-flex items-center gap-2 text-accent font-semibold hover:text-accent-dark">
                        <span>Explore Ferrero Machines Technology</span>
                        <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                    </a>
                </div>

                <div>
                    <div class="space-y-6">
                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-cog"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Machine Features</h4>
                                <p class="text-gray-600">
                                    Simple and robust mechanics with high-quality commercial components for reliable operation.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-precision-tool"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">High Precision</h4>
                                <p class="text-gray-600">
                                    Excellent accuracy in filling and closing containers with consistent results.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-shield-check"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Hygiene Standards</h4>
                                <p class="text-gray-600">
                                    Excellent washability ideal for food, chemical, and pharmaceutical industries.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-refresh"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Flexible Design</h4>
                                <p class="text-gray-600">
                                    Modular design allowing rapid and repeatable format changes for production flexibility.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- International Presence -->
        <div data-aos="fade-up" class="mt-16 text-center">
            <div class="bg-white shadow-2xl shadow-gray-200 p-6 md:p-12">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 mb-6 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-globe text-2xl mt-2"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">International Presence</h3>
                    <p class="text-gray-700 mb-6 max-w-2xl">
                        AFROPACK has established service hubs in 15 African countries, supported by our own network of sales and service subsidiaries and qualified service engineers. This extensive network makes us a key reference in the African packaging market.
                    </p>
                    <div class="inline-flex items-center gap-2 text-accent font-semibold">
                        <i class="fi fi-rr-marker"></i>
                        <span>15 African Countries Served</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>

</html>