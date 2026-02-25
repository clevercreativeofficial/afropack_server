<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

header('Content-Type: application/json');


// Get image ID from POST or JSON
$imageId = 0;

// Check if it's POST form data or JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $imageId = intval($_POST['id']);
    } else {
        // Get JSON input
        $input = json_decode(file_get_contents('php://input'), true);
        $imageId = isset($input['id']) ? intval($input['id']) : 0;
    }
}

if (!$imageId) {
    echo json_encode([
        'success' => false,
        'message' => 'Image ID is required'
    ]);
    exit;
}

// Get file path before deleting
$query = "SELECT file_path FROM hero_images WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $imageId);
$stmt->execute();
$result = $stmt->get_result();
$image = $result->fetch_assoc();

// Delete from database
$deleteQuery = "DELETE FROM hero_images WHERE id = ?";
$deleteStmt = $conn->prepare($deleteQuery);
$deleteStmt->bind_param("i", $imageId);

if ($deleteStmt->execute()) {
    // Delete physical file if it exists
    if ($image && !empty($image['file_path']) && file_exists($image['file_path'])) {
        unlink($image['file_path']);
    }
    
    echo json_encode([
        'success' => true,
        'message' => 'Image deleted successfully'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to delete image'
    ]);
}

$stmt->close();
$deleteStmt->close();
$conn->close();
?>