<?php
require_once __DIR__ . '/path.php';
require_once ROOT_PATH . '/components/header.php';
?>

<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">

    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Dashboard Content -->
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Stats Overview - Updated to match your actual content sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Hero Carousel Slides</p>
                        <p class="text-3xl font-bold text-accent-dark">6</p>
                    </div>
                    <i class="fi fi-rr-picture text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">News Articles</p>
                        <p class="text-3xl font-bold text-accent-dark">156</p>
                    </div>
                    <i class="fi fi-rr-bell text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Active Events</p>
                        <p class="text-3xl font-bold text-accent-dark">7</p>
                    </div>
                    <i class="fi fi-rr-calendar-day text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Video Gallery</p>
                        <p class="text-3xl font-bold text-accent-dark">42</p>
                    </div>
                    <i class="fi fi-rr-play-alt text-3xl text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Secondary Stats Row - Adding missing sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Brochures</p>
                        <p class="text-3xl font-bold text-accent-dark">18</p>
                    </div>
                    <i class="fi fi-rr-book text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Newsletter Subscribers</p>
                        <p class="text-3xl font-bold text-accent-dark">1,234</p>
                    </div>
                    <i class="fi fi-rr-users text-3xl text-accent"></i>
                </div>
            </div>

            <div class="bg-white card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">System Users</p>
                        <p class="text-3xl font-bold text-accent-dark">8</p>
                    </div>
                    <i class="fi fi-rr-user text-3xl text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Quick Actions - Updated to match navigation exactly -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4 text-accent-dark">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="hero-carousel.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-picture text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Manage Hero Carousel</p>
                    <p class="text-sm text-gray-500 mt-1">Update slides & images</p>
                </a>

                <a href="news.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-bell text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Add News Article</p>
                    <p class="text-sm text-gray-500 mt-1">Publish company updates</p>
                </a>

                <a href="events.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-calendar-day text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Create Event</p>
                    <p class="text-sm text-gray-500 mt-1">Schedule webinars & meetings</p>
                </a>

                <a href="videos.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                    <i class="fi fi-rr-play-alt text-2xl group-hover:text-accent duration-300 mb-3"></i>
                    <p class="font-medium text-gray-900">Upload Video</p>
                    <p class="text-sm text-gray-500 mt-1">Add to video gallery</p>
                </a>
            </div>
        </div>

        <!-- Second Row of Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <a href="brochures.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                <i class="fi fi-rr-book text-2xl group-hover:text-accent duration-300 mb-3"></i>
                <p class="font-medium text-gray-900">Manage Brochures</p>
                <p class="text-sm text-gray-500 mt-1">Upload PDF catalogs</p>
            </a>

            <a href="subscribers.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                <i class="fi fi-rr-users text-2xl group-hover:text-accent duration-300 mb-3"></i>
                <p class="font-medium text-gray-900">View Subscribers</p>
                <p class="text-sm text-gray-500 mt-1">Manage newsletter list</p>
            </a>

            <a href="users.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                <i class="fi fi-rr-user text-2xl group-hover:text-accent duration-300 mb-3"></i>
                <p class="font-medium text-gray-900">Manage Users</p>
                <p class="text-sm text-gray-500 mt-1">Add/remove admin access</p>
            </a>

            <a href="settings.html" class="bg-white p-6 text-left border border-transparent hover:border-accent duration-300 group">
                <i class="fi fi-rr-settings text-2xl group-hover:text-accent duration-300 mb-3"></i>
                <p class="font-medium text-gray-900">System Settings</p>
                <p class="text-sm text-gray-500 mt-1">Configure dashboard</p>
            </a>
        </div>
    </main>

</div>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>