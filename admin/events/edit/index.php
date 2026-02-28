<?php
// ─── ALL logic before any HTML output ─────────────────────────────────
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

// Validate ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    $_SESSION['event'] = 'Invalid event ID.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

// Fetch event
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$event = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$event) {
    $_SESSION['event'] = 'Event not found.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

// Resolve image — single column
$image   = $event['image'] ?? '';
$img_src = '';
if ($image !== '') {
    $img_src = filter_var($image, FILTER_VALIDATE_URL)
        ? htmlspecialchars($image)
        : $url . 'admin/uploads/events/' . htmlspecialchars($image);
}

// ─── Safe to output HTML now ───────────────────────────────────────────
require_once ROOT_PATH . '/components/header.php';
?>

<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="events" class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Edit Event</h3>
                <a href="<?= $url ?>admin/events/" class="bg-accent sm:w-auto w-full text-center text-white px-4 py-2">
                    Back
                </a>
            </div>

            <form action="<?= $url ?>admin/events/api/edit.php" method="POST"
                enctype="multipart/form-data" class="w-full bg-white space-y-4 py-6 px-4">

                <div class="grid grid-cols-1 gap-4">
                    <input type="hidden" name="event_id" value="<?= $event['id'] ?>">

                    <div>
                        <label class="block text-sm font-medium mb-2">Event Name</label>
                        <input type="text" name="name"
                            value="<?= htmlspecialchars($event['name'] ?? '') ?>"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Enter event name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Event Description</label>
                        <textarea name="description"
                            class="outline-none w-full min-h-24 py-3 px-4 border focus:border-accent duration-300"
                            placeholder="250 char max." required><?= htmlspecialchars($event['description'] ?? '') ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Date</label>
                            <input type="date" name="event_date"
                                value="<?= htmlspecialchars($event['event_date'] ?? '') ?>"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Location</label>
                            <input type="text" name="location"
                                value="<?= htmlspecialchars($event['location'] ?? '') ?>"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="City, Country" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">More Info URL</label>
                        <input type="url" name="more_info"
                            value="<?= htmlspecialchars($event['more_info'] ?? '') ?>"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="https://example.com/event-details">
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Image URL</label>
                            <input type="url" name="image_url"
                                value="<?= filter_var($image, FILTER_VALIDATE_URL) ? htmlspecialchars($image) : '' ?>"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="https://image-url.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Image File</label>
                            <input type="file" name="image" id="update_image_file"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                accept="image/jpeg,image/png,image/webp,image/gif">
                        </div>
                    </div>

                    <!-- Image Preview -->
                    <div class="h-40 w-40 overflow-hidden border bg-gray-100 flex items-center justify-center">
                        <?php if ($img_src): ?>
                            <img id="image_preview" class="w-full h-full object-cover"
                                src="<?= $img_src ?>" alt="Event image"
                                onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
                        <?php else: ?>
                            <img id="image_preview" class="w-full h-full object-cover hidden" src="" alt="Event image">
                            <span id="no_image" class="text-gray-400 text-sm">No image</span>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published"
                            class="mr-2 accent-accent w-4 h-4"
                            <?= ($event['is_published'] == 1) ? 'checked' : '' ?>>
                        <label for="is_published" class="text-sm text-gray-700 select-none">Published</label>
                    </div>

                    <small class="text-gray-500">
                        <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL takes priority if both are provided.
                    </small>
                </div>

                <button type="submit"
                    class="outline-none md:w-fit py-3 px-6 bg-accent text-white hover:bg-accent-dark duration-300">
                    Update Event
                </button>
            </form>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<script>
document.getElementById('update_image_file').addEventListener('change', function () {
    const file    = this.files[0];
    if (!file) return;
    const preview = document.getElementById('image_preview');
    const noImage = document.getElementById('no_image');
    const reader  = new FileReader();
    reader.onload = (e) => {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        if (noImage) noImage.classList.add('hidden');
    };
    reader.readAsDataURL(file);
});
</script>

<script src="<?= $url ?>admin/assets/js/form_validation.js"></script>
<?php require_once ROOT_PATH . '/components/footer.php'; ?>