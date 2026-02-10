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
            src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
            alt="">
    </div>
</section>


<!-- Overview Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <?php
            render_header_section(
                'Industrial Equipment Solutions',
                'Advanced',
                'Processing & Packaging',
                'AFROPACK supplies and installs customized machines and complete lines for pharmaceutical packaging and home/personal care products, delivering genuine Italian manufacturing quality.',
            );
        ?>

        <!-- Pharma Packaging Section -->
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Solutions for Pharma Packaging</h3>
                    <p class="text-gray-600">Customized machines and complete lines for pharmaceutical packaging</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <p class="text-gray-700 mb-6">
                        All machines and systems are built in Italy, guaranteeing genuine Italian manufacturing
                        quality with precision engineering and strict quality control standards.
                    </p>

                    <div class="">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">African Service Network</h4>
                        <p class="text-gray-700 mb-4">
                            AFROPACK maintains close customer relationships across Africa through an extensive
                            network of Service Hubs in major countries, ensuring fast and reliable technical support.
                        </p>
                        <ul class="feature-list space-y-2">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Extensive network of Service Hubs across Africa
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Fast and reliable technical support
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Close customer relationship management
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Localized spare parts inventory
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-white text-accent">
                                <i class="fi fi-rr-factory"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Italian Manufacturing</h4>
                                <p class="text-gray-600">
                                    All equipment manufactured in Italy with precision engineering and quality control.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-customize"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Customized Solutions</h4>
                                <p class="text-gray-600">
                                    Tailored machines and complete lines designed for specific pharmaceutical applications.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="min-w-12 h-12 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-globe"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">African Presence</h4>
                                <p class="text-gray-600">
                                    Strong service network across major African countries for immediate support.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detergent Production Section -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <!-- Powder Detergent -->
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Powder Detergent Production Plants</h3>
                    <p class="text-gray-600">High-performance plants with unmatched efficiency and productivity</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <p class="text-gray-700 mb-6">
                        AFROPACK designs and supplies high-performance powder detergent plants, delivering
                        unmatched efficiency and productivity with full technical support from product formulation
                        to manufacturing optimization.
                    </p>

                    <div class="">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Sustainable Design Features</h4>
                        <ul class="feature-list space-y-2">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Energy-efficient systems for reduced operational costs
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Zero liquid effluents for environmental protection
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Exhaust gas treatment systems compliant with international standards
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Complete Packaging Solutions</h4>
                    <p class="text-gray-700 mb-4">
                        Plants are supplied and installed with VFFS packaging machines specifically engineered
                        for detergent powder packaging, featuring:
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 text-sm">High-Speed Production</h5>
                            <p class="text-gray-600 text-xs">Optimized for maximum throughput</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 text-sm">Powder Control</h5>
                            <p class="text-gray-600 text-xs">Aspiration systems at sealing</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 text-sm">Film Management</h5>
                            <p class="text-gray-600 text-xs">Electrostatic control solutions</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 text-sm">Quality Control</h5>
                            <p class="text-gray-600 text-xs">Density variation monitoring</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-200">
                <a href="https://www.mielepackaging.it/en/solutions-for-detergent-powder/"
                    target="_blank"
                    class="inline-flex items-center gap-2 text-accent font-semibold hover:text-accent-dark">
                    <span>Explore Miele Packaging Technology</span>
                    <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Liquid Detergent -->
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Liquid Detergent Production Plants</h3>
                    <p class="text-gray-600">Custom-designed plants for household and personal care products</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Production Capabilities</h4>
                    <p class="text-gray-700 mb-6">
                        Plants are designed for the production of household cleaning products (dishwashing liquids,
                        light-duty detergents) and personal care liquid products (shampoos, bath foams), with both
                        product types producible within the same manufacturing plant.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-3 bg-white border border-gray-200 p-4">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-house-chimney"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Household Products</h5>
                                <p class="text-gray-600 text-sm">Dishwashing liquids, light-duty detergents</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 bg-white border border-gray-200 p-4">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 text-accent">
                                <i class="fi fi-rr-bath"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Personal Care</h5>
                                <p class="text-gray-600 text-sm">Shampoos, bath foams, and body washes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Plant Features</h4>
                    <div class="space-y-4">
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2">Compact Layout</h5>
                            <p class="text-gray-600 text-sm">Optimized space utilization for efficient operations</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2">Easy Operation</h5>
                            <p class="text-gray-600 text-sm">User-friendly interfaces and controls</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2">Product Stability</h5>
                            <p class="text-gray-600 text-sm">Ensuring consistent product quality and homogeneity</p>
                        </div>
                        <div class="bg-white border border-gray-200 p-4">
                            <h5 class="font-semibold text-gray-900 mb-2">High Performance</h5>
                            <p class="text-gray-600 text-sm">Maximum operational efficiency and output</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="grid md:grid-cols-1 gap-8">
                    <div>
                        <h5 class="font-semibold text-gray-900 text-center mb-3">Filling Solutions</h5>
                        <p class="max-w-lg mx-auto text-center text-gray-600 text-sm">
                            Complete semi-automatic or fully automatic filling lines supplied, with special attention
                            to material selection for aggressive or corrosive products.
                        </p>
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="https://www.telm.it/en/filling-machines-chemical/detergents-washing-liquids"
                            target="_blank"
                            class="inline-flex items-center gap-2 text-accent text-center font-semibold hover:text-accent-dark">
                            <span>Explore TELM Detergent Technology</span>
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Packaging Technology Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-7xl mx-auto">
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Packaging Technology Solutions</h3>
                    <p class="text-gray-600">Complete packaging systems for pharmaceutical and personal care products</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Filling & Closing -->
                <div class="bg-white border p-6">
                    <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-bottle text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Filling & Closing</h4>
                    <ul class="space-y-2">
                        <li class="text-sm text-gray-600">• Easy-to-clean machines</li>
                        <li class="text-sm text-gray-600">• Bottom-up filling systems</li>
                        <li class="text-sm text-gray-600">• Adjustable filling speed</li>
                    </ul>
                    <div class="mt-4">
                        <a href="https://www.ferreromachines.com/en/index.html"
                            target="_blank"
                            class="text-sm text-accent font-semibold hover:text-accent-dark inline-flex items-center gap-1">
                            <span>Ferrero Machines</span>
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Labelling -->
                <div class="bg-white border p-6">
                    <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-label text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Labelling</h4>
                    <ul class="space-y-2">
                        <li class="text-sm text-gray-600">• Double-sided labels</li>
                        <li class="text-sm text-gray-600">• Full-wrap labelling</li>
                        <li class="text-sm text-gray-600">• Inkjet/TT printer integration</li>
                    </ul>
                    <div class="mt-4">
                        <a href="https://www.makrolabelling.com/"
                            target="_blank"
                            class="text-sm text-accent font-semibold hover:text-accent-dark inline-flex items-center gap-1">
                            <span>Makro Labelling</span>
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Secondary Packaging -->
                <div class="bg-white border p-6">
                    <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-boxes text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Secondary Packaging</h4>
                    <ul class="space-y-2">
                        <li class="text-sm text-gray-600">• Carton or shrink wrap</li>
                        <li class="text-sm text-gray-600">• End-of-line processes</li>
                        <li class="text-sm text-gray-600">• Palletising solutions</li>
                    </ul>
                    <div class="mt-4">
                        <a href="https://www.selematic.tech/en/"
                            target="_blank"
                            class="text-sm text-accent font-semibold hover:text-accent-dark inline-flex items-center gap-1">
                            <span>Selematic Tech</span>
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Soap Technologies -->
                <div class="bg-white border p-6">
                    <div class="w-14 h-14 mb-4 flex items-center justify-center bg-red-50 text-accent">
                        <i class="fi fi-rr-soap text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Soap Technologies</h4>
                    <ul class="space-y-2">
                        <li class="text-sm text-gray-600">• Soap manufacturing plants</li>
                        <li class="text-sm text-gray-600">• Glycerin production</li>
                        <li class="text-sm text-gray-600">• Complete processing lines</li>
                    </ul>
                    <div class="mt-4">
                        <a href="https://laferpack.com/home-care"
                            target="_blank"
                            class="text-sm text-accent font-semibold hover:text-accent-dark inline-flex items-center gap-1">
                            <span>Lafer Pack Solutions</span>
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cosmetics Packaging Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto">
        <div class="">
            <div class="flex items-center gap-4 mb-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Solutions for Cosmetics Packaging</h3>
                    <p class="text-gray-600">Complete packaging lines for the cosmetic industry</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Comprehensive Solutions</h4>
                    <p class="text-gray-700 mb-6">
                        AFROPACK supplies and installs a wide range of machines and complete packaging lines
                        for the cosmetic industry, capable of meeting all requirements—from standard applications
                        to complex, fully customized projects.
                    </p>

                    <div class="">
                        <h5 class="text-lg font-semibold text-gray-900 mb-4">Application Versatility</h5>
                        <ul class="feature-list space-y-2">
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Standard cosmetic packaging solutions
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Complex, fully customized projects
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Wide range of packaging formats
                            </li>
                            <li>
                                <i class="fi fi-rr-check-circle"></i>
                                Integration with existing production lines
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Cosmetic Product Range</h4>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-4 py-2 bg-red-50 rounded-full text-sm border border-red-200">Skincare</span>
                                <span class="px-4 py-2 bg-red-50 rounded-full text-sm border border-red-200">Makeup</span>
                                <span class="px-4 py-2 bg-red-50 rounded-full text-sm border border-red-200">Fragrances</span>
                                <span class="px-4 py-2 bg-red-50 rounded-full text-sm border border-red-200">Hair Care</span>
                                <span class="px-4 py-2 bg-red-50 rounded-full text-sm border border-red-200">Body Care</span>
                                <span class="px-4 py-2 bg-red-50 rounded-full text-sm border border-red-200">Spa Products</span>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Packaging Capabilities</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-pink-50 text-accent">
                                        <i class="fi fi-rr-bottle"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Bottle Filling</h5>
                                </div>
                                <div class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-pink-50 text-accent">
                                        <i class="fi fi-rr-tube"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Tube Filling</h5>
                                </div>
                                <div class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-pink-50 text-accent">
                                        <i class="fi fi-rr-jar"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Jar Filling</h5>
                                </div>
                                <div class="bg-white border border-gray-200 p-4">
                                    <div class="w-10 h-10 mb-3 flex items-center justify-center bg-pink-50 text-accent">
                                        <i class="fi fi-rr-pump"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 text-sm">Pump Systems</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-10 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="font-semibold text-gray-900">TELM Cosmetic Technology</h5>
                        <p class="text-gray-600 text-sm">Advanced filling machines for cosmetic applications</p>
                    </div>
                    <a href="https://www.telm.it/en/filling-machines-cosmetic"
                        target="_blank"
                        class="inline-flex items-center gap-2 text-accent font-semibold hover:text-accent-dark">
                        <span>Explore TELM Cosmetic Technology</span>
                        <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>

</html>