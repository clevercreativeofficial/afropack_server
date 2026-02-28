<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

define('UPLOAD_PDF',   ROOT_PATH . '/uploads/brochures/pdf/');
define('UPLOAD_IMAGE', ROOT_PATH . '/uploads/brochures/images/');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['brochure'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$title     = trim($_POST['title']     ?? '');
$image_url = trim($_POST['image_url'] ?? '');

$errors = [];

if ($title === '') {
    $errors[] = 'Title is required.';
}
if (empty($_FILES['pdf_file']['name'])) {
    $errors[] = 'PDF file is required.';
}
if ($image_url !== '' && !filter_var($image_url, FILTER_VALIDATE_URL)) {
    $errors[] = 'Image URL must be a valid URL.';
}

if (!empty($errors)) {
    $_SESSION['brochure'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/brochures/upload/');
    exit;
}

/* ─── PDF upload ───────────────────────────────────────────────────────── */
$pdf      = $_FILES['pdf_file'];
$pdf_mime = mime_content_type($pdf['tmp_name']);

if ($pdf_mime !== 'application/pdf') {
    $_SESSION['brochure'] = 'Only PDF files are allowed.';
    header('Location: ' . $url . 'admin/brochures/upload/');
    exit;
}

$pdf_filename = bin2hex(random_bytes(16)) . '.pdf';

if (!is_dir(UPLOAD_PDF)) mkdir(UPLOAD_PDF, 0755, true);

if (!move_uploaded_file($pdf['tmp_name'], UPLOAD_PDF . $pdf_filename)) {
    $_SESSION['brochure'] = 'Failed to save PDF file.';
    header('Location: ' . $url . 'admin/brochures/upload/');
    exit;
}

/* ─── Image handling (URL takes priority) ─────────────────────────────── */
$image = null;

if ($image_url !== '') {
    $image = $image_url;

} elseif (!empty($_FILES['image_file']['name'])) {
    $file    = $_FILES['image_file'];
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $mime    = mime_content_type($file['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        $_SESSION['brochure'] = 'Invalid image type. Allowed: JPG, PNG, WEBP, GIF.';
        header('Location: ' . $url . 'admin/brochures/upload/');
        exit;
    }

    $ext           = pathinfo($file['name'], PATHINFO_EXTENSION);
    $img_filename  = bin2hex(random_bytes(16)) . '.' . strtolower($ext);

    if (!is_dir(UPLOAD_IMAGE)) mkdir(UPLOAD_IMAGE, 0755, true);

    if (!move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $img_filename)) {
        $_SESSION['brochure'] = 'Failed to save image file.';
        header('Location: ' . $url . 'admin/brochures/upload/');
        exit;
    }

    $image = $img_filename;
}

/* ─── Insert ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("INSERT INTO brochures (title, pdf_file, image) VALUES (?, ?, ?)");
if (!$stmt) {
    $_SESSION['brochure'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/upload/');
    exit;
}

$stmt->bind_param('sss', $title, $pdf_filename, $image);

if (!$stmt->execute()) {
    $_SESSION['brochure'] = 'Failed to upload brochure. Please try again.';
    header('Location: ' . $url . 'admin/brochures/upload/');
    exit;
}

$stmt->close();

$_SESSION['brochure-success'] = 'Brochure "' . htmlspecialchars($title) . '" uploaded successfully.';
header('Location: ' . $url . 'admin/brochures/');
exit;