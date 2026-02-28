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
$id           = isset($_POST['news_id'])      ? (int)$_POST['news_id']  : 0;
$title        = trim($_POST['title']          ?? '');
$category     = trim($_POST['category']       ?? '');
$body         = trim($_POST['body']           ?? '');
$image_url    = trim($_POST['image_url']      ?? '');
$is_published = isset($_POST['is_published']) ? 1 : 0;

if ($id <= 0) {
    $_SESSION['news'] = 'Invalid article ID.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

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
    header('Location: ' . $url . 'admin/news/edit/?id=' . $id);
    exit;
}

/* ─── Fetch existing record ────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT image FROM news WHERE id = ?");
if (!$stmt) {
    $_SESSION['news'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/news/edit/?id=' . $id);
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$existing = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$existing) {
    $_SESSION['news'] = 'Article not found.';
    header('Location: ' . $url . 'admin/news/');
    exit;
}

/* ─── Image handling (URL takes priority) ─────────────────────────────── */
$image = $existing['image']; // keep existing by default

if ($image_url !== '') {
    // New URL provided — delete old local file if it was an upload
    if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
        $old_file = UPLOAD_DIR . basename($image);
        if (file_exists($old_file)) unlink($old_file);
    }
    $image = $image_url;

} elseif (!empty($_FILES['image_file']['name'])) {
    $file    = $_FILES['image_file'];
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $mime    = mime_content_type($file['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        $_SESSION['news'] = 'Invalid image type. Allowed: JPG, PNG, WEBP, GIF.';
        header('Location: ' . $url . 'admin/news/edit/?id=' . $id);
        exit;
    }

    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = bin2hex(random_bytes(16)) . '.' . strtolower($ext);

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    if (!move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $filename)) {
        $_SESSION['news'] = 'Failed to save image file.';
        header('Location: ' . $url . 'admin/news/edit/?id=' . $id);
        exit;
    }

    // Delete old local file if it was an upload
    if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
        $old_file = UPLOAD_DIR . basename($image);
        if (file_exists($old_file)) unlink($old_file);
    }

    $image = $filename;
}

/* ─── Update ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("UPDATE news SET title = ?, category = ?, body = ?, image = ?, is_published = ? WHERE id = ?");
if (!$stmt) {
    $_SESSION['news'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/news/edit/?id=' . $id);
    exit;
}

$stmt->bind_param('ssssii', $title, $category, $body, $image, $is_published, $id);

if (!$stmt->execute()) {
    $_SESSION['news'] = 'Update failed. Please try again.';
    header('Location: ' . $url . 'admin/news/edit/?id=' . $id);
    exit;
}

$stmt->close();

$status = $is_published ? 'published' : 'saved as draft';
$_SESSION['news-success'] = 'Article "' . htmlspecialchars($title) . '" ' . $status . ' successfully.';
header('Location: ' . $url . 'admin/news/');
exit;