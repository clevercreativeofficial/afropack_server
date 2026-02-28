<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/modal.php';

// Fetch events
$events_sql = "SELECT * FROM events ORDER BY id DESC";
$events_result = $conn->query($events_sql);
$events_rows = $events_result->fetch_all(MYSQLI_ASSOC);

?>


<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto py-6 px-3">
        <!-- Events Management -->
        <div id="events" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Events Management</h3>
                <button onclick="window.location.href='<?= $url ?>admin/events/add/'" class="bg-accent sm:w-auto w-full text-white px-4 py-2">
                    Add Event
                </button>
            </div>
            <?php if (count($events_rows) > 0) : ?>
                <div class="w-full flex flex-col lg:flex-row gap-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 pb-16">

                        <?php foreach ($events_rows as $event): ?>
                            <?php
                            $image = $event['image'] ?? '';
                            $img_src = '';
                            if ($image !== '') {
                                $img_src = filter_var($image, FILTER_VALIDATE_URL)
                                    ? htmlspecialchars($image)
                                    : $url . 'admin/uploads/events/' . htmlspecialchars($image);
                            } else {
                                $img_src = $url . 'assets/images/placeholder.png';
                            }
                            ?>

                            <div class="bg-white border border-gray-200 group duration-300 transition-all relative">
                                <div class="relative h-48 w-full overflow-hidden">
                                    <img src="<?= $img_src ?>"
                                        alt="<?= htmlspecialchars($event['name'] ?? 'Event Image') ?>">
                                    <div class="absolute top-4 left-4 bg-accent px-3 py-1">
                                        <small class="text-white font-medium">
                                            <?= htmlspecialchars(date('M d, Y', strtotime($event['event_date'] ?? 'now'))) ?>
                                        </small>
                                    </div>

                                </div>
                                <div class="p-6">
                                    <div class="block group-hover:text-accent transition-colors duration-300">
                                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight line-clamp-1">
                                            <?= htmlspecialchars($event['name'] ?? 'No name available') ?>
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                            <?= htmlspecialchars($event['description'] ?? 'No description available') ?>
                                        </p>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100">
                                        <small class="!text-gray-500 flex items-center">
                                            <i class="fi fi-rr-marker mr-2 mt-1 text-xs"></i>
                                            <?= htmlspecialchars($event['location'] ?? 'No location available') ?>
                                        </small>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="absolute top-4 right-4 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button onclick="window.location.href='<?= $url ?>admin/events/edit/?id=<?= $event['id'] ?>'"
                                        class="edit_btn w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                                        title="Edit">
                                        <i class="fi fi-rr-edit mt-1"></i>
                                    </button>
                                    <button onclick="window.location.href='<?= $url ?>admin/events/api/delete.php?id=<?= $event['id'] ?>'"
                                        class="w-10 h-10 flex items-center justify-center text-white bg-red-500 hover:bg-red-600 transition-colors"
                                        title="Delete">
                                        <i class="fi fi-rr-trash mt-1"></i>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php else : ?>
                <div class="text-center bg-sky-100 py-6">
                    <p class="text-sm text-sky-800">No events yet!</p>
                </div>
            <?php endif ?>
        </div>
    </main>
</div>

<!-- Message -->
<?php include_once ROOT_PATH . '/config/notifications.php'; ?>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>