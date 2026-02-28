<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['user'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id <= 0) {
    $_SESSION['user'] = 'Invalid user ID.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

/* ─── Fetch before delete ──────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE id = ?");
if (!$stmt) {
    $_SESSION['user'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$user) {
    $_SESSION['user'] = 'User not found.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

/* ─── Delete ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
if (!$stmt) {
    $_SESSION['user'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    $_SESSION['user'] = 'Deletion failed. Please try again.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

$stmt->close();

$full_name = $user['first_name'] . ' ' . $user['last_name'];
$_SESSION['user-success'] = 'User "' . htmlspecialchars($full_name) . '" deleted successfully.';
header('Location: ' . $url . 'admin/users/');
exit;
