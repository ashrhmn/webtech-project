<?php

switch ($row['role']) {
    case 'Admin':
        header('location: ../roles/admin/dashboard.php');
        break;
    case 'Doctor':
        header('location: ../roles/doctor/dashboard.php');
        break;
    case 'Employee':
        header('location: ../roles/employee/dashboard.php');
        break;
    case 'Patient':
        header('location: ../roles/patient/dashboard.php');
        break;
    default:
        echo 'Invalid role, contact admins';
        return;
        break;
}