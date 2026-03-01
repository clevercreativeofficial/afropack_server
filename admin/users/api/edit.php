<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['user'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$id               = isset($_POST['user_id'])        ? (int)$_POST['user_id']        : 0;
$first_name       = trim($_POST['first_name']       ?? '');
$last_name        = trim($_POST['last_name']        ?? '');
$email            = trim($_POST['email']            ?? '');
$role             = trim($_POST['role']             ?? 'author');
$password         = trim($_POST['password']         ?? '');
$confirm_password = trim($_POST['confirm_password'] ?? '');

if ($id <= 0) {
    $_SESSION['user'] = 'Invalid user ID.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

$errors = [];

if ($first_name === '') {
    $errors[] = 'First name is required.';
}
if ($last_name === '') {
    $errors[] = 'Last name is required.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email is required.';
}
if (!in_array($role, ['admin', 'editor', 'author'], true)) {
    $errors[] = 'Invalid role selected.';
}
if ($password !== '' && strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters.';
}
if ($password !== $confirm_password) {
    $errors[] = 'Passwords do not match.';
}

if (!empty($errors)) {
    $_SESSION['user'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/users/edit/?id=' . $id);
    exit;
}

/* ─── Check email uniqueness (exclude current user) ───────────────────── */
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
$stmt->bind_param("si", $email, $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['user'] = 'Another user with this email already exists.';
    header('Location: ' . $url . 'admin/users/edit/?id=' . $id);
    exit;
}
$stmt->close();

/* ─── Update with or without password ─────────────────────────────────── */
if ($password !== '') {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt   = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, role = ?, password = ? WHERE id = ?");
    if (!$stmt) {
        $_SESSION['user'] = 'Query preparation failed. Please try again.';
        header('Location: ' . $url . 'admin/users/edit/?id=' . $id);
        exit;
    }
    $stmt->bind_param('sssssi', $first_name, $last_name, $email, $role, $hashed, $id);
} else {
    $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, role = ? WHERE id = ?");
    if (!$stmt) {
        $_SESSION['user'] = 'Query preparation failed. Please try again.';
        header('Location: ' . $url . 'admin/users/edit/?id=' . $id);
        exit;
    }
    $stmt->bind_param('ssssi', $first_name, $last_name, $email, $role, $id);
}

if (!$stmt->execute()) {
    $_SESSION['user'] = 'Update failed. Please try again.';
    header('Location: ' . $url . 'admin/users/edit/?id=' . $id);
    exit;
}

$stmt->close();

/* ─── Send new password via email if changed ───────────────────────────── */
if ($password !== '') {
    $full_name = $first_name . ' ' . $last_name;
    $subject   = 'Your Password Has Been Updated';
    $message   = "Hello {$full_name},\n\n"
               . "Your account password has been updated by an administrator.\n\n"
               . "Email:        {$email}\n"
               . "New Password: {$password}\n\n"
               . "Please log in and change your password immediately.\n\n"
               . "Regards,\nAdmin Team";
    $headers   = "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n"
               . "X-Mailer: PHP/" . phpversion();

    mail($email, $subject, $message, $headers);
}

$full_name = $first_name . ' ' . $last_name;
$_SESSION['user-success'] = 'User "' . htmlspecialchars($full_name) . '" updated successfully.';
header('Location: ' . $url . 'admin/users/');
exit;