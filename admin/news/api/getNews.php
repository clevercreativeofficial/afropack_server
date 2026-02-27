<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

header('Content-Type: application/json');

// Pagination parameters
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 12;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$body = isset($_GET['body']) ? $_GET['body'] : '';
$offset = ($page - 1) * $limit;

// Build query with filters
$countQuery = "SELECT COUNT(*) as total FROM news_articles";
$query = "SELECT * FROM news_articles";
$whereClause = [];

if (!empty($category)) {
    $whereClause[] = "category = '" . mysqli_real_escape_string($conn, $category) . "'";
}

if (!empty($body)) {
    $whereClause[] = "body = '" . mysqli_real_escape_string($conn, $body) . "'";
}


if (!empty($whereClause)) {
    $whereString = " WHERE " . implode(" AND ", $whereClause);
    $countQuery .= $whereString;
    $query .= $whereString;
}

$query .= " ORDER BY created_at DESC LIMIT ? OFFSET ?";

// Get total count
$countResult = mysqli_query($conn, $countQuery);
$totalRow = mysqli_fetch_assoc($countResult);
$total = $totalRow['total'];

// Fetch articles
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();

$articles = [];
while ($row = $result->fetch_assoc()) {
    $type = !empty($row['file_name']) ? 'file' : 'url';
    
    $articles[] = [
        'id' => intval($row['id']),
        'title' => $row['title'],
        'category' => $row['category'],
        'body' => $row['body'],
        'image_url' => $row['image_url'],
        'type' => $type,
        'file_name' => $row['file_name'],
        'file_size' => $row['file_size'] ? formatFileSize($row['file_size']) : null,
        'created_at' => $row['created_at'],
        'created_at_formatted' => date('F j, Y', strtotime($row['created_at'])),
        'is_published' => $row['is_published'] == 1,
        'views' => $row['views']
    ];
}

echo json_encode([
    'success' => true,
    'data' => $articles,
    'pagination' => [
        'current_page' => $page,
        'per_page' => $limit,
        'total_items' => $total,
        'total_pages' => ceil($total / $limit)
    ]
]);

function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        return $bytes . ' bytes';
    } else {
        return '0 bytes';
    }
}

$stmt->close();
$conn->close();
?>