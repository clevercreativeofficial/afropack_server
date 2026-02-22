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
                <div class="w-full bg-white overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-surface">
                                <th class="p-3 text-left">Full Name</th>
                                <th class="p-3 text-left">Role</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <tr>
                                <td class="p-3">Admin User</td>
                                <td class="p-3">
                                    <small class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Admin</small>
                                </td>
                                <td class="p-3">
                                    <button class="text-accent hover:text-accent-dark mr-2">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                    <button class="text-red-500 hover:text-red-700">
                                        <i class="fi fi-rr-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div id="addSlideModal" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
    <div class="bg-white shadow-lg w-full max-w-md md:p-6 p-3 m-3 relative">
        <button id="closeAddSlideModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class="fi fi-rr-cross translate-y-0.5 hover:text-accent"></i>
        </button>
        <?php
        require_once ROOT_PATH . '/components/updateUserModal.php';
        ?>
    </div>
</div>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>