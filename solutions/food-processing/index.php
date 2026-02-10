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
            src="https://www.tnasolutions.com/wp-content/uploads/2024/06/TNA-website-Food-Processing-scaled.jpg"
            alt="">
    </div>
</section>

<!-- Overview Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-5xl mx-auto">

        <!-- Section Header -->
        <?php
        render_header_section(
            'Food Processing Solutions',
            'Comprehensive',
            'Food Industry Solutions',
            'AFROPACK delivers advanced machinery and automatic/semi-automatic systems for the production of high-quality food products across multiple categories.',
        );
        ?>

        <!-- Main Content Card -->
        <div class="bg-white mb-16 shadow-2xl shadow-gray-200">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="p-6 md:p-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Food Industry Equipment</h3>
                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                        We provide comprehensive machinery and automated systems for the production of food
                        products, partnering with industry leaders like Navatta Group to deliver cutting-edge
                        solutions.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="https://www.navattagroup.com/" target="_blank"
                            class="inline-flex items-center gap-2 text-accent font-semibold hover:underline">
                            <span>Explore Partner Solutions</span>
                            <i class="fi fi-rr-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>
                <div class="w-full h-64 md:h-80 lg:h-full overflow-hidden">
                    <img class="w-full h-full object-cover shadow-lg"
                        src="https://images.unsplash.com/photo-1675647699232-76b8f533b006?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Zm9vZCUyMHByb2Nlc3Npbmd8ZW58MHx8MHx8fDA%3D"
                        alt="Food Processing Equipment">
                </div>
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <!-- Pasta Category -->
            <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-flatbread text-xl mt-1"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Pasta Production</h4>
                <p class="text-gray-600 text-sm">
                    Complete systems for all pasta types with highest quality standards
                </p>
            </div>

            <!-- Snacks Category -->
            <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-pot text-xl mt- 1"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Snacks Processing</h4>
                <p class="text-gray-600 text-sm">
                    Advanced systems for pellets, chips, and fabricated snacks
                </p>
            </div>

            <!-- Cereals Category -->
            <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-wheat-awn text-xl mt-1"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Cereal Processing</h4>
                <p class="text-gray-600 text-sm">
                    Complete lines for breakfast cereals and instant products
                </p>
            </div>

            <!-- Coffee Category -->
            <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-coffee text-xl mt-1"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Coffee Processing</h4>
                <p class="text-gray-600 text-sm">
                    Comprehensive roasting, grinding, and packaging solutions
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pasta Production Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-2">Pasta Production Systems</h3>
                    <p class="text-gray-600">Ensuring the highest quality standards in pasta manufacturing</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Complete Process Lines</h4>
                    <ul class="feature-list space-y-3">
                        <li>
                            <i class="fi fi-rr-check-circle mt-1 inline-block"></i>
                            <span>Process lines for long pasta, short pasta, nests, lasagna, cannelloni</span>
                        </li>
                        <li>
                            <i class="fi fi-rr-check-circle mt-1 inline-block"></i>
                            <span>Special pasta and couscous production systems</span>
                        </li>
                        <li>
                            <i class="fi fi-rr-check-circle mt-1 inline-block"></i>
                            <span>Technologies for filled pasta, ravioli, and tortellini</span>
                        </li>
                        <li>
                            <i class="fi fi-rr-check-circle mt-1 inline-block"></i>
                            <span>Snack industry, breakfast cereals, and instant flour lines</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <a href="https://anselmoitalia.com/en/production-lines" target="_blank"
                            class="inline-flex items-center gap-2 text-accent font-semibold hover:underline">
                            <span>View Anselmo Italia Solutions</span>
                            <i class="fi fi-rr-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Specialized Pasta Plants</h4>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                            <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-flatbread"></i>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Short Pasta</h5>
                            <p class="text-gray-600 text-sm">Complete plants for various short pasta shapes</p>
                        </div>
                        <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                            <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-flatbread"></i>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Long Pasta</h5>
                            <p class="text-gray-600 text-sm">Production lines for spaghetti, fettuccine, etc.</p>
                        </div>
                        <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                            <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-wheat-awn"></i>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Couscous</h5>
                            <p class="text-gray-600 text-sm">Specialized couscous production systems</p>
                        </div>
                        <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                            <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-warehouse-alt"></i>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Storage Systems</h5>
                            <p class="text-gray-600 text-sm">For short pasta, special pasta, and nests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Snack & Cereal Processing Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-2">Snack & Cereal Processing</h3>
                    <p class="text-gray-600">Advanced technologies for snack and cereal production</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Snack Pellets</h4>
                            <p class="text-gray-700">
                                Starting from potato and cereal flours, our lines produce die-cut pellets,
                                chips, and 3D shapes with perfect consistency and quality.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Fabricated Snacks</h4>
                            <p class="text-gray-700">
                                Utilizing potato and cereal flours, this advanced technology produces
                                wet-fried chips with exceptional texture and flavor.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Breakfast Cereals</h4>
                            <p class="text-gray-700">
                                Complete systems for traditional cereal flakes, sugar-coated flakes,
                                and cereal-coated flakes to meet diverse market demands.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Direct Expanded Products</h4>
                            <p class="text-gray-700">
                                Advanced technology for direct-expanded products with sweet or savory coating,
                                offering versatile snack options.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Instant Powder</h4>
                            <p class="text-gray-700">
                                Specialized systems for the production of instant flours and baby food,
                                ensuring nutritional quality and easy preparation.
                            </p>
                        </div>

                        <div class="bg-red-50 p-6">
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Partner Technology</h4>
                            <p class="text-gray-700 mb-4">
                                Our solutions are powered by Fenitalia's advanced food processing technology,
                                ensuring industry-leading performance and reliability.
                            </p>
                            <a href="https://www.fenitalia.com/en/" target="_blank"
                                class="inline-flex items-center gap-2 text-accent font-semibold hover:underline">
                                <span>Explore Fenitalia Technology</span>
                                <i class="fi fi-rr-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Coffee Processing Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-2">Coffee Processing Systems</h3>
                    <p class="text-gray-600">Complete solutions from green coffee to packaged products</p>
                </div>
            </div>

            <!-- Coffee Roasting Section -->
            <div class="mb-12 p-6 bg-white shadow-2xl shadow-gray-200">
                <h4 class="text-2xl font-bold text-gray-900 mb-6">Coffee Roasters & Roasting Plants</h4>
                <div class="grid lg:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-700 mb-6">
                            A wide range of coffee roasters for every need, from small-sized models suitable
                            for specialty coffee shops and small artisan production to industrial models for
                            medium and large productions.
                        </p>
                        <ul class="feature-list space-y-3">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                <span>Integrated destoners for foreign body cleaning</span>
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                <span>Continuous chaff extraction systems</span>
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                <span>Optional green coffee loaders</span>
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                <span>Additional cyclones for cooling systems</span>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full h-64 md:h-80 lg:h-full overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                            alt="Coffee Roasting Equipment">
                    </div>
                </div>
            </div>

            <!-- Coffee Processing Systems -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Green Coffee Plants -->
                <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-leaf text-lg mt-1"></i>
                    </div>
                    <h5 class="text-xl font-bold text-gray-900 mb-4">Green Coffee Plants</h5>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Green coffee reception systems (jute bags, big bags, bulk)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Cleaning and mechanical/optical selection</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Pneumatic transport systems</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Custom storage silos and dosing systems</span>
                        </li>
                    </ul>
                </div>

                <!-- Roasted Coffee Plants -->
                <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-mug-hot text-lg mt-1"></i>
                    </div>
                    <h5 class="text-xl font-bold text-gray-900 mb-4">Roasted Coffee Plants</h5>
                    <p class="text-gray-700 mb-4">
                        Complete systems including cleaning, transport, storage silos, and mixing solutions
                        for consistent quality roasted coffee.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Complete processing systems</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Integrated storage solutions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Advanced mixing technology</span>
                        </li>
                    </ul>
                </div>

                <!-- Ground Coffee & Grinders -->
                <div class="bg-white p-6 shadow-2xl shadow-gray-200">
                    <div class="w-12 h-12 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-coffee-beans text-lg mt-1"></i>
                    </div>
                    <h5 class="text-xl font-bold text-gray-900 mb-4">Ground Coffee & Grinders</h5>
                    <p class="text-gray-700 mb-4">
                        Storage systems with natural or controlled degassing suitable for capsules, pods,
                        and vacuum packaging.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Industrial coffee grinders</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Suitable for capsule and pod packaging</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fi fi-rr-check-circle text-accent mt-1"></i>
                            <span>Large-scale production capabilities</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Partner Reference -->
            <div class="mt-12 text-center">
                <p class="text-gray-600 pb-3">Our coffee processing solutions feature IMF's advanced roasting
                    technology</p>
                <a href="https://www.imf-srl.com/en/coffee-roasters/" target="_blank"
                    class="inline-flex items-center gap-2 text-accent font-semibold hover:underline">
                    <span>Explore IMF Coffee Roasters</span>
                    <i class="fi fi-rr-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php require_once ROOT_PATH . '/components/footer.php'; ?>

</body>

</html>