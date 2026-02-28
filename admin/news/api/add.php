<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

define('UPLOAD_DIR', '../../../uploads/news/');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['news'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$title        = trim($_POST['title']     ?? '');
$category     = trim($_POST['category']  ?? '');
$body         = trim($_POST['body']      ?? '');
$image_url    = trim($_POST['image_url'] ?? '');
$is_published = isset($_POST['is_published']) ? 1 : 0;

$errors = [];

if ($title === '') {
    $errors[] = 'Title is required.';
}
if ($body === '') {
    $errors[] = 'Body is required.';
}
if ($image_url !== '' && !filter_var($image_url, FILTER_VALIDATE_URL)) {
    $errors[] = 'Image URL must be a valid URL.';
}

if (!empty($errors)) {
    $_SESSION['news'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/news/');
    exit;
}

/* ─── Image handling (URL takes priority) ─────────────────────────────── */
$image = null;

if ($image_url !== '') {
    // Store URL directly
    $image = $image_url;

} elseif (!empty($_FILES['image_file']['name'])) {
    $file    = $_FILES['image_file'];
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $mime    = mime_content_type($file['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        $_SESSION['news'] = 'Invalid image type. Allowed: JPG, PNG, WEBP, GIF.';
        header('Location: ' . $url . 'admin/news/');
        exit;
    }

    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = bin2hex(random_bytes(16)) . '.' . strtolower($ext);

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    if (!move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $filename)) {
        $_SESSION['news'] = 'Failed to save image file.';
        header('Location: ' . $url . 'admin/news/');
        exit;
    }

    // Store filename only
    $image = $filename;
}

/* ─── Insert ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("INSERT INTO news (title, category, body, image, is_published) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    $_SESSION['news'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

$stmt->bind_param('ssssi', $title, $category, $body, $image, $is_published);

if (!$stmt->execute()) {
    $_SESSION['news'] = 'Failed to add article. Please try again.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

$stmt->close();

$status = $is_published ? 'published' : 'saved as draft';
$_SESSION['news-success'] = 'Article "' . htmlspecialchars($title) . '" ' . $status . ' successfully.';
header('Location: ' . $url . 'admin/news/');
exit;