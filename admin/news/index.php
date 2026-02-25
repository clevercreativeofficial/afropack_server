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
        <!-- News Management -->
        <div id="news" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">News Articles Management</h3>
                <button class="btn-primary bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Add News Article
                </button>
            </div>
            <div class="w-full">
                <!-- News Articles Grid -->
                <div id="newsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Articles will be loaded here -->
                </div>

                <!-- Loading State -->
                <div id="newsLoading" class="col-span-full text-center py-12 hidden">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent"></div>
                    <p class="mt-2 text-gray-500">Loading news articles...</p>
                </div>

                <!-- Empty State -->
                <div id="newsEmpty" class="col-span-full text-center py-12 bg-gray-50 rounded-lg hidden">
                    <i class="fi fi-rr-newspaper text-4xl text-gray-400"></i>
                    <p class="mt-2 text-gray-500">No news articles found. Add your first article!</p>
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
        require_once ROOT_PATH . '/components/addNewsModal.php';
        ?>
    </div>
</div>

<script src="<?= $url ?>admin/news/api/news.js"></script>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>