<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';


// Check authentication if required
// if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
//     header('Location: /admin/login.php');
//     exit;
// }

// Configuration
define('UPLOAD_DIR', '../../../uploads/hero/');
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
    
    $imageUrl = isset($_POST['image']) ? trim($_POST['image']) : '';
    $uploadedFile = isset($_FILES['file']) ? $_FILES['file'] : null;
    
    // Validate input - either URL or file must be provided
    if (empty($imageUrl) && (empty($uploadedFile) || $uploadedFile['error'] === UPLOAD_ERR_NO_FILE)) {
        $response['message'] = 'Please provide either an image URL or upload a file.';
        echo json_encode($response);
        exit;
    }
    
    // Use the global MySQLi connection
    global $conn;
    
    // Priority 1: URL if provided
    if (!empty($imageUrl)) {
        // Validate URL
        if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            $response['message'] = 'Invalid URL format.';
            echo json_encode($response);
            exit;
        }
        
        // Check if URL is an image (optional - can be slow)
        $headers = @get_headers($imageUrl, 1);
        if ($headers && isset($headers['Content-Type'])) {
            $contentType = is_array($headers['Content-Type']) ? $headers['Content-Type'][0] : $headers['Content-Type'];
            if (strpos($contentType, 'image/') === false) {
                $response['message'] = 'URL does not point to a valid image.';
                echo json_encode($response);
                exit;
            }
        }
        
        // Insert URL into database using MySQLi
        $uploadedBy = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'unknown';
        
        $stmt = $conn->prepare("INSERT INTO hero_images (image_url, uploaded_by) VALUES (?, ?)");
        $stmt->bind_param("ss", $imageUrl, $uploadedBy);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Image URL saved successfully.';
            $response['data'] = [
                'id' => $stmt->insert_id,
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
            echo json_encode($response);
            exit;
        }
        
        // Validate file type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $uploadedFile['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mimeType, ALLOWED_MIME_TYPES)) {
            $response['message'] = 'Invalid file type. Allowed types: ' . implode(', ', ALLOWED_MIME_TYPES);
            echo json_encode($response);
            exit;
        }
        
        // Get file extension
        $extension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, ALLOWED_EXTENSIONS)) {
            $response['message'] = 'Invalid file extension. Allowed extensions: ' . implode(', ', ALLOWED_EXTENSIONS);
            echo json_encode($response);
            exit;
        }
        
        // Generate unique filename
        $newFileName = uniqid('hero_', true) . '.' . $extension;
        $uploadPath = UPLOAD_DIR . $newFileName;
        
        // Move uploaded file
        if (move_uploaded_file($uploadedFile['tmp_name'], $uploadPath)) {
            
            // Generate web-accessible URL
            // $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . 
            //           "://" . $_SERVER['HTTP_HOST'];

            $baseUrl = $url;
            
            // Remove /admin/hero/api from the path to get the base URL correctly
            $baseUrl = rtrim($baseUrl, '/');
            $imageUrl = $baseUrl . '/uploads/hero/' . $newFileName;
            
            // Insert into database using MySQLi
            $uploadedBy = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'unknown';
            
            $stmt = $conn->prepare("INSERT INTO hero_images (image_url, file_name, file_path, file_size, mime_type, uploaded_by) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiss", 
                $imageUrl, 
                $uploadedFile['name'], 
                $uploadPath, 
                $uploadedFile['size'], 
                $mimeType, 
                $uploadedBy
            );
            
            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'File uploaded successfully.';
                $response['data'] = [
                    'id' => $stmt->insert_id,
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
            UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive in HTML form.',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension.'
        ];
        $response['message'] = $uploadErrors[$uploadedFile['error']] ?? 'Unknown upload error.';
    }
    
    // Return JSON response for AJAX requests, or redirect for form submission
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Redirect back with flash message
        $_SESSION['flash_message'] = $response['message'];
        $_SESSION['flash_type'] = $response['success'] ? 'success' : 'error';
        
        // Redirect to referring page or default
        $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/admin/hero/';
        header('Location: ' . $redirectUrl);
    }
    exit;
    
} else {
    // Not a POST request with submit button
    header('HTTP/1.0 405 Method Not Allowed');
    echo 'Method not allowed.';
    exit;
}
?>