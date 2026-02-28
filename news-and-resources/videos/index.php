<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';

// Fetch published videos
$videos = $conn->query("
    SELECT id, title, description, youtube_url 
    FROM videos 
    ORDER BY id DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<!-- Hero Section -->
<section class="relative h-[40vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="w-full h-full overflow-hidden">
        <img class="w-full h-full object-cover opacity-30"
            src="<?= $url ?>assets/images/videos.jpg" alt="Video Image">
    </div>
</section>

<!-- Videos Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-7xl mx-auto">

        <div data-aos="fade-up">
            <?php
            render_header_section(
                "Video Library",
                "Afropack",
                "Integrated Systems",
                "As a leading packaging solutions partner for more than four decades, you can trust we have seen, addressed and overcome even the most difficult production challenges so you don't have to."
            );
            ?>
        </div>

        <?php if (!empty($videos)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($videos as $video):
                    // Convert any YouTube URL format to embed URL
                    $youtube_url = $video['youtube_url'] ?? '';
                    $embed_url   = '';

                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([a-zA-Z0-9_-]{11})/', $youtube_url, $matches)) {
                        $embed_url = 'https://www.youtube.com/embed/' . $matches[1];
                    }
                ?>
                    <div data-aos="fade-up" class="bg-white p-8 shadow-2xl shadow-gray-100">
                        <?php if ($embed_url): ?>
                            <div class="aspect-video">
                                <iframe
                                    src="<?= htmlspecialchars($embed_url) ?>"
                                    title="<?= htmlspecialchars($video['title']) ?>"
                                    frameborder="0"
                                    class="w-full h-full"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        <?php else: ?>
                            <div class="aspect-video bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-400 text-sm">Invalid video URL</span>
                            </div>
                        <?php endif; ?>

                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 my-4">
                                <?= htmlspecialchars($video['title']) ?>
                            </h4>
                            <?php if (!empty($video['description'])): ?>
                                <p class="text-gray-600 text-sm">
                                    <?= htmlspecialchars($video['description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 py-16">No videos available yet.</p>
        <?php endif; ?>

    </div>
</section>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>

</html>