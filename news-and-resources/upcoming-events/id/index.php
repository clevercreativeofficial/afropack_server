<?php
require_once __DIR__ . '/../../../path.php';
require_once ROOT_PATH . '/config/database.php';

require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/button.php';

// Validate ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// if ($id <= 0) {
//     header('Location: ' . $url . 'events/');
//     exit;
// }

// Fetch event
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ? AND is_published = 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$event = $stmt->get_result()->fetch_assoc();
$stmt->close();

// if (!$event) {
//     header('Location: ' . $url . 'events/');
//     exit;
// }

// Resolve image
$image   = $event['image'] ?? '';
$img_src = '';
if ($image !== '') {
    $img_src = filter_var($image, FILTER_VALIDATE_URL)
        ? htmlspecialchars($image)
        : $url . 'admin/uploads/events/' . htmlspecialchars($image);
} else {
    $img_src = $url . 'assets/images/placeholder.png';
}

// Event date details
$event_date     = $event['event_date'] ?? null;
$formatted_date = $event_date ? date('F j, Y', strtotime($event_date)) : null;
$day            = $event_date ? date('d', strtotime($event_date))      : null;
$month          = $event_date ? date('M', strtotime($event_date))      : null;
$year           = $event_date ? date('Y', strtotime($event_date))      : null;

// Is event in the future?
$is_upcoming = $event_date && strtotime($event_date) >= strtotime('today');

// Fetch other events (exclude current)
$other_events = $conn->query("
    SELECT id, name, event_date, location, image
    FROM events 
    WHERE is_published = 1 
    AND id != {$id}
    ORDER BY event_date ASC 
    LIMIT 3
")->fetch_all(MYSQLI_ASSOC);
?>

<!-- Hero -->
<section class="relative h-[55vh] flex flex-col justify-end overflow-hidden">
    <img class="absolute inset-0 w-full h-full object-cover opacity-40"
        src="<?= $img_src ?>"
        alt="<?= htmlspecialchars($event['name']) ?>"
        onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

    <div class="relative max-w-5xl mx-auto px-6 pb-12 w-full">
        <!-- Status Badge -->
        <span class="inline-block mb-3 px-3 py-1 text-xs font-semibold <?= $is_upcoming ? 'bg-accent !text-white' : 'bg-gray-500 !text-white' ?>">
            <?= $is_upcoming ? 'Upcoming Event' : 'Past Event' ?>
        </span>

        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-4">
            <?= htmlspecialchars($event['name']) ?>
        </h1>

        <div class="flex flex-wrap items-center gap-4 text-white/80 text-sm">
            <?php if ($formatted_date): ?>
                <span class="flex items-center gap-2">
                    <i class="fi fi-rr-calendar"></i>
                    <?= $formatted_date ?>
                </span>
            <?php endif; ?>
            <?php if (!empty($event['location'])): ?>
                <span class="flex items-center gap-2">
                    <i class="fi fi-rr-marker"></i>
                    <?= htmlspecialchars($event['location']) ?>
                </span>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Event Content -->
<section class="section-padding">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Main Body -->
            <div class="lg:col-span-2">
                <a href="<?= $url ?>events/"
                    class="inline-flex items-center gap-1 text-accent text-sm mb-6 hover:text-accent-dark transition-colors">
                    <i class="fi fi-rr-arrow-small-left mt-1"></i>
                    Back to Events
                </a>

                <h2 class="text-2xl font-bold text-gray-900 mb-4">About This Event</h2>

                <div class="text-gray-700 leading-relaxed text-base space-y-4">
                    <?= nl2br(htmlspecialchars($event['description'])) ?>
                </div>

                <?php if (!empty($event['more_info'])): ?>
                    <div class="mt-8">
                        <a href="<?= htmlspecialchars($event['more_info']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 bg-accent text-white px-6 py-3 hover:bg-accent-dark transition-colors duration-300">
                            More Information
                            <i class="fi fi-rr-external-link mt-0.5 text-sm"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">

                <!-- Date Card -->
                <?php if ($event_date): ?>
                    <div class="bg-white border border-gray-100 p-6">
                        <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Event Date</h4>
                        <div class="flex items-center gap-4">
                            <div class="bg-accent text-center px-4 py-3 min-w-[64px]">
                                <div class="text-2xl text-white font-bold leading-none"><?= $day ?></div>
                                <div class="text-xs mt-1 text-white uppercase tracking-wider"><?= $month ?></div>
                                <div class="text-xs text-white opacity-75"><?= $year ?></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900"><?= $formatted_date ?></p>
                                <p class="text-sm text-gray-500 mt-1">
                                    <?= $is_upcoming ? 'Coming up soon' : 'Event has passed' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Location Card -->
                <?php if (!empty($event['location'])): ?>
                    <div class="bg-white border border-gray-100 p-6">
                        <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Location</h4>
                        <div class="flex items-start gap-3">
                            <i class="fi fi-rr-marker text-accent text-lg mt-0.5"></i>
                            <p class="text-gray-700"><?= htmlspecialchars($event['location']) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- CTA Card -->
                <div class="bg-accent p-6 text-white">
                    <h4 class="font-bold text-lg text-white mb-2">Interested in attending?</h4>
                    <p class="text-white/80 text-sm mb-4">
                        Get in touch with our team for more information about this event.
                    </p>
                    <a href="<?= $url ?>contact/"
                        class="inline-block bg-white text-accent font-semibold px-5 py-2 text-sm hover:bg-gray-100 transition-colors duration-300">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Contact CTA -->
<section class="section-padding">
    <div data-aos="fade-up" class="max-w-7xl mx-auto w-full bg-white content-padding">
        <div class="min-h-[30vh] flex flex-col justify-center items-center text-center gap-6">
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