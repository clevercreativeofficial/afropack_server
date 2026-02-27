<?php
// Include required files
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

// Set header to return JSON
header('Content-Type: application/json');

// Check authentication if required
// if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
//     http_response_code(401);
//     echo json_encode([
//         'success' => false,
//         'message' => 'Unauthorized access'
//     ]);
//     exit;
// }

// Configuration for file uploads
define('UPLOAD_DIR', '../../../uploads/news/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('ALLOWED_MIME_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

// Create upload directory if it doesn't exist
if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

// Function to handle response
function sendResponse($success, $message, $data = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

// Check if it's a GET request to fetch article data
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $articleId = intval($_GET['id']);
    
    global $conn;
    
    $query = "SELECT * FROM news_articles WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $articleId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        sendResponse(false, 'Article not found');
    }
    
    $article = $result->fetch_assoc();
    
    // Format the response
    $data = [
        'id' => $article['id'],
        'title' => $article['title'],
        'category' => $article['category'],
        'body' => $article['body'],
        'image_url' => $article['image_url'],
        'body' => $article['body'] ?? '',
        'excerpt' => $article['excerpt'] ?? '',
        'is_published' => $article['is_published'] == 1,
        'file_name' => $article['file_name'],
        'file_path' => $article['file_path'],
        'type' => !empty($article['file_name']) ? 'file' : 'url'
    ];
    
    sendResponse(true, 'Article fetched successfully', $data);
}

// Handle POST request for updating
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    $articleId = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $body = isset($_POST['body']) ? trim($_POST['body']) : '';
    $excerpt = isset($_POST['excerpt']) ? trim($_POST['excerpt']) : '';
    $isPublished = isset($_POST['is_published']) ? 1 : 0;
    $imageUrl = isset($_POST['image']) ? trim($_POST['image']) : '';
    $uploadedFile = isset($_FILES['file']) ? $_FILES['file'] : null;
    $removeImage = isset($_POST['remove_image']) ? true : false;
    
    // Validate required fields
    if (!$articleId) {
        sendResponse(false, 'Article ID is required');
    }
    
    if (empty($title)) {
        sendResponse(false, 'Title is required');
    }
    
    if (empty($category)) {
        sendResponse(false, 'Category is required');
    }
    
    global $conn;
    
    // Begin transaction
    mysqli_begin_transaction($conn);
    
    try {
        // Get current article data
        $selectQuery = "SELECT * FROM news_articles WHERE id = ?";
        $selectStmt = $conn->prepare($selectQuery);
        $selectStmt->bind_param("i", $articleId);
        $selectStmt->execute();
        $result = $selectStmt->get_result();
        
        if ($result->num_rows === 0) {
            throw new Exception('Article not found');
        }
        
        $currentArticle = $result->fetch_assoc();
        $selectStmt->close();
        
        // Handle image update
        $newImageUrl = $currentArticle['image_url'];
        $newFileName = $currentArticle['file_name'];
        $newFilePath = $currentArticle['file_path'];
        $newFileSize = $currentArticle['file_size'];
        $newMimeType = $currentArticle['mime_type'];
        
        // Check if we need to remove the current image
        if ($removeImage) {
            // Delete old file if it exists
            if (!empty($currentArticle['file_path']) && file_exists($currentArticle['file_path'])) {
                unlink($currentArticle['file_path']);
            }
            $newImageUrl = '';
            $newFileName = null;
            $newFilePath = null;
            $newFileSize = null;
            $newMimeType = null;
        }
        
        // Priority 1: New URL provided
        if (!empty($imageUrl)) {
            // Validate URL
            if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                throw new Exception('Invalid URL format');
            }
            
            // Check if URL is an image
            $headers = @get_headers($imageUrl, 1);
            if ($headers && isset($headers['Content-Type'])) {
                $contentType = is_array($headers['Content-Type']) ? $headers['Content-Type'][0] : $headers['Content-Type'];
                if (strpos($contentType, 'image/') === false) {
                    throw new Exception('URL does not point to a valid image');
                }
            }
            
            // Delete old file if it exists
            if (!empty($currentArticle['file_path']) && file_exists($currentArticle['file_path'])) {
                unlink($currentArticle['file_path']);
            }
            
            $newImageUrl = $imageUrl;
            $newFileName = null;
            $newFilePath = null;
            $newFileSize = null;
            $newMimeType = null;
        }
        
        // Priority 2: New file uploaded
        else if ($uploadedFile && $uploadedFile['error'] === UPLOAD_ERR_OK) {
            
            // Check file size
            if ($uploadedFile['size'] > MAX_FILE_SIZE) {
                throw new Exception('File is too large. Maximum size is ' . (MAX_FILE_SIZE / 1024 / 1024) . 'MB');
            }
            
            // Validate file type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $uploadedFile['tmp_name']);
            finfo_close($finfo);
            
            if (!in_array($mimeType, ALLOWED_MIME_TYPES)) {
                throw new Exception('Invalid file type. Allowed types: ' . implode(', ', ALLOWED_MIME_TYPES));
            }
            
            // Get file extension
            $extension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
            if (!in_array($extension, ALLOWED_EXTENSIONS)) {
                throw new Exception('Invalid file extension. Allowed extensions: ' . implode(', ', ALLOWED_EXTENSIONS));
            }
            
            // Delete old file if it exists
            if (!empty($currentArticle['file_path']) && file_exists($currentArticle['file_path'])) {
                unlink($currentArticle['file_path']);
            }
            
            // Generate unique filename
            $newFileName = 'news_' . uniqid() . '_' . date('Ymd') . '.' . $extension;
            $newFilePath = UPLOAD_DIR . $newFileName;
            
            // Move uploaded file
            if (move_uploaded_file($uploadedFile['tmp_name'], $newFilePath)) {
                
                // Generate web-accessible URL
                $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . 
                          "://" . $_SERVER['HTTP_HOST'];
                $baseUrl = rtrim($baseUrl, '/');
                $newImageUrl = $baseUrl . '/uploads/news/' . $newFileName;
                $newFileSize = $uploadedFile['size'];
                $newMimeType = $mimeType;
            } else {
                throw new Exception('Failed to move uploaded file');
            }
        }
        
        // Update database
        $updateQuery = "UPDATE news_articles SET 
                        title = ?, 
                        category = ?, 
                        body = ?, 
                        excerpt = ?,
                        image_url = ?, 
                        file_name = ?, 
                        file_path = ?, 
                        file_size = ?, 
                        mime_type = ?,
                        is_published = ?
                        WHERE id = ?";
        
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssssssssisi", 
            $title, 
            $category, 
            $body, 
            $excerpt,
            $newImageUrl, 
            $newFileName, 
            $newFilePath, 
            $newFileSize, 
            $newMimeType, 
            $isPublished,
            $articleId
        );
        
        if (!$updateStmt->execute()) {
            throw new Exception('Failed to update article: ' . $updateStmt->error);
        }
        
        // Commit transaction
        mysqli_commit($conn);
        
        // Get updated article
        $updatedQuery = "SELECT * FROM news_articles WHERE id = ?";
        $updatedStmt = $conn->prepare($updatedQuery);
        $updatedStmt->bind_param("i", $articleId);
        $updatedStmt->execute();
        $updatedResult = $updatedStmt->get_result();
        $updatedArticle = $updatedResult->fetch_assoc();
        
        sendResponse(true, 'Article updated successfully', [
            'id' => $updatedArticle['id'],
            'title' => $updatedArticle['title'],
            'category' => $updatedArticle['category'],
            'image_url' => $updatedArticle['image_url'],
            'body' => $updatedArticle['body'],
            'is_published' => $updatedArticle['is_published'] == 1
        ]);
        
    } catch (Exception $e) {
        // Rollback transaction
        mysqli_rollback($conn);
        sendResponse(false, $e->getMessage());
    }
}

// If no valid request method
http_response_code(405);
sendResponse(false, 'Method not allowed');
?>