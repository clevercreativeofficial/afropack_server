<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';

// Fetch published events
$events = $conn->query("
    SELECT id, name, description, event_date, location, more_info, image, created_at 
    FROM events
    WHERE is_published = 1 
    ORDER BY created_at DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<!-- hero section -->
<section class="relative h-[40vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="w-full h-full overflow-hidden">
        <img class="w-full h-full object-cover opacity-30"
            src="<?= $url ?>assets/images/events.jpg" alt="Events">
    </div>
</section>

<!-- Premium Events Section -->
<section class="section-padding">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div data-aos="fade-up">
            <?php
            render_header_section(
                "Industry Engagement",
                "Upcoming",
                "Events & Exhibitions",
                "Join us at premier industry events worldwide to explore innovations, network with experts, and discover cutting-edge processing solutions."
            );
            ?>
        </div>

        <?php if (!empty($events)): ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <?php foreach ($events as $event):
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
                    <div data-aos="fade-up" class="group relative bg-white shadow-2xl shadow-gray-200 transition-all duration-300 
                       border border-gray-100 hover:border-accent/20 overflow-hidden">
                        <!-- Event Date Badge -->
                        <div class="absolute top-6 left-6 z-10">
                            <div class="bg-white bg-opacity-60 backdrop-blur-sm shadow-lg px-4 py-3 text-center">
                                <div class="text-accent-dark font-bold text-xl leading-none">
                                    <?= $event['event_date'] ? date('d', strtotime($event['event_date'])) : '—' ?>
                                </div>
                                <div class="text-gray-600 text-sm font-medium mt-1">
                                    <?= $event['event_date'] ? date('M', strtotime($event['event_date'])) : '' ?>
                                </div>
                                <div class="text-gray-500 text-xs">
                                    <?= $event['event_date'] ? date('Y', strtotime($event['event_date'])) : '' ?>
                                </div>
                            </div>
                        </div>

                        <!-- Event Image -->
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                src="<?= $img_src ?>"
                                alt="<?= htmlspecialchars($event['name']) ?>"
                                onerror="this.src='<?= $url ?>assets/images/placeholder.png'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>

                        <!-- Event Content -->
                        <div class="p-6">
                            <h3
                                class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-accent-dark transition-colors">
                                <?= htmlspecialchars($event['name']) ?>
                            </h3>

                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <i class="fi fi-rr-calendar w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                                    <span class="text-sm"><?= date('F j, Y', strtotime($event['event_date'] ?? $event['created_at'])) ?></span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fi fi-rr-marker w-5 h-5 text-gray-400 mr-1 flex-shrink-0"></i>
                                    <span class="text-sm"><?= htmlspecialchars($event['location']) ?></span>
                                </div>
                            </div>

                            <p class="text-gray-600 text-sm mb-6 line-clamp-2">
                                <?= htmlspecialchars($event['description']) ?>
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <a href="<?= $url ?>news-and-resources/upcoming-events/id?id=<?= $event['id'] ?>/" class="inline-flex items-center text-accent-dark font-semibold group text-sm">
                                    <span>View Details</span>
                                    <i
                                        class="fi fi-rr-angle-small-right w-4 h-4 ml-2 text-accent transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 py-16">No events scheduled yet.</p>
        <?php endif; ?>

    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div data-aos="fade-up" class="max-w-7xl mx-auto w-full bg-white content-padding">
        <div class="min-h-[30vh] flex flex-col justify-center items-center text-center gap-6">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800">
                Let's Build Your Success <span class="text-accent">Together</span>
            </h2>

            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Our team of experts is ready to help you find the perfect solution for your processing and packaging
                needs.
            </p>
            <?php
            render_button(
                "Contact Us",
                "$url" . "contact",
                "outline",
            );
            ?>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
require_once ROOT_PATH . '/components/footer.php';
?>

</body>

</html>