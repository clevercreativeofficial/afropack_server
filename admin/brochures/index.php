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
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Events Management -->
        <div id="events" class="dashboard-section">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Events Management</h3>
                <button class="btn-primary px-4 py-2 flex items-center space-x-2">
                    <i class="fi fi-rr-plus"></i>
                    <span>Add Event</span>
                </button>
            </div>
            <div class="w-full flex flex-col lg:flex-row gap-4">
                <div class="w-full grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 grid-cols-1 gap-4">
                    <div class="relative h-60 group">
                        <img class="w-full h-full object-cover"
                            src="https://www.tnasolutions.com/wp-content/uploads/2024/06/TNA-distribution-header.jpg">

                        <div class="absolute top-2 right-2 flex justify-center items-center gap-2 group-hover:opacity-100 opacity-0">
                            <button class="w-10 h-10 bg-accent flex items-center justify-center"><i class="fi fi-rr-eye text-white translate-y-0.5"></i></button>
                            <button class="w-10 h-10 bg-accent flex items-center justify-center"><i class="fi fi-rr-trash text-white translate-y-0.5"></i></button>
                        </div>
                        <div
                            class="absolute bottom-0 right-0 flex justify-center items-center gap-3 w-full h-[50px] px-3 bg-accent">
                            <p class="text-white">Brochure.pdf</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div id="addSlideModal" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
    <div class="bg-white shadow-lg w-full max-w-md md:p-6 p-3 m-3 relative">
        <button id="closeAddSlideModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class="fi fi-rr-cross translate-y-0.5 hover:text-accent"></i>
        </button>
        <?php
        require_once ROOT_PATH . '/components/addBrochureModal.php';
        ?>
    </div>
</div>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>