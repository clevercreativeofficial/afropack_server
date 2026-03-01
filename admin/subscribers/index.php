<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

$total       = $conn->query("SELECT COUNT(*) AS t FROM subscribers")->fetch_assoc()['t'];
$subscribers = $conn->query("SELECT * FROM subscribers ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Newsletter Subscribers</h3>
            </div>

            <div class="bg-white card p-6">
                <div class="flex justify-between items-center mb-4">
                    <p>Total Subscribers:
                        <span class="font-semibold text-accent"><?= number_format($total) ?></span>
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-surface">
                                <th class="p-3 text-left">Email</th>
                                <th class="p-3 text-left">Subscribed</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <?php if (!empty($subscribers)): ?>
                                <?php foreach ($subscribers as $sub): ?>
                                    <tr>
                                        <td class="p-3"><?= htmlspecialchars($sub['email']) ?></td>
                                        <td class="p-3 text-gray-500 text-sm">
                                            <?= date('M d, Y', strtotime($sub['created_at'])) ?>
                                        </td>
                                        <td class="p-3">
                                            <form method="POST"
                                                action="<?= $url ?>admin/subscribers/api/delete.php"
                                                onsubmit="return confirm('Remove <?= htmlspecialchars($sub['email']) ?> from subscribers?')">
                                                <input type="hidden" name="id" value="<?= $sub['id'] ?>">
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 text-sm">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="p-3 text-center text-gray-400">No subscribers yet.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>
<?php require_once ROOT_PATH . '/components/footer.php'; ?>