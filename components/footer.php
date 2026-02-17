<!-- Footer -->
<footer class="bg-accent-dark text-text-light md:pt-20 pt-10">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex justify-evenly md:flex-row flex-col gap-8 py-20">
            <!-- Contact Information -->
            <div data-aos="fade-up">
                <h3 class="text-xl text-white font-bold mb-4">Contact Us</h3>
                <p class="text-sm text-neutral-400 mb-2">
                    Email:
                    <a href="mailto:contact@afropack.com"
                        class="hover:text-accent">contact@afropack.com</a>
                </p>
                <p class="text-sm text-neutral-400 mb-2">
                    Phone:
                    <a href="tel:+25779916116" class="hover:text-accent">+257 79 916 116</a> |
                    <a href="tel:+25779819453" class="hover:text-accent">+257 79 819 453</a>
                </p>
                <p class="text-sm text-neutral-400">Address: Bujumbura, Burundi</p>
            </div>

            <!-- Quick Links -->
            <div data-aos="fade-up">
                <h3 class="text-xl text-white font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <!-- Deep links to popular subpages -->
                    <li><a href="<?= $url ?>solutions/beverage-processing-and-filling-equipment" class="text-sm text-neutral-400 hover:text-accent">
                            Beverage Equipment
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a></li>

                    <!-- Support/Service links -->
                    <li><a href="<?= $url ?>support/request-quote" class="text-sm text-neutral-400 hover:text-accent">
                            Request a Quote
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a></li>

                    <!-- Resource links -->
                    <li><a href="<?= $url ?>news-and-resources/brochures" class="text-sm text-neutral-400 hover:text-accent">
                            Download Brochures
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a></li>

                    <!-- Contact alternatives -->
                    <li><a href="<?= $url ?>contact/sales" class="text-sm text-neutral-400 hover:text-accent">
                            Sales Department
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a></li>

                    <!-- Utility links -->
                    <li><a href="<?= $url ?>sitemap" class="text-sm text-neutral-400 hover:text-accent">
                            Sitemap
                            <i class="fi fi-rr-arrow-up-right-from-square ml-2"></i>
                        </a></li>
                </ul>
            </div>

            <!-- Newsletter Signup -->
            <div data-aos="fade-up" class="md:max-w-[315px] w-full">
                <h3 class="text-xl text-white font-bold mb-4">Subscribe</h3>
                <p class="text-sm text-neutral-400 mb-4">
                    Subscribe to our newsletter to receive the latest updates on our food processing and packaging innovations.
                </p>
                <form class="flex sm:flex-row flex-col sm:gap-0 gap-2 w-full">
                    <input type="email" placeholder="Your email"
                        class="w-full bg-background text-sm text-text-color outline-none focus:border-accent border border-transparent duration-500 p-3" required>
                    <button type="submit"
                        class="inline-block py-3 px-4 bg-accent hover:bg-accent/80 text-white text-sm duration-300 ease-in-out">
                        <i class="fi fi-rr-arrow-small-right inline-block mt-1"></i>
                    </button>
                </form>
            </div>

            <!-- Social Media Links -->
            <div data-aos="fade-up" class="md:max-w-[250px] w-full">
                <h3 class="text-xl text-white font-bold mb-4">Follow us</h3>
                <p class="text-sm text-neutral-400 mb-4">
                    Join our community and stay updated with the latest industry insights.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white text-lg hover:text-accent"><i
                            class="fi fi-brands-facebook"></i></a>
                    <a href="#" class="text-white text-lg hover:text-accent"><i
                            class="fi fi-brands-twitter-alt"></i></a>
                    <a href="#" class="text-white text-lg hover:text-accent"><i
                            class="fi fi-brands-instagram"></i></a>
                    <a href="#" class="text-white text-lg hover:text-accent"><i
                            class="fi fi-brands-linkedin"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center flex md:flex-row flex-col justify-between mt-8 border-t border-neutral-800 py-6">
            <p class="text-sm text-neutral-400">
                © <span id="copyright"></span> AFROPACK GROUP — All rights reserved.
            </p>
            <!-- Back to Top Button -->
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

<!-- dropdown -->
<script src="<?= $url ?>assets/js/dropdown.js"></script>

<!-- custom color -->
<script src="<?= $url ?>assets/js/tailwind_config.js"></script>

<!-- Auto year update -->
<script type="text/javascript" src="<?= $url ?>assets/js/year_update.js"></script>

<!-- navbar accordions scripts -->
<script type="text/javascript" src="<?= $url ?>assets/js/navbar.js"></script>

<!-- Jquery-->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- loader -->
<script type="text/javascript" src="<?= $url ?>assets/js/loader.js"></script>

<!-- AOS Animation -->
<script>
    AOS.init();
</script>