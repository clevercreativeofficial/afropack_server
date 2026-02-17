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
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                'Fruit & Vegetable Processing',
                'Advanced',
                'Processing Solutions',
                'AFROPACK designs and supplies machines and complete plants for the processing of fruit and vegetables, covering both continental and tropical fruits with the highest quality standards.',
            );
            ?>
        </div>
        <!-- Main Content Card -->
        <div data-aos="fade-up" class="bg-white mb-16 shadow-2xl shadow-gray-200">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="p-6 md:p-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Overview</h3>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        As an Italian manufacturer of fruit processing machinery, AFROPACK is committed to
                        delivering high-performance, flexible, and reliable processing solutions for natural,
                        concentrated, pasteurized, or sterilized juices and purées.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        Our solutions cover stone fruits, citrus fruits, and exotic tropical varieties,
                        all produced according to the highest quality standards.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Continental Fruits</span>
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Tropical Fruits</span>
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">High Performance</span>
                        <span class="bg-red-50 py-2 px-4 text-sm rounded-full">Italian Quality</span>
                    </div>
                </div>
                <div class="w-full h-64 md:h-80 lg:h-full overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                        alt="Fruit Processing Plant">
                </div>
            </div>
        </div>

        <!-- Specialized Machines Section -->
        <div data-aos="fade-up" class="bg-white mb-16 shadow-2xl shadow-gray-200 p-6 md:p-12">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Specialized Machines & Multi-Fruit Plants</h3>
                    <p class="text-gray-600">Optimized processes for maximum quality and flexibility</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <p class="text-gray-700 mb-6">
                        The R&D team at AFROPACK has developed optimized processes and specialized machines
                        to achieve top product quality for each specific fruit type.
                    </p>
                    <div class="">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Multi-Fruit Plant Benefits</h4>
                        <ul class="feature-list space-y-3 text-sm">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Greater flexibility in production planning
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Optimized productivity throughout the year
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Reduced investment costs through shared equipment
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Easy adaptation to seasonal fruit availability
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-leaf"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Dedicated Fruit Equipment</h4>
                                <p class="text-gray-600">
                                    Each fruit type has specialized machines designed for optimal processing
                                    and maximum yield.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-factory"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Integrated Plant Design</h4>
                                <p class="text-gray-600">
                                    Specialized machines can be integrated into multi-fruit processing plants
                                    for enhanced operational efficiency.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-quality"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Quality Optimization</h4>
                                <p class="text-gray-600">
                                    Each machine is designed to preserve the natural qualities and nutritional
                                    value of the fruit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fruit Processing Solutions Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                'Processing Solutions by Fruit Type',
                'Complete',
                'Processing Lines',
                'Specialized equipment and complete plants for various tropical and continental fruits.',
            );
            ?>
        </div>


        <!-- Fruit Types Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
            <!-- Avocado Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-avocado text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Avocado Processing</h4>
                <p class="text-gray-600 mb-4">Complete plants for high-quality avocado products</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Stainless steel washers with water immersion
                            systems</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Specialized destoners for maximum yield</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Fresh water rinsing before sorting</span>
                    </div>
                </div>
            </div>

            <!-- Banana Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-banana text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Banana Processing</h4>
                <p class="text-gray-600 mb-4">Complete systems from washing to aseptic filling</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Stainless steel washers and dedicated peeling
                            lines</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Nitrogen injection to prevent oxidation</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Pasteurization/sterilization with aseptic filling</span>
                    </div>
                </div>
            </div>

            <!-- Passion Fruit Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-fruit-apple text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Passion Fruit Processing</h4>
                <p class="text-gray-600 mb-4">Premium ingredient for mixed juices and beverages</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Dedicated extraction machines</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Highly accurate juice treatment processes</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Maximum yield and quality optimization</span>
                    </div>
                </div>
            </div>

            <!-- Pineapple Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-yellow-50 text-accent">
                    <i class="fi fi-rr-pineapple text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Pineapple Processing</h4>
                <p class="text-gray-600 mb-4">Specialized technologies for juice production</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Natural and concentrated pineapple juice</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Dedicated extractors minimizing peel contact</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Superior product quality preservation</span>
                    </div>
                </div>
            </div>

            <!-- Papaya Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-papaya text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Papaya Processing</h4>
                <p class="text-gray-600 mb-4">Complete processing lines for papaya products</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Washing, sorting, and deseeding systems</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Pulping and deaeration processes</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Sterilization with aseptic filling</span>
                    </div>
                </div>
            </div>

            <!-- Mango Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-mango text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Mango Processing</h4>
                <p class="text-gray-600 mb-4">High-quality juice and purée production</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Complete washing and sorting systems</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Customized destoners and pulp refining</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                        <span class="text-sm text-gray-600">Deaeration or concentration options</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Fruit Types -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <!-- Citrus Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-orange text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Citrus Processing</h4>
                <p class="text-gray-600 mb-4">Equipment for fresh juice and NFC pasteurized juice</p>
                <ul class="space-y-2">
                    <li class="text-sm text-gray-600">• Washing, rinsing, and sorting</li>
                    <li class="text-sm text-gray-600">• Juice extraction for fresh or concentrate</li>
                    <li class="text-sm text-gray-600">• Thermal treatment and aseptic filling</li>
                </ul>
            </div>

            <!-- Coconut Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-coconut text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Coconut Processing</h4>
                <p class="text-gray-600 mb-4">Complete plants for multiple coconut products</p>
                <ul class="space-y-2">
                    <li class="text-sm text-gray-600">• Coconut milk and cream</li>
                    <li class="text-sm text-gray-600">• Coconut oil and water</li>
                    <li class="text-sm text-gray-600">• Powder, copra, and desiccated flakes</li>
                </ul>
            </div>

            <!-- Tomato Processing -->
            <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-tomato text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Tomato Processing</h4>
                <p class="text-gray-600 mb-4">Dedicated machines and turnkey plants</p>
                <ul class="space-y-2">
                    <li class="text-sm text-gray-600">• Tomato sauce, ketchup, paste</li>
                    <li class="text-sm text-gray-600">• Washing, sorting, and refining</li>
                    <li class="text-sm text-gray-600">• Sterilization and aseptic filling</li>
                </ul>
            </div>
        </div>

        <!-- Plant Cleaning & Hygiene Section -->
        <div data-aos="fade-up" class="bg-white shadow-2xl shadow-gray-200 p-6">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Plant Cleaning & Hygiene</h3>
                    <p class="text-gray-600">Meeting international food-grade requirements</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Compliance & Cleanability</h4>
                    <p class="text-gray-700 mb-6">
                        All AFROPACK fruit and vegetable processing lines are designed to comply with
                        international food-grade requirements and maintain the highest hygiene standards.
                    </p>
                    <div>
                        <h5 class="text-lg font-semibold text-gray-900 mb-4">Key Features</h5>
                        <ul class="feature-list space-y-3">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Full compliance with international food safety standards
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Fully cleanable through automatic systems
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Integrated or centralized CIP (Clean-In-Place) systems
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Hygienic design for easy maintenance and cleaning
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-certificate"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">International Standards</h4>
                                <p class="text-gray-600">
                                    All equipment meets global food processing and hygiene standards for
                                    safe and reliable operation.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-robot"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Automated Cleaning</h4>
                                <p class="text-gray-600">
                                    Advanced CIP systems ensure thorough cleaning without manual intervention,
                                    reducing downtime and improving hygiene.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent shadow-sm">
                                <i class="fi fi-rr-shield-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Quality Assurance</h4>
                                <p class="text-gray-600">
                                    Hygienic design principles ensure consistent product quality and safety
                                    throughout the processing line.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div data-aos="fade-up" class="section-padding flex flex-col justify-center items-center">
            <p class="text-gray-700 mb-4 max-w-2xl text-center mx-auto">
                Our fruit and vegetable processing solutions incorporate advanced technology from
                Navatta Group, ensuring world-class performance, reliability, and efficiency in
                all processing applications.
            </p>
            <a href="https://www.navattagroup.com/" target="_blank"
                class="inline-flex items-center gap-2 text-accent font-semibold hover:text-accent-dark">
                <span>Explore Navatta Group Technology</span>
                <i class="fi fi-rr-external-link"></i>
            </a>
        </div>
    </div>
</section>


<!-- Footer -->
<?php require_once ROOT_PATH . '/components/footer.php'; ?>

</body>

</html>