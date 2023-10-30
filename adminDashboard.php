<?php
session_start();

$users = json_decode(file_get_contents('users.txt'), true);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <a style="width:100px;text-align:center;" class="btn btn-info mt-3" href="registration.php">sign up</a>
    <a style="width:100px;text-align:center;" class="btn btn-danger mt-3" href="logout.php">logout</a>

        <table class="table">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <!-- <td><?= $user['id'] ?></td> -->
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
