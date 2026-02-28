<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/components/header.php';

// Fetch videos
$videos_sql = "SELECT * FROM videos ORDER BY id DESC";
$videos_result = $conn->query($videos_sql);
$videos_rows = $videos_result->fetch_all(MYSQLI_ASSOC);

?>


<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto py-6 px-3">
        <!-- Videos Management -->
        <div id="videos" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Videos Management</h3>
                <button onclick="window.location.href='<?= $url ?>admin/videos/upload/'" class="btn-primary bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Upload Video
                </button>
            </div>
            <?php if (count($videos_rows) > 0) : ?>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="w-full grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                        <?php
                        // Function to extract YouTube ID from various URL formats
                        function getYouTubeId($url)
                        {
                            $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
                            preg_match($pattern, $url, $matches);
                            return isset($matches[1]) ? $matches[1] : null;
                        }

                        foreach ($videos_rows as $video):
                            $youtubeId = getYouTubeId($video['youtube_url']);
                        ?>
                            <div class="relative w-[320px]s aspect-video group">
                                <iframe class="w-full h-full"
                                    src="https://www.youtube.com/embed/<?= $youtubeId ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>
                                <div class="absolute top-2 right-2 flex justify-center items-center gap-2 group-hover:opacity-100 opacity-0">
                                    <button onclick="window.location.href='<?= $url ?>admin/videos/edit/?id=<?= $video['id'] ?>'" class="w-10 h-10 bg-accent flex items-center justify-center"><i class="fi fi-rr-edit text-white translate-y-0.5"></i></button>
                                    <button onclick="window.location.href='<?= $url ?>admin/videos/api/delete.php/?id=<?= $video['id'] ?>'" class="w-10 h-10 bg-accent flex items-center justify-center"><i class="fi fi-rr-trash text-white translate-y-0.5"></i></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="text-center bg-sky-100 py-6">
                    <p class="text-sm text-sky-800">No video yet!</p>
                </div>
            <?php endif ?>
        </div>
    </main>
</div>


<!-- Message -->
<?php
include_once ROOT_PATH . '/config/notifications.php';
require_once ROOT_PATH . '/components/footer.php';
?>