<?php
// Fetch all settings into a key => value map
$rows     = $conn->query("SELECT `key`, value FROM settings")->fetch_all(MYSQLI_ASSOC);
$settings = array_column($rows, 'value', 'key');
?>

<footer class="bg-accent-dark text-text-light md:pt-20 pt-10">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex justify-evenly md:flex-row flex-col gap-8 py-20">

            <!-- Contact Information -->
            <div data-aos="fade-up">
                <h3 class="text-xl text-white font-bold mb-4">Contact Us</h3>
                <?php if (!empty($settings['contact_email'])): ?>
                    <p class="text-sm text-neutral-400 mb-2">
                        Email:
                        <a href="mailto:<?= htmlspecialchars($settings['contact_email']) ?>"
                            class="hover:text-accent block">
                            <?= htmlspecialchars($settings['contact_email']) ?>
                        </a>
                    </p>
                <?php endif; ?>
                <?php if (!empty($settings['contact_phone'])): ?>
                    <p class="text-sm text-neutral-400 mb-2">
                        Phone:
                        <a href="tel:<?= htmlspecialchars($settings['contact_phone']) ?>"
                            class="hover:text-accent block">
                            <?= htmlspecialchars($settings['contact_phone']) ?>
                        </a>
                    </p>
                <?php endif; ?>
                <?php if (!empty($settings['contact_address'])): ?>
                    <p class="text-sm text-neutral-400 mb-2">
                        <?= htmlspecialchars($settings['contact_address']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Quick Links -->
            <div data-aos="fade-up">
                <h3 class="text-xl text-white font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="<?= $url ?>news-and-resources/brochures/"
                            class="text-sm text-neutral-400 hover:text-accent">
                            Download Brochures
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>news-and-resources/upcoming-events/"
                            class="text-sm text-neutral-400 hover:text-accent">
                            Upcoming Events
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>news-and-resources/news/"
                            class="text-sm text-neutral-400 hover:text-accent">
                            Latest News
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $url ?>contact/"
                            class="text-sm text-neutral-400 hover:text-accent">
                            Contact Us
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div data-aos="fade-up" class="md:max-w-[315px] w-full">
                <h3 class="text-xl text-white font-bold mb-4">Subscribe</h3>
                <p class="text-sm text-neutral-400 mb-4">
                    Subscribe to our newsletter to receive the latest updates on our food processing and packaging innovations.
                </p>
                <form action="<?= $url ?>api/newsletter/subscribe.php" method="POST"
                    class="flex sm:flex-row flex-col sm:gap-0 gap-2 w-full">
                    <input type="email" name="email" placeholder="Your email"
                        class="w-full bg-background text-sm text-text-color outline-none focus:border-accent border border-transparent duration-500 p-3"
                        required>
                    <button type="submit"
                        class="inline-block py-3 px-4 bg-accent hover:bg-accent/80 text-white text-sm duration-300 ease-in-out">
                        <i class="fi fi-rr-arrow-small-right inline-block mt-1"></i>
                    </button>
                </form>
            </div>

            <!-- Social Media -->
            <div data-aos="fade-up" class="md:max-w-[250px] w-full">
                <h3 class="text-xl text-white font-bold mb-4">Follow Us</h3>
                <p class="text-sm text-neutral-400 mb-4">
                    Join our community and stay updated with the latest industry insights.
                </p>
                <?php
                $socials = [
                    'facebook_url'  => 'fi-brands-facebook',
                    'twitter_url'   => 'fi-brands-twitter-alt',
                    'instagram_url' => 'fi-brands-instagram',
                    'linkedin_url'  => 'fi-brands-linkedin',
                    'youtube_url'   => 'fi-brands-youtube',
                ];
                $has_socials = array_filter($socials, fn($key) => !empty($settings[$key]), ARRAY_FILTER_USE_KEY);
                ?>
                <?php if (!empty($has_socials)): ?>
                    <div class="flex space-x-4">
                        <?php foreach ($socials as $key => $icon):
                            if (empty($settings[$key])) continue;
                        ?>
                            <a href="<?= htmlspecialchars($settings[$key]) ?>"
                                target="_blank" rel="noopener noreferrer"
                                class="text-white text-lg hover:text-accent transition-colors duration-300">
                                <i class="fi <?= $icon ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-neutral-500 text-sm">Coming soon.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center flex md:flex-row flex-col justify-between mt-8 border-t border-neutral-800 py-6">
            <p class="text-sm text-neutral-400">
                © <span id="copyright"></span> AFROPACK GROUP — All rights reserved.
            </p>
            <div class="hidden md:block">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                    class="inline-flex items-center gap-2 text-neutral-400 hover:text-accent transition-colors duration-300 text-sm">
                    <i class="fi fi-rr-arrow-small-up"></i>
                    Back to Top
                </button>
            </div>
        </div>
    </div>
</footer>

<script src="<?= $url ?>assets/js/dropdown.js"></script>
<script src="<?= $url ?>assets/js/tailwind_config.js"></script>
<script type="text/javascript" src="<?= $url ?>assets/js/year_update.js"></script>
<script type="text/javascript" src="<?= $url ?>assets/js/navbar.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?= $url ?>assets/js/loader.js"></script>
<script>AOS.init();</script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>