<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="brochures" class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Upload Brochure</h3>
                <a href="<?= $url ?>admin/brochures/"
                    class="bg-accent sm:w-auto w-full text-center text-white px-4 py-2">
                    Back
                </a>
            </div>

            <form action="<?= $url ?>admin/brochures/api/add.php" method="POST"
                enctype="multipart/form-data" class="w-full bg-white space-y-4 py-6 px-4">

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" name="title"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Enter title" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">PDF File</label>
                        <input type="file" name="pdf_file" id="pdf_file"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            accept="application/pdf" required>
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
                            <input type="file" name="image_file" id="brochure_image_file"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                accept="image/jpeg,image/png,image/webp,image/gif">
                        </div>
                    </div>

                    <!-- Image Preview -->
                    <div class="h-40 w-40 overflow-hidden border bg-gray-100 flex items-center justify-center">
                        <img id="brochure_image_preview" class="w-full h-full object-cover hidden" src="" alt="">
                        <span id="brochure_no_image" class="text-gray-400 text-sm">No image</span>
                    </div>

                    <small class="text-gray-500">
                        <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL takes priority if both are provided.
                    </small>
                </div>

                <button type="submit"
                    class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
                    Upload Brochure
                </button>
            </form>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<script>
// Live image preview
document.getElementById('brochure_image_file').addEventListener('change', function () {
    const file    = this.files[0];
    if (!file) return;
    const preview = document.getElementById('brochure_image_preview');
    const noImage = document.getElementById('brochure_no_image');
    const reader  = new FileReader();
    reader.onload = (e) => {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        noImage.classList.add('hidden');
    };
    reader.readAsDataURL(file);
});
</script>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>