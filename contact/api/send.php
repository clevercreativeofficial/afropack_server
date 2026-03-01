<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $url . 'contact/');
    exit;
}

/* ─── Sanitize & validate ──────────────────────────────────────────────── */
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if ($name === '') {
    $errors[] = 'Name is required.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email is required.';
}
if ($subject === '') {
    $errors[] = 'Subject is required.';
}
if ($message === '') {
    $errors[] = 'Message is required.';
}

if (!empty($errors)) {
    $_SESSION['contact'] = implode(' ', $errors);
    header('Location: ' . $url . 'contact/');
    exit;
}

/* ─── Fetch recipient from settings ───────────────────────────────────── */
$stmt = $conn->prepare("SELECT value FROM settings WHERE `key` = 'contact_email'");
$stmt->execute();
$to = $stmt->get_result()->fetch_assoc()['value'] ?? '';
$stmt->close();

if ($to === '') {
    $_SESSION['contact'] = 'Contact email not configured. Please try again later.';
    header('Location: ' . $url . 'contact/');
    exit;
}

/* ─── Send email ───────────────────────────────────────────────────────── */
$mail_subject = '[Contact Form] ' . $subject;
$mail_body    = "Name:    {$name}\n"
              . "Email:   {$email}\n"
              . "Subject: {$subject}\n\n"
              . "Message:\n{$message}";
$headers      = "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n"
              . "Reply-To: {$email}\r\n"
              . "X-Mailer: PHP/" . phpversion();

if (!mail($to, $mail_subject, $mail_body, $headers)) {
    $_SESSION['contact'] = 'Failed to send message. Please try again later.';
    header('Location: ' . $url . 'contact/');
    exit;
}

$_SESSION['contact-success'] = 'Your message has been sent. We will get back to you shortly.';
header('Location: ' . $url . 'contact/');
exit;