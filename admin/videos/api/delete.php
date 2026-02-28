<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $_SESSION['video'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

/* ─── Validate ─────────────────────────────────────────────────────────── */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['video'] = 'Invalid video ID.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

/* ─── Fetch before delete ──────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT title FROM videos WHERE id = ?");
if (!$stmt) {
    $_SESSION['video'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$video = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$video) {
    $_SESSION['video'] = 'Video not found.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

/* ─── Delete ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("DELETE FROM videos WHERE id = ?");
if (!$stmt) {
    $_SESSION['video'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    $_SESSION['video'] = 'Deletion failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->close();

$_SESSION['video-success'] = 'Video "' . htmlspecialchars($video['title']) . '" deleted successfully.';
header('Location: ' . $url . 'admin/videos/');
exit;