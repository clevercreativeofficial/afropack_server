<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

header('Content-Type: application/json');

global $conn;

// Get article ID from various possible sources
$articleId = 0;

// Check JSON input
$input = json_decode(file_get_contents('php://input'), true);
if (isset($input['id'])) {
    $articleId = intval($input['id']);
}
// Check POST data
else if (isset($_POST['id'])) {
    $articleId = intval($_POST['id']);
}
// Check GET parameter (for testing)
else if (isset($_GET['id'])) {
    $articleId = intval($_GET['id']);
}

if (!$articleId) {
    echo json_encode([
        'success' => false,
        'message' => 'Article ID is required'
    ]);
    exit;
}

// Get file path before deleting (to delete physical file)
$query = "SELECT file_path, title, image_url FROM news_articles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $articleId);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    echo json_encode([
        'success' => false,
        'message' => 'Article not found'
    ]);
    $stmt->close();
    $conn->close();
    exit;
}
$stmt->close();

// Delete from database
$deleteQuery = "DELETE FROM news_articles WHERE id = ?";
$deleteStmt = $conn->prepare($deleteQuery);
$deleteStmt->bind_param("i", $articleId);

if ($deleteStmt->execute()) {
    // Delete physical file if it exists
    $fileDeleted = false;
    if (!empty($article['file_path']) && file_exists($article['file_path'])) {
        $fileDeleted = unlink($article['file_path']);
    }
    
    echo json_encode([
        'success' => true,
        'message' => 'Article deleted successfully',
        'data' => [
            'id' => $articleId,
            'title' => $article['title'],
            'file_deleted' => $fileDeleted
        ]
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to delete article: ' . $deleteStmt->error
    ]);
}

$deleteStmt->close();
$conn->close();
?>