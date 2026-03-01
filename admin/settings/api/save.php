<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['setting'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/settings/');
    exit;
}

/* ─── Sanitize ─────────────────────────────────────────────────────────── */
$fields = [
    'contact_email',
    'contact_phone',
    'contact_address',
    'facebook_url',
    'instagram_url',
    'twitter_url',
    'linkedin_url',
    'youtube_url',
];

$errors = [];

foreach ($fields as $field) {
    $value = trim($_POST[$field] ?? '');

    // Validate email
    if ($field === 'contact_email' && $value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Contact email must be a valid email address.';
        continue;
    }

    // Validate URLs
    $url_fields = ['facebook_url', 'instagram_url', 'twitter_url', 'linkedin_url', 'youtube_url'];
    if (in_array($field, $url_fields) && $value !== '' && !filter_var($value, FILTER_VALIDATE_URL)) {
        $errors[] = ucfirst(str_replace('_', ' ', $field)) . ' must be a valid URL.';
        continue;
    }

    // Upsert — insert or update if key exists
    $stmt = $conn->prepare("
        INSERT INTO settings (`key`, value) VALUES (?, ?)
        ON DUPLICATE KEY UPDATE value = VALUES(value)
    ");

    if (!$stmt) {
        $errors[] = 'Query preparation failed for ' . $field . '.';
        continue;
    }

    $stmt->bind_param('ss', $field, $value);

    if (!$stmt->execute()) {
        $errors[] = 'Failed to save ' . $field . '.';
    }

    $stmt->close();
}

if (!empty($errors)) {
    $_SESSION['setting'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/settings/');
    exit;
}

$_SESSION['setting-success'] = 'Settings saved successfully.';
header('Location: ' . $url . 'admin/settings/');
exit;