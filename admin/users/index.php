<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

// Fetch users
$sql    = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
$users  = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div id="users" class="dashboard-section max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Users Management</h3>
                <a href="<?= $url ?>admin/users/add/"
                    class="bg-accent sm:w-auto w-full text-center text-white px-4 py-2">
                    Add New User
                </a>
            </div>

            <div class="w-full bg-white overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-surface">
                            <th class="p-3 text-left">Full Name</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Role</th>
                            <th class="p-3 text-left">Joined</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="p-3">
                                        <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>
                                    </td>
                                    <td class="p-3 text-gray-500">
                                        <?= htmlspecialchars($user['email']) ?>
                                    </td>
                                    <td class="p-3">
                                        <?php if ($user['role'] === 'admin'): ?>
                                            <small class="px-2 py-1 bg-purple-100 text-purple-800 text-xs">Admin</small>
                                        <?php else: ?>
                                            <small class="px-2 py-1 bg-green-100 text-green-800 text-xs">Author</small>
                                        <?php endif; ?>
                                    </td>
                                    <td class="p-3 text-gray-500 text-sm">
                                        <?= date('M d, Y', strtotime($user['created_at'])) ?>
                                    </td>
                                    <td class="p-3 flex items-center gap-3">
                                        <a href="<?= $url ?>admin/users/edit/?id=<?= $user['id'] ?>"
                                            class="text-accent hover:text-accent-dark"
                                            title="Edit">
                                            <i class="fi fi-rr-edit"></i>
                                        </a>
                                        <form method="POST" action="<?= $url ?>admin/users/api/delete.php"
                                            onsubmit="return confirm('Delete <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>? This cannot be undone.')">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">
                                                <i class="fi fi-rr-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="p-3 text-center text-gray-500 text-sm">No users found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>
<?php require_once ROOT_PATH . '/components/footer.php'; ?>