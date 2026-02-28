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
        <!-- Videos Management -->
        <div id="videos" class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Add Video</h3>
                <button onclick="window.history.back()" class="bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Back
                </button>
            </div>
            <form action="<?= $url ?>admin/videos/api/upload.php" method="POST" class="w-full bg-white space-y-4 py-6 px-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" name="title" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Enter event name" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Description</label>
                        <textarea name="description" class="outline-none w-full min-h-24 py-3 px-4 border focus:border-accent duration-300" placeholder="250 char max." required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Youtube URL</label>
                        <input type="text" name="youtube_url" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="https://youtu.be/DlMAIYd7-J4" required>
                    </div>
                </div>
                <button type="submit" name="submit"
                    class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
                    Add Video
                </button>
            </form>
        </div>
    </main>
</div>

<!-- Message -->
<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>