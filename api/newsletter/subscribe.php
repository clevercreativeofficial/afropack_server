<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $url);
    exit;
}

$email = trim($_POST['email'] ?? '');

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['newsletter'] = 'Please enter a valid email address.';
    header('Location: ' . $_SERVER['HTTP_REFERER'] ?? $url);
    exit;
}

// Check if already subscribed
$stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['newsletter'] = 'This email is already subscribed.';
    header('Location: ' . $_SERVER['HTTP_REFERER'] ?? $url);
    exit;
}

$stmt->close();

// Insert
$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email);

if (!$stmt->execute()) {
    $_SESSION['newsletter'] = 'Failed to subscribe. Please try again.';
    header('Location: ' . $_SERVER['HTTP_REFERER'] ?? $url);
    exit;
}

$stmt->close();

$_SESSION['newsletter-success'] = 'You have successfully subscribed to our newsletter.';
header('Location: ' . $_SERVER['HTTP_REFERER'] ?? $url);
exit;

// After successful INSERT, generate token and send email
$token = bin2hex(random_bytes(32));

$stmt = $conn->prepare("UPDATE subscribers SET unsubscribe_token = ? WHERE email = ?");
$stmt->bind_param("ss", $token, $email);
$stmt->execute();
$stmt->close();

$unsubscribe_link = $url . 'newsletter/unsubscribe/?token=' . $token;

$subject = 'Subscription Confirmed — AFROPACK GROUP';
$body    = "Thank you for subscribing to our newsletter!\n\n"
         . "You'll receive the latest news and updates from AFROPACK GROUP.\n\n"
         . "If you wish to unsubscribe at any time, click the link below:\n"
         . $unsubscribe_link . "\n\n"
         . "Regards,\nAFROPACK GROUP";
$headers = "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n"
         . "X-Mailer: PHP/" . phpversion();

mail($email, $subject, $body, $headers);