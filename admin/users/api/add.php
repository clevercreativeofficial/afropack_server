<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['user'] = 'Method not allowed.';
    header('Location: ' . $url . 'admin/users/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$first_name       = trim($_POST['first_name']       ?? '');
$last_name        = trim($_POST['last_name']        ?? '');
$email            = trim($_POST['email']            ?? '');
$role             = trim($_POST['role']             ?? 'author');
$password         = trim($_POST['password']         ?? '');
$confirm_password = trim($_POST['confirm_password'] ?? '');

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
if (!in_array($role, ['admin', 'author'], true)) {
    $errors[] = 'Invalid role selected.';
}
if (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters.';
}
if ($password !== $confirm_password) {
    $errors[] = 'Passwords do not match.';
}

if (!empty($errors)) {
    $_SESSION['user'] = implode(' ', $errors);
    header('Location: ' . $url . 'admin/users/add/');
    exit;
}

/* ─── Check email uniqueness ───────────────────────────────────────────── */
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['user'] = 'A user with this email already exists.';
    header('Location: ' . $url . 'admin/users/add/');
    exit;
}
$stmt->close();

/* ─── Hash password & insert ───────────────────────────────────────────── */
$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    $_SESSION['user'] = 'Query preparation failed. Please try again.';
    header('Location: ' . $url . 'admin/users/add/');
    exit;
}

$stmt->bind_param('sssss', $first_name, $last_name, $email, $hashed, $role);

if (!$stmt->execute()) {
    $_SESSION['user'] = 'Failed to create user. Please try again.';
    header('Location: ' . $url . 'admin/users/add/');
    exit;
}

$stmt->close();

/* ─── Send password via email ──────────────────────────────────────────── */
$full_name = $first_name . ' ' . $last_name;
$subject   = 'Your Account Has Been Created';
$message   = "Hello {$full_name},\n\n"
           . "Your account has been created on our platform.\n\n"
           . "Email:    {$email}\n"
           . "Password: {$password}\n"
           . "Role:     " . ucfirst($role) . "\n\n"
           . "Please log in and change your password immediately.\n\n"
           . "Regards,\nAdmin Team";
$headers   = "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n"
           . "X-Mailer: PHP/" . phpversion();

mail($email, $subject, $message, $headers);

$_SESSION['user-success'] = 'User "' . htmlspecialchars($full_name) . '" created successfully. Login details sent to ' . htmlspecialchars($email) . '.';
header('Location: ' . $url . 'admin/users/');
exit;