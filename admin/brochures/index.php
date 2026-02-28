<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

// Fetch brochures
$sql      = "SELECT * FROM brochures ORDER BY id DESC";
$result   = $conn->query($sql);
$brochures = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="brochures" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Brochures Management</h3>
                <a href="<?= $url ?>admin/brochures/upload/"
                    class="bg-accent sm:w-auto w-full text-center text-white px-4 py-2">
                    Upload Brochure
                </a>
            </div>

            <?php if (!empty($brochures)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($brochures as $brochure):
                        $image   = $brochure['image'] ?? '';
                        $img_src = '';
                        if ($image !== '') {
                            $img_src = filter_var($image, FILTER_VALIDATE_URL)
                                ? htmlspecialchars($image)
                                : $url . 'admin/uploads/brochures/images/' . htmlspecialchars($image);
                        }
                    ?>
                        <div class="bg-white group border border-transparent hover:border-gray-200 transition-all duration-300 relative">

                            <!-- Cover Image -->
                            <div class="relative h-52 w-full overflow-hidden bg-gray-100 flex items-center justify-center">
                                <?php if ($img_src): ?>
                                    <img src="<?= $img_src ?>"
                                        alt="<?= htmlspecialchars($brochure['title'] ?? '') ?>"
                                        class="w-full h-full object-cover"
                                        onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
                                <?php else: ?>
                                    <i class="fi fi-rr-document text-4xl text-gray-300"></i>
                                <?php endif; ?>

                                <!-- Action Buttons -->
                                <div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                    <a href="<?= $url ?>admin/uploads/brochures/pdf/<?= htmlspecialchars($brochure['pdf_file']) ?>"
                                        target="_blank"
                                        class="w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                                        title="View PDF">
                                        <i class="fi fi-rr-eye mt-1"></i>
                                    </a>
                                    <a href="<?= $url ?>admin/brochures/edit/?id=<?= $brochure['id'] ?>"
                                        class="w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                                        title="Edit">
                                        <i class="fi fi-rr-edit mt-1"></i>
                                    </a>
                                    <form method="POST" action="<?= $url ?>admin/brochures/api/delete.php"
                                        onsubmit="return confirm('Delete \'<?= htmlspecialchars($brochure['title']) ?>\'? This cannot be undone.')">
                                        <input type="hidden" name="id" value="<?= $brochure['id'] ?>">
                                        <button type="submit"
                                            class="w-10 h-10 flex items-center justify-center text-white bg-red-500 hover:bg-red-600 transition-colors"
                                            title="Delete">
                                            <i class="fi fi-rr-trash mt-1"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 mb-2 line-clamp-2">
                                    <?= htmlspecialchars($brochure['title'] ?? '') ?>
                                </h3>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <i class="fi fi-rr-calendar text-accent"></i>
                                    <span><?= date('M d, Y', strtotime($brochure['created_at'] ?? 'now')) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="bg-sky-100 p-6 text-center">
                    <p class="text-sky-700 text-sm">No brochures uploaded yet.</p>
                </div>
                
            <?php endif; ?>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>
<?php require_once ROOT_PATH . '/components/footer.php'; ?>