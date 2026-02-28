<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/components/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['user'] = 'Invalid user ID.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$user) {
    $_SESSION['user'] = 'User not found.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}
?>

<div class="flex-1 flex flex-col overflow-hidden">
    <?php require_once ROOT_PATH . '/components/topbar.php'; ?>

    <main class="flex-1 overflow-y-auto py-6 px-3">
        <div class="dashboard-section max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Edit User</h3>
                <a href="<?= $url ?>admin/users/"
                    class="bg-accent sm:w-auto w-full text-center text-white px-4 py-2">
                    Back
                </a>
            </div>

            <form action="<?= $url ?>admin/users/api/edit.php" method="POST"
                class="w-full bg-white space-y-4 py-6 px-4">

                <div class="grid grid-cols-1 gap-4">
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">First Name</label>
                            <input type="text" name="first_name"
                                value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="John" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Last Name</label>
                            <input type="text" name="last_name"
                                value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                                placeholder="Doe" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" name="email"
                            value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="john@example.com" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Role</label>
                        <select name="role"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300 bg-white">
                            <option value="author" <?= $user['role'] === 'author' ? 'selected' : '' ?>>Author</option>
                            <option value="admin"  <?= $user['role'] === 'admin'  ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>

                    <hr class="border-gray-200">
                    <p class="text-sm text-gray-500">Leave password fields empty to keep the current password.</p>

                    <div>
                        <label class="block text-sm font-medium mb-2">New Password</label>
                        <input type="password" name="password"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Min. 8 characters">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Confirm New Password</label>
                        <input type="password" name="confirm_password"
                            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                            placeholder="Repeat new password">
                    </div>
                </div>

                <button type="submit"
                    class="outline-none md:w-fit py-3 px-6 bg-accent text-white hover:bg-accent-dark duration-300">
                    Update User
                </button>
            </form>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . '/config/notifications.php'; ?>
<script src="<?= $url ?>admin/assets/js/form_validation.js"></script>
<?php require_once ROOT_PATH . '/components/footer.php'; ?>