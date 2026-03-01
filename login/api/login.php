<?php
require_once __DIR__ . '/../../path.php';
require_once ROOT_PATH . '/config/database.php';

// Configuration
$MAX_ATTEMPTS = 5;
$LOCKOUT_DURATION = 15 * 60; // 15 minutes in seconds

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = [];
    }

    $user_ip = $_SERVER['REMOTE_ADDR'];
    $current_time = time();

    // Check if IP is locked out
    if (isset($_SESSION['login_attempts'][$user_ip])) {
        $attempt_data = $_SESSION['login_attempts'][$user_ip];

        if (isset($attempt_data['locked_until']) && $attempt_data['locked_until'] > $current_time) {
            $remaining_time = $attempt_data['locked_until'] - $current_time;
            $minutes = ceil($remaining_time / 60);
            $_SESSION['login'] = "Too many failed attempts. Please try again in $minutes minute(s).";
            $_SESSION['login-data'] = $_POST;
            header('Location: ' . $url . 'login');
            exit();
        } elseif (isset($attempt_data['locked_until']) && $attempt_data['locked_until'] <= $current_time) {
            unset($_SESSION['login_attempts'][$user_ip]);
        }
    }

    // Validate form
    if (!$email) {
        $_SESSION['login'] = "Email is required!";
        trackFailedAttempt($user_ip);
    } elseif (!$password) {
        $_SESSION['login'] = "Password is required!";
        trackFailedAttempt($user_ip, $email);
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION['login'] = "Wrong credentials!";
            trackFailedAttempt($user_ip, $email);
        } else {
            $userInfo = $result->fetch_assoc();
            if (!password_verify($password, $userInfo['password'])) {
                $_SESSION['login'] = "Password is not correct!";
                trackFailedAttempt($user_ip, $email);
            } else {
                // Successful login
                $_SESSION['user_id'] = $userInfo['id'];
                $_SESSION['user_role'] = $userInfo['role'];
                $_SESSION['login-success'] = "Welcome back " . htmlspecialchars($userInfo['first_name']) . '!';
                clearFailedAttempts($user_ip, $email);
                header('Location: ' . $url . 'admin/');
                exit();
            }
        }
        $stmt->close();
    }

    // Redirect back with session messages
    $_SESSION['login-data'] = $_POST;
    header('Location: ' . $url . 'login');
    exit();
} else {
    header('Location: ' . $url . 'login');
    exit();
}

/**
 * Track failed login attempts
 */
function trackFailedAttempt($ip, $email = null) {
    global $MAX_ATTEMPTS, $LOCKOUT_DURATION, $conn;

    if (!isset($_SESSION['login_attempts'][$ip])) {
        $_SESSION['login_attempts'][$ip] = [
            'count' => 0,
            'first_attempt' => time(),
            'last_attempt' => time(),
            'emails' => []
        ];
    }

    $attempt_data = &$_SESSION['login_attempts'][$ip];
    $attempt_data['count']++;
    $attempt_data['last_attempt'] = time();

    if ($email && !in_array($email, $attempt_data['emails'])) {
        $attempt_data['emails'][] = $email;
    }

    // Check for lockout
    if ($attempt_data['count'] >= $MAX_ATTEMPTS) {
        $attempt_data['locked_until'] = time() + $LOCKOUT_DURATION;
        logLockout($ip, $email, $attempt_data['count']);
        $_SESSION['login'] = "Too many failed attempts. Try again in " . ceil($LOCKOUT_DURATION/60) . " minute(s).";
    } else {
        $remaining = $MAX_ATTEMPTS - $attempt_data['count'];
        $_SESSION['login'] .= " ($remaining remaining attempts.)";
    }
}

/**
 * Clear failed attempts on successful login
 */
function clearFailedAttempts($ip, $email) {
    if (isset($_SESSION['login_attempts'][$ip])) {
        unset($_SESSION['login_attempts'][$ip]);
    }
    clearDatabaseAttempts($ip, $email);
}

/**
 * Log lockouts in database
 */
function logLockout($ip, $email, $attempts) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO login_attempts (ip_address, email, attempts, locked_until) VALUES (?, ?, ?, ?)");
    $locked_until = date('Y-m-d H:i:s', time() + 900); // 15 minutes
    $stmt->bind_param("ssis", $ip, $email, $attempts, $locked_until);
    $stmt->execute();
    $stmt->close();
}

/**
 * Clear attempts from database
 */
function clearDatabaseAttempts($ip, $email) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM login_attempts WHERE ip_address = ? OR email = ?");
    $stmt->bind_param("ss", $ip, $email);
    $stmt->execute();
    $stmt->close();
}