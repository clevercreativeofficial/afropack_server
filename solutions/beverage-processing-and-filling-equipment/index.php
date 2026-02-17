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
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                'Beverage Processing Excellence',
                'Complete',
                'Beverage Solutions',
                'AFROPACK designs and supplies advanced production lines for juices, soft drinks, beer, and ice cream mixes, focusing on efficiency, reliability, and quality.',
            );
            ?>
        </div>
        <!-- Beverage Categories -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <!-- Juices & Beverages -->
            <div data-aos="fade-up" class="bg-white p-6 text-center">
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-glass-juice text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Juices & Beverages</h4>
                <p class="text-gray-600 mb-4">
                    Advanced production lines for high-quality fruit juices and soft drinks
                </p>
                <div class="flex justify-center">
                    <span class="beverage-badge juice-badge">Fruit Juices</span>
                </div>
            </div>

            <!-- Beer Processing -->
            <div data-aos="fade-up" class="bg-white p-6 text-center">
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-beer text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Beer Processing</h4>
                <p class="text-gray-600 mb-4">
                    Brewery systems for craft beer and large-scale industrial production
                </p>
                <div class="flex justify-center">
                    <span class="beverage-badge beer-badge">Brewery Systems</span>
                </div>
            </div>

            <!-- Ice Cream Mixes -->
            <div data-aos="fade-up" class="bg-white p-6 text-center">
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-ice-cream text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Ice Cream Mixes</h4>
                <p class="text-gray-600 mb-4">
                    Complete lines for ice cream mix preparation and processing
                </p>
                <div class="flex justify-center">
                    <span class="beverage-badge icecream-badge">Frozen Desserts</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Juices & Beverages Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div data-aos="fade-up" class="bg-white p-8 mb-16">
            <div data-aos="fade-up" class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Juices & Beverages</h3>
                    <p class="text-gray-600">Production units for high-quality fruit juices and soft drinks</p>
                </div>
            </div>

            <div data-aos="fade-up" class="grid lg:grid-cols-2 gap-12 mb-10">
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Market Requirements</h4>
                    <p class="text-gray-700 mb-6">
                        The fruit juice and soft drink market increasingly demands price competitiveness,
                        production efficiency, and reliability. Every hour of operation, every litre of product,
                        and every kilowatt of energy saved can make a significant difference.
                    </p>

                    <div data-aos="fade-up">
                        <h5 class="text-lg font-semibold text-gray-900 mb-4">Advanced Automation</h5>
                        <p class="text-gray-700 mb-4">
                            AFROPACK designs and supplies highly automated production lines where all operations
                            can be controlled from a single workstation, reducing human error and ensuring
                            repeatability and precision.
                        </p>
                        <ul data-aos="fade-up" class="feature-list space-y-2">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Single workstation control
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Reduced human error
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Enhanced repeatability
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Precision throughout production
                            </li>
                        </ul>
                    </div>
                </div>

                <div data-aos="fade-up">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Mixing & Blending Systems</h4>
                    <p class="text-gray-700 mb-6">
                        Our mixing and blending units rely on innovative technologies that guarantee a perfectly
                        homogeneous and natural product. Mixing can be performed in batches by the operator or
                        automatically through an in-line process.
                    </p>

                    <div class="space-y-4">
                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-mixer"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Flexible Mixing Options</h5>
                                <p class="text-gray-600 text-sm">
                                    Batch mixing by operator or automated in-line process
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-cog"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Customized Solutions</h5>
                                <p class="text-gray-600 text-sm">
                                    Optimal solution selection based on product requirements and costs
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-up" class="flex items-start gap-4">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-bottle"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Raw Materials</h5>
                                <p class="text-gray-600 text-sm">
                                    Lines designed for concentrates and powders as raw materials
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customized Systems -->
            <div data-aos="fade-up" class="mt-10 pt-10 border-t border-gray-200">
                <h4 class="text-xl font-bold text-gray-900 mb-6">Customized Systems</h4>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div data-aos="fade-up" class="bg-white border border-gray-200 p-5 text-center hover:border-accent transition-colors">
                        <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center bg-red-50 text-accent">
                            <i class="fi fi-rr-factory"></i>
                        </div>
                        <h5 class="font-semibold text-gray-900">Turnkey Beverage Plants</h5>
                    </div>
                    <div data-aos="fade-up" class="bg-white border border-gray-200 p-5 text-center hover:border-accent transition-colors">
                        <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center bg-red-50 text-accent">
                            <i class="fi fi-rr-temperature-high"></i>
                        </div>
                        <h5 class="font-semibold text-gray-900">Pasteurisers: HTST / ESL / UHT</h5>
                    </div>
                    <div data-aos="fade-up" class="bg-white border border-gray-200 p-5 text-center hover:border-accent transition-colors">
                        <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center bg-red-50 text-accent">
                            <i class="fi fi-rr-clean"></i>
                        </div>
                        <h5 class="font-semibold text-gray-900">CIP (Clean-in-Place) Plants</h5>
                    </div>
                    <div data-aos="fade-up" class="bg-white border border-gray-200 p-5 text-center hover:border-accent transition-colors">
                        <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center bg-red-50 text-accent">
                            <i class="fi fi-rr-robot"></i>
                        </div>
                        <h5 class="font-semibold text-gray-900">Process Automation Systems</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Beer Processing Section -->
<section class="bg-white section-padding">
    <div class="max-w-5xl mx-auto">
        <div data-aos="fade-up" class="content-box card-padding mb-16">
            <div data-aos="fade-up" class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Beer Processing</h3>
                    <p class="text-gray-600">Brewery systems for small-scale production or large volumes</p>
                </div>
            </div>

            <div data-aos="fade-up" class="grid lg:grid-cols-2 gap-12 mb-10">
                <div data-aos="fade-up">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Craft Beer Solutions</h4>
                    <p class="text-gray-700 mb-6">
                        AFROPACK offers solutions for the craft beer industry, developed with the support
                        of experienced master brewers. Our systems focus on flexibility, tailor-made configurations
                        based on on-site studies, efficiency, and scalable automation levels.
                    </p>

                    <div data-aos="fade-up">
                        <h5 class="text-lg font-semibold text-gray-900 mb-4">System Flexibility</h5>
                        <p class="text-gray-700 mb-4">
                            These systems allow brewers to develop and test different recipes while guaranteeing
                            excellent repeatability in production.
                        </p>
                        <ul data-aos="fade-up" class="feature-list space-y-2">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Recipe development and testing
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Excellent production repeatability
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Scalable automation levels
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                On-site configuration studies
                            </li>
                        </ul>
                    </div>
                </div>

                <div data-aos="fade-up">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Brewery Solutions Include</h4>
                    <div data-aos="fade-up" class="grid grid-cols-2 gap-4">
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Base & Specialty Malts</h5>
                            <p class="text-gray-600 text-xs">Management systems for malt handling</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Brewhouse</h5>
                            <p class="text-gray-600 text-xs">Complete brewing equipment</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Fermentation Tanks</h5>
                            <p class="text-gray-600 text-xs">Fermentation and maturation systems</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Water Tanks</h5>
                            <p class="text-gray-600 text-xs">Storage and process water management</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Auxiliary Equipment</h5>
                            <p class="text-gray-600 text-xs">Steam generators, chillers, compressors</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Separation Equipment</h5>
                            <p class="text-gray-600 text-xs">Centrifuges, filters, pasteurisers</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">CIP Systems</h5>
                            <p class="text-gray-600 text-xs">Cleaning-in-place systems</p>
                        </div>
                        <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2 text-sm">Automation</h5>
                            <p class="text-gray-600 text-xs">Process control and remote monitoring</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quality Assurance -->
            <div class="mt-10 pt-10 border-t border-gray-200">
                <div data-aos="fade-up" class="flex items-start gap-6">
                    <div class="min-w-12 h-12 flex items-center justify-center bg-red-100 text-red-700">
                        <i class="fi fi-rr-certificate"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold text-gray-900 mb-2">Quality Assurance Process</h5>
                        <p class="text-gray-600">
                            All equipment is tested in-house before shipment and assembled at the customer's premises.
                            We provide installation layout studies, on-site installation, commissioning, and training.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ice Cream Mixes Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="content-box card-padding mb-16">
            <div data-aos="fade-up" class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Ice Cream Mixes</h3>
                    <p class="text-gray-600">Complete lines dedicated to ice cream mix production and processing</p>
                </div>
            </div>

            <div data-aos="fade-up" class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Complete Processing Lines</h4>
                    <p class="text-gray-700 mb-6">
                        AFROPACK designs and supplies the entire ice cream mix preparation and processing line
                        up to ice cream production freezers.
                    </p>

                    <div data-aos="fade-up">
                        <h5 class="text-lg font-semibold text-gray-900 mb-4">Italian Collaboration</h5>
                        <p class="text-gray-700 mb-4">
                            We collaborate with leading Italian companies to supply complete lines including
                            freezers, extrusion systems, hardening tunnels, and packaging lines for cups,
                            cones, sticks, sandwiches, and more.
                        </p>
                        <ul data-aos="fade-up" class="feature-list space-y-2">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Freezers and extrusion systems
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Hardening tunnels
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Complete packaging lines
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Multiple product formats
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="space-y-8">
                        <div data-aos="fade-up">
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Production Capabilities</h4>
                            <p class="text-gray-700 mb-4">
                                Our lines are dedicated to the production and pasteurisation of ice cream mixes,
                                ensuring consistent quality and food safety throughout the process.
                            </p>
                            <div data-aos="fade-up" class="grid grid-cols-2 gap-4">
                                <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-red-50 text-accent">
                                        <i class="fi fi-rr-mixer"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Mix Preparation</h5>
                                </div>
                                <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-red-50 text-accent">
                                        <i class="fi fi-rr-temperature-high"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Pasteurisation</h5>
                                </div>
                                <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-red-50 text-accent">
                                        <i class="fi fi-rr-freezer"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Freezing Systems</h5>
                                </div>
                                <div data-aos="fade-up" class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-red-50 text-accent">
                                        <i class="fi fi-rr-package"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Packaging</h5>
                                </div>
                            </div>
                        </div>

                        <div data-aos="fade-up">
                            <h4 class="text-xl font-bold text-gray-900 mb-4">The System</h4>
                            <div class="flex flex-wrap gap-3">
                                <span class="bg-red-50 text-sm px-4 py-2 rounded-full border border-red-200">Ice Cream Plants</span>
                                <span class="bg-red-50 text-sm px-4 py-2 rounded-full border border-red-200">CIP Plants</span>
                                <span class="bg-red-50 text-sm px-4 py-2 rounded-full border border-red-200">Process Automation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partner Technology Section -->
<section class="bg-white section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Fraugroup Juices -->
            <div data-aos="fade-up" class="content-box p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-glass-juice text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Juice Technology</h4>
                <p class="text-gray-600 mb-4 text-sm">
                    Powered by Fraugroup's advanced machinery for juice and beverage production.
                </p>
                <a href="https://www.fraugroup.com/machinery-plants-production-juice-beverage/index.php"
                    target="_blank"
                    class="inline-flex items-center gap-2 text-accent font-semibold text-sm hover:text-accent-dark">
                    <span>Explore Fraugroup Juice Tech</span>
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Fraugroup Beer -->
            <div data-aos="fade-up" class="content-box p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-beer text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Beer Technology</h4>
                <p class="text-gray-600 mb-4 text-sm">
                    Advanced brewery systems from Fraugroup for industrial and craft beer production.
                </p>
                <a href="https://www.fraugroup.com/plant-machine-production-industrial-craft-beer/index.php"
                    target="_blank"
                    class="inline-flex items-center gap-2 text-accent font-semibold text-sm hover:text-accent-dark">
                    <span>Explore Fraugroup Beer Tech</span>
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>

            <!-- Fraugroup Ice Cream -->
            <div data-aos="fade-up" class="content-box p-6">
                <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                    <i class="fi fi-rr-ice-cream text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-3">Ice Cream Technology</h4>
                <p class="text-gray-600 mb-4 text-sm">
                    Complete ice cream mix production technology from Fraugroup.
                </p>
                <a href="https://www.fraugroup.com/ice-cream-mixed-blend-production-machine/index.php"
                    target="_blank"
                    class="inline-flex items-center gap-2 text-accent font-semibold text-sm hover:text-accent-dark">
                    <span>Explore Fraugroup Ice Cream Tech</span>
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php require_once ROOT_PATH . '/components/footer.php'; ?>

</body>

</html>