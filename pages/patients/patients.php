<?php
session_start();

include '../../db/connect.php';  // Include database connection
include '../../includes/header.php';         // Include the header
include '../../includes/sidebar.php';        // Include the sidebar

// Fetch all patients
$result = $conn->query("SELECT * FROM patients");

?>

<main>
    <h2>Manage Patients</h2>
    <a href="manage_patients.php">Add New Patient</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['date_of_birth']; ?></td>
                <td>
                    <a href="manage_patients.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    <a href="manage_patients.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
include '../../includes/footer.php'; // Include the footer
?>
