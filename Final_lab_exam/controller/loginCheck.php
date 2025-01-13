<?php
    require_once ('../model/userModel.php');
    
    session_start();
    if (isset($_POST['submit'])) {

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $userType = $_POST['userType'];

        if (empty($username) || empty($password)) {
            echo "Username or Password is empty";
            header('location: ../view/login.html');
        }

        $user = getUser($username, $password);
        $admin = getAdmin($username, $password);

        if($userType == 'user' && $user['username'] == $username && $user['password'] == $password){
            $_SESSION['loginflag'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['userType'] = $userType;
            header('location: ../view/userHome.php');
        }
        else if($userType == 'admin' && $admin['username'] == $username && $admin['password'] == $password){
            
            $_SESSION['loginflag'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['userType'] = $userType;
            header('location: ../view/adminHome.php');
        }
        else {
            echo "Invalid username or password";
            header('location: ../view/login.html');
        }
    }
?>