<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/modal.php';

// Fetch events
$events_sql = "SELECT * FROM events ORDER BY id DESC";
$events_result = $conn->query($events_sql);
$events_rows = $events_result->fetch_all(MYSQLI_ASSOC);

?>


<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto py-6 px-3">
        <!-- Events Management -->
        <div id="events" class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Add Event</h3>
                <button onclick="window.history.back()" class="bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Back
                </button>
            </div>
            <form id="add_form" action="<?= $url ?>admin/events/api/add.php" method="POST" enctype="multipart/form-data" class="w-full bg-white space-y-4 py-6 px-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Event Name</label>
                        <input type="text" name="name" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Enter event name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Event Description</label>
                        <textarea name="description"
                            class="outline-none w-full min-h-24 py-3 px-4 border focus:border-accent duration-300"
                            placeholder="250 char max."
                            maxlength="250"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Date</label>
                            <input type="date" name="event_date" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Location</label>
                            <input type="text" name="location" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="City, Country">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">More Info URL</label>
                        <input type="text" name="more_info" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="https://example.com/event-details">
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
                            <input type="file" name="image"
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
                <button type="submit"
                    class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
                    Add Event
                </button>
            </form>

        </div>
    </main>
</div>

<!-- Message -->
<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<script src="<?= $url ?>admin/assets/js/form_validation.js"></script>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>