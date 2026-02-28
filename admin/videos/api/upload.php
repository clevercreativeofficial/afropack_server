<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['video'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
// $id          = isset($_POST['video_id'])  ? (int)$_POST['video_id']  : 0;
$title       = trim($_POST['title']       ?? '');
$description = trim($_POST['description'] ?? '');
$youtube_url = trim($_POST['youtube_url'] ?? '');

// if ($id <= 0) {
//     $_SESSION['video'] = 'Invalid video ID.';
//     header('Location: ' . $url . 'admin/videos/');
//     exit;
// }

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

/* ─── Insert ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("INSERT INTO videos (title, description, youtube_url) VALUES(?, ?, ?)");
if (!$stmt) {
    $_SESSION['video'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->bind_param('sss', $title, $description, $youtube_url);

if (!$stmt->execute()) {
    $_SESSION['video'] = 'Upload failed. Please try again.';
    header('Location: ' . $url . 'admin/videos/');
    exit;
}

$stmt->close();

$_SESSION['video-success'] = 'Video "' . htmlspecialchars($title) . '" uploaded successfully.';
header('Location: ' . $url . 'admin/videos/');
exit;
