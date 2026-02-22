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
    <main class="flex-1 overflow-y-auto md:p-6 p-3">
        <div class="flex md:items-center items-start justify-between md:flex-row flex-col mb-6">
            <h3 class="text-2xl font-bold text-accent-dark">Hero Carousel Management</h3>
            <button class="btn-primary py-2 flex items-center space-x-2">
                <i class="fi fi-rr-add translate-y-0.5 text-accent"></i>
                <span>Add New Slide</span>
            </button>
        </div>
        <div class="w-full gap-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-6 gap-3">
                <!-- Slide Card 1 -->
                <div class="bg-white card  border border-transparent hover:border-gray-200 p-3 group">
                    <!-- Image Preview -->
                    <div class="relative bg-gray-100 overflow-hidden aspect-video">
                        <img src="https://plus.unsplash.com/premium_photo-1663039952001-48ffa8f42c78?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slide 1"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <!-- Order Badge -->
                        <div class="absolute top-2 left-2 bg-accent text-white text-xs font-bold px-2 py-1">
                            Slide #1
                        </div>

                        <div class="absolute top-2 right-2 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-end gap-2">
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="View">
                                    <i class="fi fi-rr-eye mt-1"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="Delete">
                                    <i class="fi fi-rr-trash mt-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Card 1 -->
                <div class="bg-white card  border border-transparent hover:border-gray-200 p-3 group">
                    <!-- Image Preview -->
                    <div class="relative bg-gray-100 overflow-hidden aspect-video">
                        <img src="https://plus.unsplash.com/premium_photo-1663039952001-48ffa8f42c78?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slide 1"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <!-- Order Badge -->
                        <div class="absolute top-2 left-2 bg-accent text-white text-xs font-bold px-2 py-1">
                            Slide #1
                        </div>

                        <div class="absolute top-2 right-2 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-end gap-2">
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="View">
                                    <i class="fi fi-rr-eye mt-1"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="Delete">
                                    <i class="fi fi-rr-trash mt-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Card 1 -->
                <div class="bg-white card  border border-transparent hover:border-gray-200 p-3 group">
                    <!-- Image Preview -->
                    <div class="relative bg-gray-100 overflow-hidden aspect-video">
                        <img src="https://plus.unsplash.com/premium_photo-1663039952001-48ffa8f42c78?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slide 1"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <!-- Order Badge -->
                        <div class="absolute top-2 left-2 bg-accent text-white text-xs font-bold px-2 py-1">
                            Slide #1
                        </div>

                        <div class="absolute top-2 right-2 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-end gap-2">
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="View">
                                    <i class="fi fi-rr-eye mt-1"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="Delete">
                                    <i class="fi fi-rr-trash mt-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Card 1 -->
                <div class="bg-white card  border border-transparent hover:border-gray-200 p-3 group">
                    <!-- Image Preview -->
                    <div class="relative bg-gray-100 overflow-hidden aspect-video">
                        <img src="https://plus.unsplash.com/premium_photo-1663039952001-48ffa8f42c78?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slide 1"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <!-- Order Badge -->
                        <div class="absolute top-2 left-2 bg-accent text-white text-xs font-bold px-2 py-1">
                            Slide #1
                        </div>

                        <div class="absolute top-2 right-2 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-end gap-2">
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="View">
                                    <i class="fi fi-rr-eye mt-1"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="Delete">
                                    <i class="fi fi-rr-trash mt-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Card 1 -->
                <div class="bg-white card  border border-transparent hover:border-gray-200 p-3 group">
                    <!-- Image Preview -->
                    <div class="relative bg-gray-100 overflow-hidden aspect-video">
                        <img src="https://plus.unsplash.com/premium_photo-1663039952001-48ffa8f42c78?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slide 1"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <!-- Order Badge -->
                        <div class="absolute top-2 left-2 bg-accent text-white text-xs font-bold px-2 py-1">
                            Slide #1
                        </div>

                        <div class="absolute top-2 right-2 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-end gap-2">
                                <button class="w-10 h-10 flex items-center justify-center text-white bg-accent transition-colors"
                                    title="View">
                                    <i class="fi fi-rr-eye mt-1"></i>
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
        </div>
    </main>
</div>


<!-- Add Slide Modal -->
<div id="addSlideModal" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
    <div class="bg-white shadow-lg w-full max-w-md md:p-6 p-3 m-3 relative">
        <button id="closeAddSlideModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class="fi fi-rr-cross translate-y-0.5 hover:text-accent"></i>
        </button>
        <?php
        require_once ROOT_PATH . '/components/addSlideModal.php';
        ?>
    </div>
</div>


<?php
require_once ROOT_PATH . '/components/footer.php';
?>