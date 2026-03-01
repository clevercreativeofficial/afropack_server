<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';
require_once ROOT_PATH . '/components/header_section.php';
require_once ROOT_PATH . '/components/button.php';

// Fetch settings
$rows     = $conn->query("SELECT `key`, value FROM settings")->fetch_all(MYSQLI_ASSOC);
$settings = array_column($rows, 'value', 'key');
?>

<!-- Hero Section -->
<section class="relative h-[40vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="w-full h-full overflow-hidden">
        <img class="w-full h-full object-cover opacity-30"
            src="<?= $url ?>assets/images/contact-us-banner.jpg" alt="Contact Image">
    </div>
</section>

<!-- Contact Section -->
<section class="bg-gradient-to-b from-gray-50 to-white section-padding">
    <div class="max-w-5xl mx-auto">

        <div data-aos="fade-up">
            <?php
            render_header_section(
                "Get in Touch",
                "Let's",
                "Connect",
                "Product enquiry, feedback or question? We always appreciate hearing from you.
                Our team is ready to assist with your processing and packaging needs."
            );
            ?>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">

            <!-- Contact Form -->
            <div class="bg-white p-8 shadow-2xl shadow-gray-100">
                <div data-aos="fade-up" class="flex items-center gap-4 mb-8">
                    <h3 class="text-3xl font-bold text-gray-900">Send Us a Message</h3>
                </div>

                <form data-aos="fade-up" action="<?= $url ?>contact/api/send.php" method="POST" class="space-y-6">
                    <div class="flex flex-col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" required
                            class="border-b border-gray-300 py-3 focus:ring-accent focus:border-accent outline-none duration-300"
                            placeholder="Your full name">
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" required
                            class="border-b border-gray-300 py-3 focus:ring-accent focus:border-accent outline-none duration-300"
                            placeholder="Your email address">
                    </div>
                    <div class="flex flex-col">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" required
                            class="border-b border-gray-300 py-3 focus:ring-accent focus:border-accent outline-none duration-300"
                            placeholder="What is this regarding?">
                    </div>
                    <div class="flex flex-col">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" rows="2" required
                            class="border-b border-gray-300 py-3 focus:ring-accent focus:border-accent outline-none duration-300"
                            placeholder="Tell us about your project or inquiry..."></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-accent text-white px-8 py-4 font-semibold hover:bg-accent-dark duration-300 ease-in-out flex items-center justify-center gap-2">
                        Send Message
                    </button>
                </form>

                <?php include_once ROOT_PATH . '/config/notifications.php'; ?>
            </div>

            <!-- Contact Information -->
            <div class="bg-white shadow-2xl shadow-gray-100">
                <div data-aos="fade-up" class="content-box card-padding">
                    <div class="flex items-center gap-4 mb-8">
                        <h3 class="text-3xl font-bold text-gray-900">Contact Information</h3>
                    </div>

                    <div class="space-y-6">
                        <?php if (!empty($settings['contact_address'])): ?>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-map-marker"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Address</h4>
                                    <p class="text-gray-600 text-sm"><?= htmlspecialchars($settings['contact_address']) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['contact_phone'])): ?>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-phone-call"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Phone</h4>
                                    <a href="tel:<?= htmlspecialchars($settings['contact_phone']) ?>"
                                        class="text-gray-600 text-sm hover:text-accent transition-colors">
                                        <?= htmlspecialchars($settings['contact_phone']) ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['contact_email'])): ?>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent flex-shrink-0">
                                    <i class="fi fi-rr-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                                    <a href="mailto:<?= htmlspecialchars($settings['contact_email']) ?>"
                                        class="text-gray-600 text-sm hover:text-accent transition-colors">
                                        <?= htmlspecialchars($settings['contact_email']) ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent flex-shrink-0">
                                <i class="fi fi-rr-clock"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Working Hours</h4>
                                <p class="text-gray-600 text-sm">Monday - Friday: 8:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div data-aos="fade-up" class="content-box card-padding">
                    <p class="text-gray-600 my-6">
                        Stay connected with us on social media for the latest updates and industry insights.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <?php
                        $socials = [
                            'facebook_url'  => 'fi-brands-facebook',
                            'twitter_url'   => 'fi-brands-twitter-alt',
                            'linkedin_url'  => 'fi-brands-linkedin',
                            'youtube_url'   => 'fi-brands-youtube',
                            'instagram_url' => 'fi-brands-instagram',
                        ];
                        foreach ($socials as $key => $icon):
                            if (!empty($settings[$key])):
                        ?>
                            <a href="<?= htmlspecialchars($settings[$key]) ?>"
                                target="_blank" rel="noopener noreferrer"
                                class="w-12 h-12 flex items-center justify-center bg-red-50 text-accent 
                                       hover:bg-accent hover:text-white transition-all duration-300">
                                <i class="fi <?= $icon ?> text-xl"></i>
                            </a>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT_PATH . '/components/footer.php'; ?>
</body>
</html>