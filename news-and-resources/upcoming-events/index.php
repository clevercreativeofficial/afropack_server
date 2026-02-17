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
            src="https://www.tnasolutions.com/wp-content/uploads/2024/01/TNA-up-coming-events-main-header.jpg" alt="">
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
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div data-aos="fade-up" class="max-w-7xl mx-auto w-full bg-white content-padding">
        <div class="min-h-[30vh] flex flex-col justify-center items-center text-center gap-6">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800">
                Let's Build Your Success <span class="text-accent">Together</span>
            </h2>

            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Our team of experts is ready to help you find the perfect solution for your processing and packaging
                needs.
            </p>
            <?php
            render_button(
                "Contact Us",
                "$url" . "contact",
                "outline",
            );
            ?>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
require_once ROOT_PATH . '/components/footer.php';
?>

</body>

</html>