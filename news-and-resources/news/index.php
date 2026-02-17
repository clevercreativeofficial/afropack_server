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
            src="https://www.tnasolutions.com/wp-content/uploads/2024/06/Preziosi-1-1-scaled.jpg" alt="">
    </div>
</section>

<!-- News Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mx-auto">
            <!-- Header Section -->
            <div data-aos="fade-up">
                <?php
                render_header_section(
                    "Latest News & Updates",
                    "Complete Confectionery Line Capabilities at",
                    "ProSweets 2026",
                    "As a leading packaging solutions partner for more than four decades, you can trust we have seen, addressed and overcome even the most difficult production challenges. Our advanced packaging systems are adding value to businesses and manufacturers worldwide."
                );
                ?>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 pb-16">
            <!-- News Item 1 -->
            <div class="bg-white border border-gray-200 group duration-300 transition-all">
                <div data-aos="fade-up" class="relative h-48 w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://www.tnasolutions.com/wp-content/uploads/2024/06/Preziosi-1-1-scaled.jpg"
                        alt="Complete confectionery line capabilities">
                    <div class="absolute top-3 left-3 bg-accent px-3 py-1">
                        <small class="text-white font-medium">August 27</small>
                    </div>
                </div>
                <div data-aos="fade-up" class="p-6">
                    <a href="#" class="block group-hover:text-accent transition-colors duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                            Complete confectionery line capabilities
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            As a leading packaging solutions partner for more than four decades, we deliver innovative
                            solutions for modern production needs.
                        </p>
                    </a>
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-accent font-medium text-sm hover:text-gray-900 transition-colors duration-300 flex items-center">
                            Read More
                            <i class="fi fi-rr-arrow-small-right ml-2 mt-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- News Item 2 -->
            <div data-aos="fade-up" class="bg-white border border-gray-200 group duration-300 transition-all">
                <div class="relative h-48 w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://www.tnasolutions.com/wp-content/uploads/2024/09/1_Visitors-at-the-TNA-Innovation-Centre-for-Feeding-Ambitions-A-TNA-Open-House.png"
                        alt="Innovation Centre Visitors">
                    <div class="absolute top-3 left-3 bg-accent px-3 py-1">
                        <small class="text-white font-medium">September 15</small>
                    </div>
                </div>
                <div class="p-6">
                    <a href="#" class="block group-hover:text-accent transition-colors duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                            Innovation Centre hosts industry leaders
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Recent open house event showcased cutting-edge automation solutions to key industry partners
                            and manufacturers.
                        </p>
                    </a>
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-accent font-medium text-sm hover:text-gray-900 transition-colors duration-300 flex items-center">
                            Read More
                            <i class="fi fi-rr-arrow-small-right ml-2 mt-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- News Item 3 -->
            <div data-aos="fade-up" class="bg-white border border-gray-200 group duration-300 transition-all">
                <div class="relative h-48 w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://www.tnasolutions.com/wp-content/uploads/2025/06/Nadia-Award-2025.png"
                        alt="NADIA Award 2025">
                    <div class="absolute top-3 left-3 bg-accent px-3 py-1">
                        <small class="text-white font-medium">June 5</small>
                    </div>
                </div>
                <div class="p-6">
                    <a href="#" class="block group-hover:text-accent transition-colors duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                            NADIA Award recognition 2025
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Honored for innovation in sustainable packaging solutions at the annual industry awards
                            ceremony.
                        </p>
                    </a>
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-accent font-medium text-sm hover:text-gray-900 transition-colors duration-300 flex items-center">
                            Read More
                            <i class="fi fi-rr-arrow-small-right ml-2 mt-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- News Item 4 -->
            <div data-aos="fade-up" class="bg-white border border-gray-200 group duration-300 transition-all">
                <div class="relative h-48 w-full overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://www.tnasolutions.com/wp-content/uploads/2024/12/62nd-AEA-scaled.jpg"
                        alt="62nd AEA Conference">
                    <div class="absolute top-3 left-3 bg-accent px-3 py-1">
                        <small class="text-white font-medium">December 12</small>
                    </div>
                </div>
                <div class="p-6">
                    <a href="#" class="block group-hover:text-accent transition-colors duration-300">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                            62nd AEA Conference participation
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Showcasing latest advancements in food processing automation at the premier industry
                            conference.
                        </p>
                    </a>
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="#"
                            class="text-accent font-medium text-sm hover:text-gray-900 transition-colors duration-300 flex items-center">
                            Read More
                            <i class="fi fi-rr-arrow-small-right ml-2 mt-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto w-full bg-white content-padding">
        <div data-aos="fade-up" class="min-h-[30vh] flex flex-col justify-center items-center text-center gap-6">
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

<?php
require_once ROOT_PATH . '/components/footer.php';
?>

</body>

</html>