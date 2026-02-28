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
$id        = isset($_POST['brochure_id']) ? (int)$_POST['brochure_id'] : 0;
$title     = trim($_POST['title']         ?? '');
$image_url = trim($_POST['image_url']     ?? '');

if ($id <= 0) {
    $_SESSION['brochure'] = 'Invalid brochure ID.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

$errors = [];

if ($title === '') {
    $errors[] = 'Title is required.';
}
if ($image_url !== '' && !filter_var($image_url, FILTER_VALIDATE_URL)) {
    $errors[] = 'Image URL must be a valid URL.';
}

if (!empty($errors)) {
    $_SESSION['brochure'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
    exit;
}

/* ─── Fetch existing record ────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT pdf_file, image FROM brochures WHERE id = ?");
if (!$stmt) {
    $_SESSION['brochure'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$existing = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$existing) {
    $_SESSION['brochure'] = 'Brochure not found.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

/* ─── PDF upload (optional on update) ─────────────────────────────────── */
$pdf_filename = $existing['pdf_file']; // keep existing by default

if (!empty($_FILES['pdf_file']['name'])) {
    $pdf      = $_FILES['pdf_file'];
    $pdf_mime = mime_content_type($pdf['tmp_name']);

    if ($pdf_mime !== 'application/pdf') {
        $_SESSION['brochure'] = 'Only PDF files are allowed.';
        header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
        exit;
    }

    $new_pdf = bin2hex(random_bytes(16)) . '.pdf';

    if (!is_dir(UPLOAD_PDF)) mkdir(UPLOAD_PDF, 0755, true);

    if (!move_uploaded_file($pdf['tmp_name'], UPLOAD_PDF . $new_pdf)) {
        $_SESSION['brochure'] = 'Failed to save PDF file.';
        header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
        exit;
    }

    // Delete old PDF
    $old_pdf = UPLOAD_PDF . basename($existing['pdf_file']);
    if (file_exists($old_pdf)) unlink($old_pdf);

    $pdf_filename = $new_pdf;
}

/* ─── Image handling (URL takes priority) ─────────────────────────────── */
$image = $existing['image']; // keep existing by default

if ($image_url !== '') {
    // Delete old local image if it was a file
    if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
        $old_img = UPLOAD_IMAGE . basename($image);
        if (file_exists($old_img)) unlink($old_img);
    }
    $image = $image_url;

} elseif (!empty($_FILES['image_file']['name'])) {
    $file    = $_FILES['image_file'];
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $mime    = mime_content_type($file['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        $_SESSION['brochure'] = 'Invalid image type. Allowed: JPG, PNG, WEBP, GIF.';
        header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
        exit;
    }

    $ext          = pathinfo($file['name'], PATHINFO_EXTENSION);
    $img_filename = bin2hex(random_bytes(16)) . '.' . strtolower($ext);

    if (!is_dir(UPLOAD_IMAGE)) mkdir(UPLOAD_IMAGE, 0755, true);

    if (!move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $img_filename)) {
        $_SESSION['brochure'] = 'Failed to save image file.';
        header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
        exit;
    }

    // Delete old local image
    if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
        $old_img = UPLOAD_IMAGE . basename($image);
        if (file_exists($old_img)) unlink($old_img);
    }

    $image = $img_filename;
}

/* ─── Update ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("UPDATE brochures SET title = ?, pdf_file = ?, image = ? WHERE id = ?");
if (!$stmt) {
    $_SESSION['brochure'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
    exit;
}

$stmt->bind_param('sssi', $title, $pdf_filename, $image, $id);

if (!$stmt->execute()) {
    $_SESSION['brochure'] = 'Update failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/edit/?id=' . $id);
    exit;
}

$stmt->close();

$_SESSION['brochure-success'] = 'Brochure "' . htmlspecialchars($title) . '" updated successfully.';
header('Location: ' . $url . 'admin/brochures/');
exit;