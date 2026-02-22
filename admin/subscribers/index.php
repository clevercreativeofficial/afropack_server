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
        <!-- Subscribers Management -->
        <div id="subscribers" class="dashboard-section">
            <h3 class="text-2xl font-bold mb-6 text-accent-dark">Newsletter Subscribers</h3>
            <div class="bg-white card p-6">
                <div class="flex justify-between items-center mb-4">
                    <p>Total Subscribers: <span class="font-semibold text-accent">1,234</span></p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-surface">
                                <th class="p-3 text-left">Email</th>
                                <th class="p-3 text-left">Subscription Date</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <tr>
                                <td class="p-3">example@email.com</td>
                                <td class="p-3">2024-03-01</td>
                                <td class="p-3">
                                    <button class="text-red-500 hover:text-red-700 text-sm">Unsubscribe</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>