<?php
    
    session_start();
    require_once ('../model/userModel.php');

    if (!isset($_SESSION['loginflag']) || $_SESSION['userType'] != 'admin') {
        header('location: login.html');
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (addUser($username, $password)) {
            echo "User added successfully";
            header('location: ../view/adminHome.php');
        } else {
            echo "Failed to add user";
            header('location: ../view/adminHome.php');
        }
    }
?>