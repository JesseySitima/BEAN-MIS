<?php
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: ../../index.html");
    exit();
}

// Include the database connection
include '../../db/connect.php';

// Query to get total patients
$resultPatients = $conn->query("SELECT COUNT(*) AS total_patients FROM patients");
$totalPatients = $resultPatients->fetch_assoc()['total_patients'];

// Query to get total earnings (sum of all bills)
$resultEarnings = $conn->query("SELECT SUM(amount) AS total_earnings FROM billing");
$totalEarnings = $resultEarnings->fetch_assoc()['total_earnings'];

// Query to get total staff (from users table, where role is 'staff' or 'doctor')
$resultStaff = $conn->query("SELECT COUNT(*) AS total_staff FROM users WHERE role = 'staff'");
$totalStaff = $resultStaff->fetch_assoc()['total_staff'];

// Query to get total appointments
$resultAppointments = $conn->query("SELECT COUNT(*) AS total_appointments FROM appointments");
$totalAppointments = $resultAppointments->fetch_assoc()['total_appointments'];

// Include the header and sidebar
include '../../includes/header.php'; // Adjust the path according to your directory structure
include '../../includes/sidebar.php';
?>

<!-- Admin Dashboard Content -->
<main>
    <h2>Welcome, Admin <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    

    <!-- Stats Overview Section -->
    <section class="dashboard-overview">
    <div class="stat-card">
            <i class="fas fa-user-injured icon"></i> <!-- Patient Icon -->
            <h3 class="card-title">Total Patients</h3>
            <p class="card-total"><?php echo $totalPatients; ?></p>
        </div>
        <div class="stat-card">
            <i class="fas fa-dollar-sign icon"></i> <!-- Earnings Icon -->
            <h3 class="card-title">Total Earnings</h3>
            <p class="card-total"><?php echo $totalEarnings ? "$" . number_format($totalEarnings, 2) : "$0"; ?></p>
        </div>
        <div class="stat-card">
            <i class="fas fa-user-md icon"></i> <!-- Staff Icon -->
            <h3 class="card-title">Total Staff</h3>
            <p class="card-total"><?php echo $totalStaff; ?></p>
        </div>
        <div class="stat-card">
            <i class="fas fa-calendar-check icon"></i> <!-- Appointment Icon -->
            <h3 class="card-title">Total Appointments</h3>
            <p class="card-total"><?php echo $totalAppointments; ?></p>
        </div>
    </section>

    <!-- Graphs Section -->
    <section class="graphs">
        <h3>Appointment Trends</h3>
        <canvas id="appointmentChart" width="400" height="200"></canvas>
    </section>

    <section class="admin-tools-section">
        <h3>Admin Tools</h3>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="view_reports.php">View Reports</a></li>
            <li><a href="settings.php">Admin Settings</a></li>
        </ul>
    </section>
</main>

<script>
    // Sample data for the chart (you may replace this with real data from your database)
    const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Appointments',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: [12, 19, 3, 5, 2, 3, 8],
        }]
    };

    const config = {
        type: 'line', // Change to 'bar', 'pie', etc. for different types of charts
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
            },
        },
    };

    // Render the chart
    const appointmentChart = new Chart(
        document.getElementById('appointmentChart'),
        config
    );
</script>


<?php
// Include the footer
include '../../includes/footer.php';
?>
