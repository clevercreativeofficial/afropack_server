<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';

// Fetch published news
$news = $conn->query("
    SELECT id, title, category, body, image, created_at 
    FROM news 
    WHERE is_published = 1 
    ORDER BY created_at DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<!-- hero section -->
<section class="relative h-[40vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="w-full h-full overflow-hidden">
        <img class="w-full h-full object-cover opacity-30"
            src="<?= $url ?>assets/images/machines (1).jpeg" alt="News image">
    </div>
</section>

<!-- News Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mx-auto">
            <div data-aos="fade-up">
                <?php
                render_header_section(
                    "Latest News & Updates",
                    "Stay Informed With Our",
                    "Latest Articles",
                    "As a leading packaging solutions partner for more than four decades, you can trust we have seen, addressed and overcome even the most difficult production challenges."
                );
                ?>
            </div>
        </div>

        <?php if (!empty($news)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 pb-16">
                <?php foreach ($news as $article):
                    $image = $article['image'] ?? '';
                    $img_src = '';
                    if ($image !== '') {
                        $img_src = filter_var($image, FILTER_VALIDATE_URL)
                            ? htmlspecialchars($image)
                            : $url . 'uploads/news/' . htmlspecialchars($image);
                    } else {
                        $img_src = $url . 'assets/images/placeholder.png';
                    }
                ?>
                    <div data-aos="fade-up" class="bg-white border border-gray-200 group duration-300 transition-all">
                        <div class="relative h-48 w-full overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                src="<?= $img_src ?>"
                                alt="<?= htmlspecialchars($article['title']) ?>"
                                onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
                            <div class="absolute top-3 left-3 bg-accent px-3 py-1">
                                <small class="text-white font-medium">
                                    <?= date('F j', strtotime($article['created_at'])) ?>
                                </small>
                            </div>
                            <?php if (!empty($article['category'])): ?>
                                <div class="absolute top-3 right-3 bg-white px-3 py-1">
                                    <small class="text-accent font-medium text-xs">
                                        <?= htmlspecialchars($article['category']) ?>
                                    </small>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <a href="<?= $url ?>news/<?= $article['id'] ?>/"
                                class="block group-hover:text-accent transition-colors duration-300">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                                    <?= htmlspecialchars($article['title']) ?>
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                    <?= htmlspecialchars($article['body']) ?>
                                </p>
                            </a>
                            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                                <a href="<?= $url ?>news-and-resources/news/id?id=<?= $article['id'] ?>/"
                                    class="text-accent font-medium text-sm hover:text-gray-900 transition-colors duration-300 flex items-center">
                                    Read More
                                    <i class="fi fi-rr-arrow-small-right ml-2 mt-1 text-xs"></i>
                                </a>
                                <span class="text-xs text-gray-400 flex items-center gap-1">
                                    <i class="fi fi-rr-eye mt-0.5"></i>
                                    <?= number_format($article['views'] ?? 0) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 py-16">No news articles available yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto w-full bg-white content-padding">
        <div data-aos="fade-up" class="min-h-[30vh] flex flex-col justify-center items-center text-center gap-6">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800">
                Let's Build Your Success <span class="text-accent">Together</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Our team of experts is ready to help you find the perfect solution for your processing and packaging needs.
            </p>
            <?php render_button("Contact Us", $url . "contact", "outline"); ?>
        </div>
    </div>
</section>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>
</html>