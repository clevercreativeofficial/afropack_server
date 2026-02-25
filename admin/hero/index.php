<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/components/header.php';
?>


<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto py-6 px-3">
        <!-- Brochures Management -->
        <div id="hero" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Hero Slides Management</h3>
                <button class="btn-primary bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Add Hero Slide
                </button>
            </div>
            <div class="w-full gap-4">
                <!-- Hero Slides Gallery Container -->
                <div id="heroSlidesContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-6 gap-3">
                    <!-- Slides will be loaded here dynamically -->
                </div>

                <!-- Loading State -->
                <div id="slidesLoading" class="col-span-full text-center py-12 hidden">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent"></div>
                    <p class="mt-2 text-gray-500">Loading slides...</p>
                </div>

                <!-- Empty State -->
                <div id="slidesEmpty" class="col-span-full text-center py-12 bg-gray-50 hidden">
                    <i class="fi fi-rr-picture text-4xl text-gray-400"></i>
                    <p class="mt-2 text-gray-500">No slides found. Upload your first hero image!</p>
                </div>

                <!-- Error State -->
                <div id="slidesError" class="col-span-full text-center py-12 bg-red-50 hidden">
                    <i class="fi fi-rr-exclamation text-4xl text-red-400"></i>
                    <p class="mt-2 text-sm text-red-500">Failed to load slides. Please try again.</p>
                </div>
            </div>
    </main>
</div>


<!-- Add Slide Modal -->
<div id="addSlideModal" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
    <div class="bg-white shadow-lg w-full max-w-md md:p-6 p-3 m-3 relative">
        <button id="closeAddSlideModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class="fi fi-rr-cross translate-y-0.5 hover:text-accent"></i>
        </button>
        <?php
        require_once ROOT_PATH . '/components/addSlideModal.php';
        ?>
    </div>
</div>

<!-- AJAX -->
<script src="<?= $url ?>admin/hero/api/upload.js"></script>
<script src="<?= $url ?>admin/hero/api/fetch.js"></script>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>