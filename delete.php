<?php
$id = $_GET['id'];
$users = json_decode(file_get_contents('users.txt'), true);

foreach ($users as $key => $user) {
    if ($user['id'] === $id) {
        unset($users[$key]);
        break;
    }
}

file_put_contents('users.txt', json_encode(array_values($users)));

header('Location: adminDashboard.php'); // or appropriate dashboard
