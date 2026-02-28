<?php
require_once __DIR__ . '/../../../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/button.php';

// Validate ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header('Location: ' . $url . 'news-and-resources/news/');
    exit;
}

// Fetch article
$stmt = $conn->prepare("SELECT * FROM news WHERE id = ? AND is_published = 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$article = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$article) {
    header('Location: ' . $url . 'news/');
    exit;
}

/* ─── Increment views (session-guarded) ───────────────────────────────── */
if (!isset($_SESSION['viewed_news'])) {
    $_SESSION['viewed_news'] = [];
}

if (!in_array($id, $_SESSION['viewed_news'])) {
    $stmt = $conn->prepare("UPDATE news SET views = views + 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $_SESSION['viewed_news'][] = $id;
    $article['views']++;
}

// Resolve image
$image   = $article['image'] ?? '';
$img_src = '';
if ($image !== '') {
    $img_src = filter_var($image, FILTER_VALIDATE_URL)
        ? htmlspecialchars($image)
        : $url . 'uploads/news/' . htmlspecialchars($image);
}

// Fetch related articles (same category, exclude current)
$related = [];
if (!empty($article['category'])) {
    $stmt = $conn->prepare("
        SELECT id, title, image, created_at 
        FROM news 
        WHERE is_published = 1 
        AND category = ? 
        AND id != ? 
        ORDER BY created_at DESC 
        LIMIT 3
    ");
    $stmt->bind_param("si", $article['category'], $id);
    $stmt->execute();
    $related = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>

<!-- Hero -->
<section class="relative h-[50vh] flex flex-col justify-end overflow-hidden">
    <?php if ($img_src): ?>
        <img class="absolute inset-0 w-full h-full object-cover opacity-40"
            src="<?= $img_src ?>"
            alt="<?= htmlspecialchars($article['title']) ?>"
            onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    <div class="relative max-w-4xl mx-auto pb-10 w-full">
        <?php if (!empty($article['category'])): ?>
            <span class="inline-block bg-accent !text-white text-xs px-3 py-1 mb-3">
                <?= htmlspecialchars($article['category']) ?>
            </span>
        <?php endif; ?>
        <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">
            <?= htmlspecialchars($article['title']) ?>
        </h1>
    </div>
</section>

<!-- Article Content -->
<section class="section-padding">
    <div class="max-w-4xl mx-auto">

        <!-- Meta -->
        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-400 mb-8 pb-6 border-b border-gray-100">
            <span class="flex items-center gap-1">
                <i class="fi fi-rr-calendar mt-0.5"></i>
                <?= date('F j, Y', strtotime($article['created_at'])) ?>
            </span>
            <span class="flex items-center gap-1">
                <i class="fi fi-rr-eye mt-0.5"></i>
                <?= number_format($article['views']) ?> views
            </span>
            <a href="<?= $url ?>news/"
                class="ml-auto flex items-center gap-1 text-accent hover:text-accent-dark transition-colors">
                <i class="fi fi-rr-arrow-small-left mt-1"></i>
                Back to News
            </a>
        </div>

        <!-- Body -->
        <div class="prose max-w-none text-gray-700 leading-relaxed text-base space-y-4">
            <?= nl2br(htmlspecialchars($article['body'])) ?>
        </div>

        <!-- Related Articles -->
        <?php if (!empty($related)): ?>
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($related as $rel):
                        $rel_image = $rel['image'] ?? '';
                        $rel_src = $rel_image !== ''
                            ? (filter_var($rel_image, FILTER_VALIDATE_URL)
                                ? htmlspecialchars($rel_image)
                                : $url . 'uploads/news/' . htmlspecialchars($rel_image))
                            : $url . 'assets/images/placeholder.png';
                    ?>
                        <a href="<?= $url ?>news/<?= $rel['id'] ?>/"
                            class="bg-white border border-gray-200 group hover:border-accent transition-colors duration-300">
                            <div class="h-36 overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    src="<?= $rel_src ?>"
                                    alt="<?= htmlspecialchars($rel['title']) ?>"
                                    onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
                            </div>
                            <div class="p-4">
                                <p class="text-xs text-gray-400 mb-1">
                                    <?= date('M j, Y', strtotime($rel['created_at'])) ?>
                                </p>
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-accent transition-colors line-clamp-2">
                                    <?= htmlspecialchars($rel['title']) ?>
                                </h4>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- CTA -->
        <div class="mt-16 bg-white border border-gray-100 px-8 py-16 text-center">
            <h3 class="text-2xl font-bold text-gray-900 mb-3">
                Ready to work with us?
            </h3>
            <p class="text-gray-500 mb-6">
                Our team is ready to help you find the perfect solution.
            </p>
            <?php render_button("Contact Us", $url . "contact", "outline"); ?>
        </div>

    </div>
</section>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>

</html>