<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.html");
    exit();
}

// User is logged in, display dashboard
echo "<h1>Welcome, " . $_SESSION['user_name'] . "!</h1>";
echo "<p>Your role is: " . $_SESSION['user_role'] . "</p>";
echo '<a href="logout.php">Logout</a>';
?>
