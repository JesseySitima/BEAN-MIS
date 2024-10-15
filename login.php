<?php
// Start the session
session_start();

// Include the database connection file
include 'db/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare a SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullName'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: pages/dashboards/admin_dashboard.php");
            } elseif ($user['role'] == 'manager') {
                header("Location: manager_dashboard.php");
            } else {
                header("Location:pages/dashboards/user_dashboard.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    // Close the database connection
    $conn->close();
}
?>
