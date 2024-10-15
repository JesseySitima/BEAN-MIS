<?php
session_start();

// Check if the user is logged in and if they are a normal user
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'user') {
    header("Location: login.html");
    exit();
}

echo "<h1>Welcome User, " . $_SESSION['user_name'] . "!</h1>";
echo '<a href="../logout.php">Logout</a>';
?>
