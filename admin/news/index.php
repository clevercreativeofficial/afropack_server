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














                    <!-- News Card 1 -->
                    <div class="bg-white card group border border-transparent hover:border-gray-200 transition-all duration-300 relative">
                        <div>
                            <div class="absolute top-4 left-4">
                                <!-- Status Badge - Top Right -->
                                <div class="">
                                    <span class="px-2 py-1 bg-green-100 !text-green-800 text-xs font-medium">Published</span>
                                </div>
                            </div>
                            <img src="https://images.unsplash.com/photo-1464454709131-ffd692591ee5?q=80&w=1176&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="News Image" class="w-full h-60 object-cover mb-4">

                            <!-- Action Buttons -->
                            <div class="absolute top-4 right-4 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="View">
                                    <i class="fi fi-rr-eye mt-1"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="Edit">
                                    <i class="fi fi-rr-edit mt-1"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="Delete">
                                    <i class="fi fi-rr-trash mt-1"></i>
                                </button>
                            </div>

                        </div>

                        <div class="px-4 pb-4">

                            <!-- Category Badge -->
                            <div class="mb-3">
                                <span class="text-xs font-medium !text-accent bg-accent-light px-2 py-1">Technology</span>
                            </div>
                            <!-- Title & Date -->
                            <h3 class="font-bold text-lg text-gray-900 mb-2 pr-20">New Packaging Innovation</h3>

                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                                <i class="fi fi-rr-calendar text-accent"></i>
                                <span>March 15, 2024</span>
                            </div>

                            <!-- Preview/Excerpt (optional) -->
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore...
                            </p>

                        </div>
                    </div>

















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