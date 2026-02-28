<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['video'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$id          = isset($_POST['video_id'])   ? (int)$_POST['video_id']        : 0;
$title       = trim($_POST['title']        ?? '');
$description = trim($_POST['description']  ?? '');
$youtube_url = trim($_POST['youtube_url']  ?? '');

if ($id <= 0) {
    $_SESSION['video'] = 'Invalid video ID.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$errors = [];

if ($title === '') {
    $errors[] = 'Title is required.';
}
if (mb_strlen($description) > 250) {
    $errors[] = 'Description must not exceed 250 characters.';
}
if ($youtube_url === '') {
    $errors[] = 'YouTube URL is required.';
} elseif (!filter_var($youtube_url, FILTER_VALIDATE_URL)) {
    $errors[] = 'YouTube URL must be a valid URL.';
}

if (!empty($errors)) {
    $_SESSION['video'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

/* ─── Update ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("UPDATE videos SET title = ?, description = ?, youtube_url = ? WHERE id = ?");
if (!$stmt) {
    $_SESSION['video'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->bind_param('sssi', $title, $description, $youtube_url, $id);

if (!$stmt->execute()) {
    $_SESSION['video'] = 'Update failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->close();

$_SESSION['video-success'] = 'Video "' . htmlspecialchars($title) . '" updated successfully.';
header('Location: ' . $url . 'admin/videos/');
exit;
