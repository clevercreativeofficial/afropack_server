<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/components/header.php';
?>


<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Settings -->
        <div id="settings" class="dashboard-section">
            <h3 class="text-2xl font-bold mb-6 text-accent-dark">Settings</h3>
            <div class="bg-white card p-6">
                <div class="space-y-6">
                    <div>
                        <h4 class="font-semibold mb-4 text-lg">General Settings</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Contact Email</label>
                                <input type="email" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" value="afropackgroup@gmail.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Contact Phone</label>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" value="+393429801567">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Contact Address</label>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" value="123 Green Street, Bujumbura, Burundi">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4 text-lg">Social Media Links</h4>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <i class="fi fi-brands-facebook text-blue-600"></i>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Facebook URL">
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fi fi-brands-instagram text-rose-700"></i>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Instagram URL">
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fi fi-brands-twitter-alt text-black"></i>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="X URL">
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fi fi-brands-linkedin text-sky-700"></i>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="LinkedIn URL">
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fi fi-brands-youtube text-red-600"></i>
                                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="YouTube URL">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
                        Save Settings
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>