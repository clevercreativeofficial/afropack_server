<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

define('UPLOAD_DIR', ROOT_PATH . '/uploads/events/');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['event'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$name         = trim($_POST['name']        ?? '');
$description  = trim($_POST['description'] ?? '');
$event_date   = trim($_POST['event_date']  ?? '');
$location     = trim($_POST['location']    ?? '');
$more_info    = trim($_POST['more_info']   ?? '');
$image_url    = trim($_POST['image_url']   ?? '');
$is_published = isset($_POST['is_published']) ? 1 : 0;

$errors = [];

if ($name === '') {
    $errors[] = 'Event name is required.';
}
if (mb_strlen($description) > 250) {
    $errors[] = 'Description must not exceed 250 characters.';
}
if ($event_date === '' || !strtotime($event_date)) {
    $errors[] = 'A valid event date is required.';
}
if ($more_info !== '' && !filter_var($more_info, FILTER_VALIDATE_URL)) {
    $errors[] = 'More Info must be a valid URL.';
}
if ($image_url !== '' && !filter_var($image_url, FILTER_VALIDATE_URL)) {
    $errors[] = 'Image URL must be a valid URL.';
}

if (!empty($errors)) {
    $_SESSION['event'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/events/');
    exit;
}

/* ─── Image handling (URL takes priority) ─────────────────────────────── */
$image = null;

if ($image_url !== '') {
    // Store URL directly
    $image = $image_url;

} elseif (!empty($_FILES['image']['name'])) {
    $file    = $_FILES['image'];
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $mime    = mime_content_type($file['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        $_SESSION['event'] = 'Invalid image type. Allowed: JPG, PNG, WEBP, GIF.';
        header('Location: ' . $url . 'admin/events/');
        exit;
    }

    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = bin2hex(random_bytes(16)) . '.' . strtolower($ext);

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    if (!move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $filename)) {
        $_SESSION['event'] = 'Failed to save image file.';
        header('Location: ' . $url . 'admin/events/');
        exit;
    }

    // Store filename only
    $image = $filename;
}

/* ─── Insert ───────────────────────────────────────────────────────────── */
$sql  = "INSERT INTO events (name, description, event_date, location, more_info, image, is_published)
         VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION['event'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

$stmt->bind_param('ssssssi', $name, $description, $event_date, $location, $more_info, $image, $is_published);

if (!$stmt->execute()) {
    $_SESSION['event'] = 'Insertion failed. Please try again.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

$stmt->close();

$status = $is_published ? 'published' : 'saved as draft';
$_SESSION['event-success'] = 'Event "' . htmlspecialchars($name) . '" ' . $status . ' successfully.';
header('Location: ' . $url . 'admin/events/');
exit;