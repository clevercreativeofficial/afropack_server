<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';

// Fetch published brochures
$brochures = $conn->query("
    SELECT id, title, pdf_file, image
    FROM brochures 
    ORDER BY id DESC
")->fetch_all(MYSQLI_ASSOC);
?>



<!-- hero section -->
<section class="relative h-[40vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="w-full h-full overflow-hidden">
        <img class="w-full h-full object-cover opacity-30"
            src="<?= $url ?>assets/images/brochures-banner.jpg" alt="Brochure Image">
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-8">
    <!-- Section Header -->
    <div data-aos="fade-up">
        <?php
        render_header_section(
            "Technical Resources",
            "Explore Our",
            "Comprehensive Brochures",
            "Discover our range of brochures that provide in-depth information about our products, services, and industry insights. Download the brochures to learn more about how we can help you achieve your packaging goals."
        );
        ?>
    </div>

    <?php if (!empty($brochures)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 pb-10">
            <?php foreach ($brochures as $brochure):
                $image = $brochure['image'] ?? '';
                $img_src = '';
                if ($image !== '') {
                    $img_src = filter_var($image, FILTER_VALIDATE_URL)
                        ? htmlspecialchars($image)
                        : $url . 'admin/uploads/brochures/images/' . htmlspecialchars($image);
                } else {
                    $img_src = $url . 'assets/images/placeholder.png';
                }

            ?>
                <div data-aos="fade-up" class="relative h-60 bg-white overflow-hidden flex flex-col items-center text-center group">
                    <img class="w-full h-full object-cover"
                        src="<?= $img_src ?>" />
                    <div class="absolute top-2 right-2 flex items-center justify-center duration-300 opacity-100 group-hover:opacity-0">
                        <i class="fi fi-rr-cloud-download bg-accent text-white w-10 h-10 flex justify-center items-center"></i>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-40 text-white flex items-center justify-center duration-300 opacity-0 group-hover:opacity-100">
                        <?= htmlspecialchars(substr($brochure['pdf_file'], 0, 15)) . '.pdf' ?>
                        <a href="<?= $url . 'admin/uploads/brochures/pdf/' . htmlspecialchars($brochure['pdf_file']) ?>" target="_blank"
                            class="absolute bottom-0 w-full bg-accent hover:bg-accent-dark duration-300 text-white py-2">
                            <i class="fi fi-rr-cloud-download"></i>
                            Download
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-500 py-16">No brochures scheduled yet.</p>
    <?php endif; ?>

    </div>
</section>

<!-- Footer -->
<?php
require_once ROOT_PATH . '/components/footer.php';
?>

</body>

</html>