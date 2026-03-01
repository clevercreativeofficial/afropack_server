<?php

function checkAccess($requiredRole = 'admin')
{
    global $user, $url;

    $roleHierarchy = [
        'admin'   => 2,
        'editor' => 1,
        'author'  => 0
    ];

    if (!isset($user['role'])) {
        $_SESSION['access_error'] = "Login is required for access.";
        header('location: ' . $url . 'login/');
        exit();
    }

    $userLevel = $roleHierarchy[$user['role']] ?? -1;
    $requiredLevel = $roleHierarchy[$requiredRole] ?? 0;

    if ($userLevel < $requiredLevel) {

        $messages = [
            'admin'  => "Admin permissions required.",
            'editor' => "Minimum editor role required for access.",
            'author' => "Authentication required. Insufficient privileges."
        ];

        $_SESSION['access'] = $messages[$requiredRole] ?? "Access not allowed.";
        header('location: ' . $url . 'admin/');
        exit();
    }

    return true;
}
