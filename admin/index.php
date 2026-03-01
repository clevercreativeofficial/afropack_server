<?php
require_once __DIR__ . '/path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

/* ─── Real stats ───────────────────────────────────────────────────────── */
$total_news       = $conn->query("SELECT COUNT(*) AS t FROM news")->fetch_assoc()['t'];
$total_events     = $conn->query("SELECT COUNT(*) AS t FROM events WHERE is_published = 1")->fetch_assoc()['t'];
$total_videos     = $conn->query("SELECT COUNT(*) AS t FROM videos")->fetch_assoc()['t'];
$total_brochures  = $conn->query("SELECT COUNT(*) AS t FROM brochures")->fetch_assoc()['t'];
$total_users      = $conn->query("SELECT COUNT(*) AS t FROM users")->fetch_assoc()['t'];

// Recent news
$recent_news = $conn->query("
    SELECT title, is_published, created_at 
    FROM news 
    ORDER BY created_at DESC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

// Upcoming events
$upcoming_events = $conn->query("
    SELECT name, event_date, location 
    FROM events 
    WHERE is_published = 1 AND event_date >= CURDATE()
    ORDER BY event_date ASC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);
?>

<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto p-6">

        <!-- Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">News Articles</p>
                        <p class="text-3xl font-bold text-accent-dark"><?= number_format($total_news) ?></p>
                    </div>
                    <i class="fi fi-rr-bell text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Active Events</p>
                        <p class="text-3xl font-bold text-accent-dark"><?= number_format($total_events) ?></p>
                    </div>
                    <i class="fi fi-rr-calendar-day text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Video Gallery</p>
                        <p class="text-3xl font-bold text-accent-dark"><?= number_format($total_videos) ?></p>
                    </div>
                    <i class="fi fi-rr-play-alt text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Brochures</p>
                        <p class="text-3xl font-bold text-accent-dark"><?= number_format($total_brochures) ?></p>
                    </div>
                    <i class="fi fi-rr-book text-3xl text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Secondary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">System Users</p>
                        <p class="text-3xl font-bold text-accent-dark"><?= number_format($total_users) ?></p>
                    </div>
                    <i class="fi fi-rr-user text-3xl text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4 text-accent-dark">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="<?= $url ?>admin/news/" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-bell text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Manage News</p>
                    <p class="text-sm text-gray-500 mt-1">Publish company updates</p>
                </a>

                <a href="<?= $url ?>admin/events/" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-calendar-day text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Manage Events</p>
                    <p class="text-sm text-gray-500 mt-1">Schedule exhibitions & meetings</p>
                </a>

                <a href="<?= $url ?>admin/videos/" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-play-alt text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Manage Videos</p>
                    <p class="text-sm text-gray-500 mt-1">Add to video gallery</p>
                </a>

                <a href="<?= $url ?>admin/brochures/" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-book text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Manage Brochures</p>
                    <p class="text-sm text-gray-500 mt-1">Upload PDF catalogs</p>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="<?= $url ?>admin/users/" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                <i class="fi fi-rr-user text-2xl group-hover:text-accent duration-300 mb-3"></i>
                <p class="font-medium text-gray-900">Manage Users</p>
                <p class="text-sm text-gray-500 mt-1">Add/remove admin access</p>
            </a>

            <a href="<?= $url ?>admin/analytics/" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                <i class="fi fi-rr-chart-line text-2xl group-hover:text-accent duration-300 mb-3"></i>
                <p class="font-medium text-gray-900">Analytics</p>
                <p class="text-sm text-gray-500 mt-1">View site performance</p>
            </a>
        </div>

    </main>
</div>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>