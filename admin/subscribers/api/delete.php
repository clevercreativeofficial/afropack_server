<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $url . 'admin/subscribers/');
    exit;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id <= 0) {
    $_SESSION['subscribe'] = 'Invalid subscriber ID.';
    header('Location: ' . $url . 'admin/subscribers/');
    exit;
}

$stmt = $conn->prepare("SELECT email FROM subscribers WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$sub = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$sub) {
    $_SESSION['subscribe'] = 'Subscriber not found.';
    header('Location: ' . $url . 'admin/subscribers/');
    exit;
}

$stmt = $conn->prepare("DELETE FROM subscribers WHERE id = ?");
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    $_SESSION['subscribe'] = 'Failed to remove subscriber.';
    header('Location: ' . $url . 'admin/subscribers/');
    exit;
}

$stmt->close();

$_SESSION['subscribe-success'] = htmlspecialchars($sub['email']) . ' removed successfully.';
header('Location: ' . $url . 'admin/subscribers/');
exit;