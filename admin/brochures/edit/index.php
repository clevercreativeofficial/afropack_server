<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['brochure'] = 'Invalid brochure ID.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM brochures WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$brochure = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$brochure) {
    $_SESSION['brochure'] = 'Brochure not found.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

// Resolve image src
$image   = $brochure['image'] ?? '';
$img_src = '';
if ($image !== '') {
    $img_src = filter_var($image, FILTER_VALIDATE_URL)
        ? htmlspecialchars($image)
        : $url . 'admin/uploads/brochures/images/' . htmlspecialchars($image);
}
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Edit Brochure</h3>
                <a href="<?= $url ?>admin/brochures/"
                    class="bg-accent sm:w-auto w-full text-center text-white px-4 py-2">
                    Back
                </a>
            </div>

            <form action="<?= $url ?>admin/brochures/api/edit.php" method="POST"
                enctype="multipart/form-data" class="w-full bg-white space-y-4 py-6 px-4">

                <div class="grid grid-cols-1 gap-4">
                    <input type="hidden" name="brochure_id" value="<?= $brochure['id'] ?>">

                    <div>
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" name="title"
                            value="<?= htmlspecialchars($brochure['title'] ?? '') ?>"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Enter title" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">PDF File</label>
                        <input type="file" name="pdf_file"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            accept="application/pdf">
                        <?php if (!empty($brochure['pdf_file'])): ?>
                            <small class="text-gray-500 mt-1 block">
                                Current: <span><?= htmlspecialchars($brochure['pdf_file']) ?></span>
                                — leave empty to keep existing.
                            </small>
                        <?php endif; ?>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Image URL</label>
                            <input type="text" name="image_url"
                                value="<?= filter_var($image, FILTER_VALIDATE_URL) ? htmlspecialchars($image) : '' ?>"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="https://image-url.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Image File</label>
                            <input type="file" name="image_file" id="brochure_image_file"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                accept="image/jpeg,image/png,image/webp,image/gif">
                        </div>
                    </div>

                    <!-- Image Preview -->
                    <div class="h-40 w-40 overflow-hidden border bg-gray-100 flex items-center justify-center">
                        <?php if ($img_src): ?>
                            <img id="brochure_image_preview" class="w-full h-full object-cover"
                                src="<?= $img_src ?>" alt="Brochure image"
                                onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
                        <?php else: ?>
                            <img id="brochure_image_preview" class="w-full h-full object-cover hidden" src="" alt="">
                            <span id="brochure_no_image" class="text-gray-400 text-sm">No image</span>
                        <?php endif; ?>
                    </div>

                    <small class="text-gray-500">
                        <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL takes priority if both are provided.
                    </small>
                </div>

                <button type="submit"
                    class="outline-none md:w-fit py-3 px-6 bg-accent text-white hover:bg-accent-dark duration-300">
                    Update Brochure
                </button>
            </form>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<script>
document.getElementById('brochure_image_file').addEventListener('change', function () {
    const file    = this.files[0];
    if (!file) return;
    const preview = document.getElementById('brochure_image_preview');
    const noImage = document.getElementById('brochure_no_image');
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
