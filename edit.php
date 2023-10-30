<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $users = json_decode(file_get_contents('users.txt'), true);

    foreach ($users as &$user) {
        if ($user['id'] === $id) {
            $user['username'] = $username;
            $user['email'] = $email;
            $user['role'] = $role;
            break;
        }
    }

    file_put_contents('users.txt', json_encode($users));
    header('Location: adminDashboard.php');
    exit();
} else {
    $id = $_GET['id'];
    $users = json_decode(file_get_contents('users.txt'), true);

    foreach ($users as $user) {
        if ($user['id'] === $id) {
            $selectedUser = $user;
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center text-primary">Edit User</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?= $selectedUser['id'] ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $selectedUser['username'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $selectedUser['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="user" <?= $selectedUser['role'] == 'user' ? 'selected' : '' ?>>User</option>
                    <option value="manager" <?= $selectedUser['role'] == 'manager' ? 'selected' : '' ?>>Manager</option>
                    <option value="admin" <?= $selectedUser['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</body>
</html>
