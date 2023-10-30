<?php
$email = $_POST['email'];
$password = $_POST['password'];

$users = json_decode(file_get_contents('users.txt'), true);

foreach ($users as $user) {
    if ($user['email'] === $email && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: redirect_dashboard.php');
        exit();
    }
}

header('Location: login.php');
exit();
?>
