<?php

if (file_exists(__DIR__ . '/../path.php')) {
    require_once __DIR__ . '/../path.php';
} elseif (file_exists(__DIR__ . '/path.php')) {
    require_once __DIR__ . '/path.php';
} else {
    die("path.php not found");
}


require ROOT_PATH . '/config/constants.php';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>