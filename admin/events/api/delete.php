<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

define('UPLOAD_DIR', ROOT_PATH . '/uploads/events/');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $_SESSION['event'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

/* ─── Validate ─────────────────────────────────────────────────────────── */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['event'] = 'Invalid event ID.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

/* ─── Fetch before delete ──────────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT name, image FROM events WHERE id = ?");
if (!$stmt) {
    $_SESSION['event'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$event = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$event) {
    $_SESSION['event'] = 'Event not found.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

/* ─── Delete ───────────────────────────────────────────────────────────── */
$stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
if (!$stmt) {
    $_SESSION['event'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    $_SESSION['event'] = 'Deletion failed. Please try again.';
    header('Location: ' . $url . 'admin/events/');
    exit;
}

$stmt->close();

/* ─── Delete local file if not a URL ──────────────────────────────────── */
if (!empty($event['image']) && !filter_var($event['image'], FILTER_VALIDATE_URL)) {
    $file_path = UPLOAD_DIR . basename($event['image']);
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

$_SESSION['event-success'] = 'Event "' . htmlspecialchars($event['name']) . '" deleted successfully.';
header('Location: ' . $url . 'admin/events/');
exit;