<!-- sidebar.php -->
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside>
    <div class="logo-container">
        <img src="http://localhost/BEAN%20Medical%20Center/assets/img/logo.png" alt="Bean Medical Center Logo" class="logo">
        <h1>Bean Medical Center</h1>
    </div>
    <nav>
        <ul>
            <li><a href="/BEAN%20Medical%20Center/pages/dashboards/admin_dashboard.php" class="<?php echo ($current_page == 'admin_dashboard.php') ? 'active' : ''; ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="/BEAN%20Medical%20Center/pages/appointments.php" class="<?php echo ($current_page == 'appointments.php') ? 'active' : ''; ?>"><i class="fas fa-calendar-check"></i> Appointments</a></li>
            <li><a href="/BEAN%20Medical%20Center/pages/patients/patients.php" class="<?php echo ($current_page == 'patients.php') ? 'active' : ''; ?>"><i class="fas fa-users"></i> Patients</a></li>
            <li><a href="/BEAN%20Medical%20Center/pages/medical_records.php" class="<?php echo ($current_page == 'medical_records.php') ? 'active' : ''; ?>"><i class="fas fa-file-medical"></i> Medical Records</a></li>
            <li><a href="/BEAN%20Medical%20Center/pages/patient_visits.php" class="<?php echo ($current_page == 'patient_visits.php') ? 'active' : ''; ?>"><i class="fas fa-user-md"></i> Patient Visits</a></li>
            <li><a href="/BEAN%20Medical%20Center/pages/billing.php" class="<?php echo ($current_page == 'billing.php') ? 'active' : ''; ?>"><i class="fas fa-file-invoice-dollar"></i> Billing</a></li>
            <li><a href="/BEAN%20Medical%20Center/pages/settings.php" class="<?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>"><i class="fas fa-cog"></i> Settings</a></li>
        </ul>
    </nav>
</aside>
