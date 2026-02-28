<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

// Fetch news
$sql    = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
$news   = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="news" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">News Articles Management</h3>
                <button onclick="window.location.href='<?= $url ?>admin/news/add/'" class="bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Add New Article
                </button>
            </div>

            <?php if (!empty($news)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($news as $article): ?>
                        <div class="bg-white group border border-transparent hover:border-gray-200 transition-all duration-300 relative">
                            <div class="relative">
                                <img src="<?= $url . 'uploads/news/' . htmlspecialchars($article['image'] ?? $url . 'assets/images/placeholder.png') ?>"
                                    alt="<?= htmlspecialchars($article['title'] ?? '') ?>"
                                    class="w-full h-60 object-cover"
                                    onerror="this.src='<?= $url ?>assets/images/placeholder.png'">

                                <!-- Action Buttons -->

                                <div class="absolute top-4 right-4 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button onclick="window.location.href='<?= $url ?>admin/news/edit/?id=<?= $article['id'] ?>'"
                                        class="edit_btn w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                                        title="Edit">
                                        <i class="fi fi-rr-edit mt-1"></i>
                                    </button>
                                    <button onclick="window.location.href='<?= $url ?>admin/news/api/delete.php?id=<?= $article['id'] ?>'"
                                        class="w-10 h-10 flex items-center justify-center text-white bg-red-500 hover:bg-red-600 transition-colors"
                                        title="Delete">
                                        <i class="fi fi-rr-trash mt-1"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="px-4 pb-4">
                                <div class="my-3">
                                    <span class="text-xs font-medium text-accent bg-accent-light px-2 py-1">
                                        <?= htmlspecialchars($article['category'] ?? 'Uncategorized') ?>
                                    </span>
                                </div>

                                <div class="flex items-center text-xs text-gray-500 mb-3">
                                    <i class="fi fi-rr-eye mr-1 mt-1"></i>
                                    <span><?= (int)($article['views'] ?? 0) ?> views</span>
                                </div>

                                <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2">
                                    <?= htmlspecialchars($article['title'] ?? '') ?>
                                </h3>

                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                                    <i class="fi fi-rr-calendar text-accent"></i>
                                    <span><?= date('M d, Y', strtotime($article['created_at'] ?? 'now')) ?></span>
                                </div>

                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                    <?= htmlspecialchars($article['body'] ?? '') ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center p-6 bg-sky-100">
                    <p class="text-sm text-sky-700">No news articles yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>