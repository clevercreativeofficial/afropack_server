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

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id <= 0) {
    $_SESSION['brochure'] = 'Invalid brochure ID.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

/* ─── Fetch before delete ──────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT title, pdf_file, image FROM brochures WHERE id = ?");
if (!$stmt) {
    $_SESSION['brochure'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$brochure = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$brochure) {
    $_SESSION['brochure'] = 'Brochure not found.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

/* ─── Delete ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("DELETE FROM brochures WHERE id = ?");
if (!$stmt) {
    $_SESSION['brochure'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    $_SESSION['brochure'] = 'Deletion failed. Please try again.';
    header('Location: ' . $url . 'admin/brochures/');
    exit;
}

$stmt->close();

/* ─── Delete PDF from disk ─────────────────────────────────────────────── */
if (!empty($brochure['pdf_file'])) {
    $pdf_path = UPLOAD_PDF . basename($brochure['pdf_file']);
    if (file_exists($pdf_path)) unlink($pdf_path);
}

/* ─── Delete image from disk (only if local file, not URL) ────────────── */
if (!empty($brochure['image']) && !filter_var($brochure['image'], FILTER_VALIDATE_URL)) {
    $img_path = UPLOAD_IMAGE . basename($brochure['image']);
    if (file_exists($img_path)) unlink($img_path);
}

$_SESSION['brochure-success'] = 'Brochure "' . htmlspecialchars($brochure['title']) . '" deleted successfully.';
header('Location: ' . $url . 'admin/brochures/');
exit;