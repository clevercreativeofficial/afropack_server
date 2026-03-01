<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';

// Fetch all settings into a key => value map
$rows     = $conn->query("SELECT `key`, value FROM settings")->fetch_all(MYSQLI_ASSOC);
$settings = array_column($rows, 'value', 'key');

require_once ROOT_PATH . '/components/header.php';
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="settings" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Settings</h3>
            </div>

            <form action="<?= $url ?>admin/settings/api/save.php" method="POST">
                <div class="bg-white card p-6 space-y-8">

                    <!-- General Settings -->
                    <div>
                        <h4 class="font-semibold mb-4 text-lg">General Settings</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Contact Email</label>
                                <input type="email" name="contact_email"
                                    value="<?= htmlspecialchars($settings['contact_email'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="info@example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Contact Phone</label>
                                <input type="text" name="contact_phone"
                                    value="<?= htmlspecialchars($settings['contact_phone'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="+1 234 567 8900">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-2">Contact Address</label>
                                <input type="text" name="contact_address"
                                    value="<?= htmlspecialchars($settings['contact_address'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="123 Street, City, Country">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <!-- Social Media -->
                    <div>
                        <h4 class="font-semibold mb-4 text-lg">Social Media Links</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <i class="fi fi-brands-facebook text-blue-600 text-xl w-6 text-center"></i>
                                <input type="url" name="facebook_url"
                                    value="<?= htmlspecialchars($settings['facebook_url'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="https://facebook.com/yourpage">
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fi fi-brands-instagram text-rose-700 text-xl w-6 text-center"></i>
                                <input type="url" name="instagram_url"
                                    value="<?= htmlspecialchars($settings['instagram_url'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="https://instagram.com/yourpage">
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fi fi-brands-twitter-alt text-black text-xl w-6 text-center"></i>
                                <input type="url" name="twitter_url"
                                    value="<?= htmlspecialchars($settings['twitter_url'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="https://x.com/yourpage">
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fi fi-brands-linkedin text-sky-700 text-xl w-6 text-center"></i>
                                <input type="url" name="linkedin_url"
                                    value="<?= htmlspecialchars($settings['linkedin_url'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="https://linkedin.com/company/yourpage">
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fi fi-brands-youtube text-red-600 text-xl w-6 text-center"></i>
                                <input type="url" name="youtube_url"
                                    value="<?= htmlspecialchars($settings['youtube_url'] ?? '') ?>"
                                    class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                    placeholder="https://youtube.com/@yourchannel">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="outline-none md:w-fit py-3 px-6 bg-accent text-white hover:bg-accent-dark duration-300">
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>
<?php require_once ROOT_PATH . '/components/footer.php'; ?>