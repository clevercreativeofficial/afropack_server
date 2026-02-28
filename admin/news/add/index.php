<?php
require_once __DIR__ . '/../../path.php';
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
        <div id="news" class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">New Article</h3>
                <button onclick="window.history.back()" class="bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Back
                </button>
            </div>
            <form action="<?= $url ?>admin/news/api/add.php" method="POST" enctype="multipart/form-data"
                class="w-full bg-white space-y-4 py-6 px-4">

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" name="title"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Enter article title" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Category</label>
                        <input type="text" name="category"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="e.g. Technology, Sports...">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Body</label>
                        <textarea name="body"
                            class="outline-none w-full min-h-24 py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Article content..." required></textarea>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Image URL</label>
                            <input type="text" name="image_url"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="https://image-url.com">

                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Image File</label>
                            <input type="file" name="image_file"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="https://image-url.com">

                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="editIsPublished" class="mr-2 accent-accent" checked>
                        <label for="editIsPublished" class="text-sm text-gray-700">Published</label>
                    </div>

                    <small class="text-gray-500">
                        <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL
                        takes
                        priority if both are provided.
                    </small>
                </div>

                <button type="submit" name="submit"
                    class="outline-none md:w-fit py-3 px-6 bg-accent text-white hover:bg-accent-dark duration-300">
                    Add Article
                </button>
            </form>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>