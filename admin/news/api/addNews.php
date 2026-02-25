<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

// Configuration
define('UPLOAD_DIR', '../../../uploads/news/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('ALLOWED_MIME_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

// Create upload directory if it doesn't exist
if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

$response = [
    'success' => false,
    'message' => '',
    'data' => null
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $imageUrl = isset($_POST['image']) ? trim($_POST['image']) : '';
    $uploadedFile = isset($_FILES['file']) ? $_FILES['file'] : null;
    
    // Validate required fields
    if (empty($title)) {
        $response['message'] = 'Title is required';
        handleResponse($response);
        exit;
    }
    
    if (empty($category)) {
        $response['message'] = 'Category is required';
        handleResponse($response);
        exit;
    }
    
    // Validate input - either URL or file must be provided
    if (empty($imageUrl) && (empty($uploadedFile) || $uploadedFile['error'] === UPLOAD_ERR_NO_FILE)) {
        $response['message'] = 'Please provide either an image URL or upload a file.';
        handleResponse($response);
        exit;
    }
    
    global $conn;
    
    // Priority 1: URL if provided
    if (!empty($imageUrl)) {
        // Validate URL
        if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            $response['message'] = 'Invalid URL format.';
            handleResponse($response);
            exit;
        }
        
        // Check if URL is an image
        $headers = @get_headers($imageUrl, 1);
        if ($headers && isset($headers['Content-Type'])) {
            $contentType = is_array($headers['Content-Type']) ? $headers['Content-Type'][0] : $headers['Content-Type'];
            if (strpos($contentType, 'image/') === false) {
                $response['message'] = 'URL does not point to a valid image.';
                handleResponse($response);
                exit;
            }
        }
        
        // Insert into database
        $createdBy = $_SESSION['admin_username'] ?? 'unknown';
        
        $stmt = $conn->prepare("INSERT INTO news_articles (title, category, image_url, created_by) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $category, $imageUrl, $createdBy);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'News article added successfully.';
            $response['data'] = [
                'id' => $stmt->insert_id,
                'title' => $title,
                'category' => $category,
                'image_url' => $imageUrl
            ];
        } else {
            $response['message'] = 'Database error: ' . $conn->error;
        }
        $stmt->close();
    }
    
    // Priority 2: File upload if no URL provided
    else if ($uploadedFile && $uploadedFile['error'] === UPLOAD_ERR_OK) {
        
        // Check file size
        if ($uploadedFile['size'] > MAX_FILE_SIZE) {
            $response['message'] = 'File is too large. Maximum size is ' . (MAX_FILE_SIZE / 1024 / 1024) . 'MB.';
            handleResponse($response);
            exit;
        }
        
        // Validate file type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $uploadedFile['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mimeType, ALLOWED_MIME_TYPES)) {
            $response['message'] = 'Invalid file type. Allowed types: ' . implode(', ', ALLOWED_MIME_TYPES);
            handleResponse($response);
            exit;
        }
        
        // Get file extension
        $extension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, ALLOWED_EXTENSIONS)) {
            $response['message'] = 'Invalid file extension. Allowed extensions: ' . implode(', ', ALLOWED_EXTENSIONS);
            handleResponse($response);
            exit;
        }
        
        // Generate unique filename
        $newFileName = 'news_' . uniqid() . '_' . date('Ymd') . '.' . $extension;
        $uploadPath = UPLOAD_DIR . $newFileName;
        
        // Move uploaded file
        if (move_uploaded_file($uploadedFile['tmp_name'], $uploadPath)) {
            
            // Generate web-accessible URL
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . 
                      "://" . $_SERVER['HTTP_HOST'];
            $baseUrl = rtrim($baseUrl, '/');
            $imageUrl = $baseUrl . '/uploads/news/' . $newFileName;
            
            // Insert into database
            $createdBy = $_SESSION['admin_username'] ?? 'unknown';
            
            $stmt = $conn->prepare("INSERT INTO news_articles (title, category, image_url, file_name, file_path, file_size, mime_type, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssiss", 
                $title, 
                $category,
                $imageUrl, 
                $uploadedFile['name'], 
                $uploadPath, 
                $uploadedFile['size'], 
                $mimeType, 
                $createdBy
            );
            
            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'News article added successfully.';
                $response['data'] = [
                    'id' => $stmt->insert_id,
                    'title' => $title,
                    'category' => $category,
                    'image_url' => $imageUrl,
                    'file_name' => $uploadedFile['name']
                ];
            } else {
                $response['message'] = 'Database error: ' . $conn->error;
            }
            $stmt->close();
        } else {
            $response['message'] = 'Failed to move uploaded file.';
        }
    }
    
    // File upload error
    else if ($uploadedFile && $uploadedFile['error'] !== UPLOAD_ERR_NO_FILE) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize directive in php.ini.',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive.',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension.'
        ];
        $response['message'] = $uploadErrors[$uploadedFile['error']] ?? 'Unknown upload error.';
    }
    
    handleResponse($response);
    exit;
    
} else {
    header('HTTP/1.0 405 Method Not Allowed');
    echo 'Method not allowed.';
    exit;
}

/**
 * Helper function to handle response
 */
function handleResponse($response) {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $_SESSION['flash_message'] = $response['message'];
        $_SESSION['flash_type'] = $response['success'] ? 'success' : 'error';
        $redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/admin/news/';
        header('Location: ' . $redirectUrl);
    }
    exit;
}
?>