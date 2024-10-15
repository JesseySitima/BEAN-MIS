<?php
// Include the database connection file
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Default role is 'user'
    $role = 'user';

    // Prepare SQL query to insert the user data into the database
    $sql = "INSERT INTO users (fullName, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
