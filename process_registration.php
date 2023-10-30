<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$user = [
    'id' => uniqid(),
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'role' => 'user'
];

$users = json_decode(file_get_contents('users.txt'), true);
$users[] = $user;
file_put_contents('users.txt', json_encode($users));

header('Location: login.php');
?>
