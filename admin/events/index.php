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
        <!-- Events Management -->
        <div id="events" class="dashboard-section">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Events Management</h3>
                <button class="btn-primary px-4 py-2 flex items-center space-x-2">
                    <i class="fi fi-rr-plus"></i>
                    <span>Add Event</span>
                </button>
            </div>
            <div class="w-full flex flex-col lg:flex-row gap-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 pb-16">

                    <div data-aos="fade-up" class="bg-white border border-gray-200 group duration-300 transition-all relative">
                        <div class="relative h-48 w-full overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                src="https://www.tnasolutions.com/wp-content/uploads/2024/12/62nd-AEA-scaled.jpg"
                                alt="62nd AEA Conference">
                            <div class="absolute top-4 left-4 bg-accent px-3 py-1">
                                <small class="text-white font-medium">Dec 12</small>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="block group-hover:text-accent transition-colors duration-300">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                                    62nd AEA Conference participation
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Showcasing latest advancements in food processing automation at the premier industry
                                    conference.
                                </p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-gray-100">
                                <small
                                    class="!text-gray-500 flex items-center">
                                    <i class="fi fi-rr-marker mr-2 mt-1 text-xs"></i>
                                    San Francisco, USA
                                </small>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="absolute top-4 right-4 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                title="View">
                                <i class="fi fi-rr-eye mt-1"></i>
                            </button>
                            <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                title="Edit">
                                <i class="fi fi-rr-edit mt-1"></i>
                            </button>
                            <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                title="Delete">
                                <i class="fi fi-rr-trash mt-1"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div id="addSlideModal" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
    <div class="bg-white shadow-lg w-full max-w-md md:p-6 p-3 m-3 relative">
        <button id="closeAddSlideModal" class="absolute top-3 right-3 h-10 w-10 flex items-center justify-center bg-gray-100 text-gray-500 hover:text-gray-700">
            <i class="fi fi-rr-cross translate-y-0.5 hover:text-accent"></i>
        </button>
        <div class="overflow-y-auto max-h-[80vh]">
            <?php
            require_once ROOT_PATH . '/components/addEventModal.php';
            ?>
        </div>
    </div>
</div>


<?php
require_once ROOT_PATH . '/components/footer.php';
?>