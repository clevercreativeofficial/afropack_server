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
            src="https://www.tnasolutions.com/wp-content/uploads/2024/06/TNA-videos-main-header.jpg" alt="">
    </div>
</section>


<!-- Videos Section - Premium Layout -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
         <div data-aos="fade-up">
<?php
        render_header_section(
            "Video Library",
            "Afropack",
            "Integrated Systems",
            "As a leading packaging solutions partner for more than four decades, you can trust we have seen, addressed and overcome even the most difficult production challenges so you don't have to."
        );
        ?>
         </div>
        

        <!-- Video Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Video Card 1 -->
            <div data-aos="fade-up" class="bg-white p-8 shadow-2xl shadow-gray-100">
                <div class="relative group">
                    <div class="aspect-video">
                        <iframe src="https://www.youtube.com/embed/xGH1NwrBwc4?si=amEZN715XrIv5uCs"
                            title="YouTube video player" frameborder="0"
                            class="aspect-video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 my-4">Advanced Packaging Solutions</h4>
                    <p class="text-gray-600 text-sm">
                        Discover our cutting-edge packaging systems designed for maximum efficiency and reliability.
                    </p>
                </div>
            </div>

            <!-- Video Card 1 -->
            <div data-aos="fade-up" class="bg-white p-8 shadow-2xl shadow-gray-100">
                <div class="relative group">
                    <div class="aspect-video">
                        <iframe src="https://www.youtube.com/embed/xGH1NwrBwc4?si=amEZN715XrIv5uCs"
                            title="YouTube video player" frameborder="0"
                            class="aspect-video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 my-4">Advanced Packaging Solutions</h4>
                    <p class="text-gray-600 text-sm">
                        Discover our cutting-edge packaging systems designed for maximum efficiency and reliability.
                    </p>
                </div>
            </div>
            <!-- Video Card 1 -->
            <div data-aos="fade-up" class="bg-white p-8 shadow-2xl shadow-gray-100">
                <div class="relative group">
                    <div class="aspect-video">
                        <iframe src="https://www.youtube.com/embed/xGH1NwrBwc4?si=amEZN715XrIv5uCs"
                            title="YouTube video player" frameborder="0"
                            class="aspect-video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 my-4">Advanced Packaging Solutions</h4>
                    <p class="text-gray-600 text-sm">
                        Discover our cutting-edge packaging systems designed for maximum efficiency and reliability.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</section>


<?php
require_once ROOT_PATH . '/components/footer.php';
?>

</body>

</html>