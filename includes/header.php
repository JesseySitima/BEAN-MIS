<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean Medical Center</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <!-- You can add Font Awesome or other libraries here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<header>
    <div class="header-container">
        <h1>Bean Medical Center</h1>
        <nav class="header-nav"> <!-- Add class here -->
            <ul>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_name'])) {
                    echo "<li>" . htmlspecialchars($_SESSION['user_name']) . "</li>";
                } else {
                    echo "<li>Hello, Guest</li>";
                }
                ?>
                 <li class="notifications">
                    <a href="notifications.php"><i class="fas fa-bell"></i></a>
                    <span class="notification-count">3</span> <!-- Replace with dynamic count if needed -->
                </li>
            </ul>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
               
        </nav>
    </div>
</header>
