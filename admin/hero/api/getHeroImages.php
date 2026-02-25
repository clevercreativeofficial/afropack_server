<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

header('Content-Type: application/json');

if (!$conn) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed'
    ]);
    exit;
}

// Fetch images
$query = "SELECT * FROM hero_images ORDER BY is_active DESC, uploaded_at DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode([
        'success' => false,
        'message' => 'Query failed: ' . mysqli_error($conn)
    ]);
    exit;
}

$images = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Determine if it's a URL or uploaded file
    $type = 'url'; // default
    $displayName = '';
    $sourceInfo = '';
    
    if (!empty($row['file_name'])) {
        // This is an uploaded file
        $type = 'file';
        $displayName = $row['file_name'];
        $sourceInfo = 'Uploaded file';
    } else {
        // This is a URL
        $type = 'url';
        // Extract domain from URL for display
        $parsedUrl = parse_url($row['image_url']);
        $displayName = $parsedUrl['host'] ?? 'External URL';
        $sourceInfo = 'External URL';
    }
    
    $images[] = [
        'id' => intval($row['id']),
        'image_url' => $row['image_url'], // Always the display URL
        'type' => $type,
        'display_name' => $displayName,
        'source_info' => $sourceInfo,
        'file_name' => $row['file_name'],
        'file_path' => $row['file_path'],
        'file_size' => $row['file_size'] ? formatFileSize($row['file_size']) : null,
        'uploaded_at' => $row['uploaded_at'],
        'uploaded_at_formatted' => date('F j, Y, g:i a', strtotime($row['uploaded_at'])),
        'is_active' => $row['is_active'] == 1,
        'uploaded_by' => $row['uploaded_by'] ?? 'Unknown'
    ];
}

echo json_encode([
    'success' => true,
    'data' => $images,
    'count' => count($images)
]);

/**
 * Helper function to format file size
 */
function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        return $bytes . ' bytes';
    } elseif ($bytes == 1) {
        return '1 byte';
    } else {
        return '0 bytes';
    }
}

mysqli_close($conn);
?>