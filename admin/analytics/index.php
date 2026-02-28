<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

/* ─── Real stats from DB ───────────────────────────────────────────────── */

// Total news views
$total_views = $conn->query("SELECT COALESCE(SUM(views), 0) AS total FROM news")->fetch_assoc()['total'];

// Total users
$total_users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];

// Total published news
$published_news = $conn->query("SELECT COUNT(*) AS total FROM news WHERE is_published = 1")->fetch_assoc()['total'];

// Total events
$total_events = $conn->query("SELECT COUNT(*) AS total FROM events")->fetch_assoc()['total'];

// Total brochures
$total_brochures = $conn->query("SELECT COUNT(*) AS total FROM brochures")->fetch_assoc()['total'];

// Total videos
$total_videos = $conn->query("SELECT COUNT(*) AS total FROM videos")->fetch_assoc()['total'];

// Top 5 most viewed articles
$top_articles = $conn->query("
    SELECT title, views, category 
    FROM news 
    WHERE is_published = 1 
    ORDER BY views DESC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

// Max views for progress bar scaling
$max_views = !empty($top_articles) ? max(array_column($top_articles, 'views')) : 1;

// Recent news articles
$recent_news = $conn->query("
    SELECT title, category, views, is_published, created_at 
    FROM news 
    ORDER BY created_at DESC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

// Content published this month
$this_month = $conn->query("
    SELECT COUNT(*) AS total FROM news 
    WHERE MONTH(created_at) = MONTH(NOW()) 
    AND YEAR(created_at) = YEAR(NOW())
")->fetch_assoc()['total'];

// Upcoming events
$upcoming_events = $conn->query("
    SELECT COUNT(*) AS total FROM events 
    WHERE event_date >= CURDATE()
")->fetch_assoc()['total'];

// Authors vs admins
$user_roles = $conn->query("
    SELECT role, COUNT(*) AS total 
    FROM users 
    GROUP BY role
")->fetch_all(MYSQLI_ASSOC);

$role_map = array_column($user_roles, 'total', 'role');
$admin_count  = $role_map['admin']  ?? 0;
$author_count = $role_map['author'] ?? 0;
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="analytics" class="dashboard-section max-w-7xl mx-auto">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Analytics Overview</h3>
                <span class="text-sm text-gray-400 self-center">
                    Data as of <?= date('M d, Y') ?>
                </span>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <!-- Total Views -->
                <div class="bg-white p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Total News Views</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-eye text-accent"></i>
                        </span>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900">
                        <?= number_format($total_views) ?>
                    </h4>
                    <p class="text-gray-400 text-xs mt-2">Across all published articles</p>
                </div>

                <!-- Total Users -->
                <div class="bg-white p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Total Users</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-users text-accent"></i>
                        </span>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900">
                        <?= number_format($total_users) ?>
                    </h4>
                    <p class="text-gray-400 text-xs mt-2">
                        <?= $admin_count ?> admin · <?= $author_count ?> author
                    </p>
                </div>

                <!-- Published This Month -->
                <div class="bg-white p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Published This Month</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-document text-accent"></i>
                        </span>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900">
                        <?= $this_month ?>
                    </h4>
                    <p class="text-gray-400 text-xs mt-2">News articles in <?= date('F') ?></p>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Upcoming Events</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-calendar text-accent"></i>
                        </span>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900">
                        <?= $upcoming_events ?>
                    </h4>
                    <p class="text-gray-400 text-xs mt-2">Scheduled from today</p>
                </div>
            </div>

            <!-- Content Summary + Top Articles -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

                <!-- Content Summary -->
                <div class="bg-white p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Content Summary</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-newspaper text-accent text-sm"></i>
                                </span>
                                <span class="text-sm text-gray-700">News Articles</span>
                            </div>
                            <span class="font-bold text-gray-900"><?= $published_news ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-calendar text-accent text-sm"></i>
                                </span>
                                <span class="text-sm text-gray-700">Events</span>
                            </div>
                            <span class="font-bold text-gray-900"><?= $total_events ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-play text-accent text-sm"></i>
                                </span>
                                <span class="text-sm text-gray-700">Videos</span>
                            </div>
                            <span class="font-bold text-gray-900"><?= $total_videos ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-document text-accent text-sm"></i>
                                </span>
                                <span class="text-sm text-gray-700">Brochures</span>
                            </div>
                            <span class="font-bold text-gray-900"><?= $total_brochures ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-users text-accent text-sm"></i>
                                </span>
                                <span class="text-sm text-gray-700">Users</span>
                            </div>
                            <span class="font-bold text-gray-900"><?= $total_users ?></span>
                        </div>
                    </div>
                </div>

                <!-- Top Articles by Views -->
                <div class="lg:col-span-2 bg-white p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Top Articles by Views</h4>
                    <?php if (!empty($top_articles)): ?>
                        <div class="space-y-4">
                            <?php foreach ($top_articles as $article): ?>
                                <?php $width = $max_views > 0 ? round(($article['views'] / $max_views) * 100) : 0; ?>
                                <div class="flex items-center justify-between gap-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            <?= htmlspecialchars($article['title']) ?>
                                        </p>
                                        <?php if (!empty($article['category'])): ?>
                                            <span class="text-xs text-accent">
                                                <?= htmlspecialchars($article['category']) ?>
                                            </span>
                                        <?php endif; ?>
                                        <div class="w-full bg-gray-200 h-2 mt-1 overflow-hidden">
                                            <div class="bg-accent h-2" style="width: <?= $width ?>%"></div>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-600 whitespace-nowrap">
                                        <?= number_format($article['views']) ?> views
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-400 text-sm">No articles with views yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Recent Articles Table -->
            <div class="bg-white p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-bold text-gray-900">Recent Articles</h4>
                    <a href="<?= $url ?>admin/news/"
                        class="text-accent text-sm flex items-center gap-1 hover:gap-2 transition-all">
                        <span>View All</span>
                        <i class="fi fi-rr-arrow-small-right"></i>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Title</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Category</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Views</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Status</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_news)): ?>
                                <?php foreach ($recent_news as $article): ?>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-3 px-2 text-sm text-gray-900 max-w-xs truncate">
                                            <?= htmlspecialchars($article['title']) ?>
                                        </td>
                                        <td class="py-3 px-2 text-sm text-gray-600">
                                            <?= htmlspecialchars($article['category'] ?? '—') ?>
                                        </td>
                                        <td class="py-3 px-2 text-sm text-gray-600">
                                            <?= number_format($article['views']) ?>
                                        </td>
                                        <td class="py-3 px-2">
                                            <?php if ($article['is_published']): ?>
                                                <small class="px-2 py-1 bg-green-100 text-green-800 text-xs">Published</small>
                                            <?php else: ?>
                                                <small class="px-2 py-1 bg-gray-100 text-gray-600 text-xs">Draft</small>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-3 px-2 text-sm text-gray-400">
                                            <?= date('M d, Y', strtotime($article['created_at'])) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-400 text-sm">
                                        No articles yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>