<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

define('UPLOAD_DIR', '../../../uploads/news/');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $_SESSION['news'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

/* ─── Validate ─────────────────────────────────────────────────────────── */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['news'] = 'Invalid article ID.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

/* ─── Fetch before delete ──────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT title, image FROM news WHERE id = ?");
if (!$stmt) {
    $_SESSION['news'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$article = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$article) {
    $_SESSION['news'] = 'Article not found.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

/* ─── Delete ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
if (!$stmt) {
    $_SESSION['news'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    $_SESSION['news'] = 'Deletion failed. Please try again.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

$stmt->close();

/* ─── Delete local file if not a URL ──────────────────────────────────── */
if (!empty($article['image']) && !filter_var($article['image'], FILTER_VALIDATE_URL)) {
    $file_path = UPLOAD_DIR . basename($article['image']);
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

$_SESSION['news-success'] = 'Article "' . htmlspecialchars($article['title']) . '" deleted successfully.';
header('Location: ' . $url . 'admin/news/');
exit;
