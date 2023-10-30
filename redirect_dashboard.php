<?php
session_start();
$role = $_SESSION['user']['role'];

if(!isset($_SESSION['role'])){
    header('Location: login.php');
}

if ($role == 'admin') {
    header('Location: adminDashboard.php');
} elseif ($role == 'manager') {
    header('Location: managerDashboard.php');
} elseif ($role == 'user') {
    header('Location: userDashboard.php');
}
?>
