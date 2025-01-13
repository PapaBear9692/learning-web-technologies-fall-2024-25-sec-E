<?php

    session_start();
    require_once ('../model/userModel.php');

    if (!isset($_SESSION['loginflag']) || $_SESSION['userType'] != 'admin') {
        header('location: login.html');
    }

?>

<html>
    <head>
        <title>Admin Home</title>
    </head>
    <body>
        <h1 align="center">Welcome Admin</h1>
        <table align="center" width="100%" border="1">
            <th align="center">
                <a href="addUser.php">Add User</a>
            </th>
            <th align="center">
                <label>Add User</label>
            </th>
            <th align="center">
                <a href="../controller/logout.php">Logout</a>
            </th>
        </table>

        <table align="center" width="100%" border="1">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            <?php
                $users = getAllUser();
                for ($i=0; $i < count($users); $i++) { 
            ?>
            <tr>
                <td><?= $users[$i]['id'] ?></td>
                <td><?= $users[$i]['username'] ?></td>
                <td><?= $users[$i]['type'] ?></td>
                <td>
                    <a href="editUser.php?id=<?= $users[$i]['id'] ?>">Edit</a> |
                    <a href="../controller/deleteUser.php?id=<?= $users[$i]['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>

    </body>

</html>