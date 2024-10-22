<?php
session_start();

// Set session timeout duration in seconds
$session_timeout = 1800; // 30 minutes

// Check if last activity timestamp is set
if (isset($_SESSION['last_activity'])) {
    // Calculate time since last activity
    $inactive_time = time() - $_SESSION['last_activity'];
    // Check if inactive time exceeds session timeout duration
    if ($inactive_time >= $session_timeout) {
        // If yes, destroy the session and redirect to login page or any other action
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}

// Update last activity timestamp
$_SESSION['last_activity'] = time();
?>
