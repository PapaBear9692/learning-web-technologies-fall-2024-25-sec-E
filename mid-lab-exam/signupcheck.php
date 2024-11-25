<?php 
    session_start();
    if(isset($_REQUEST['submit'])){

        $username = trim($_REQUEST['name']);
        $usermail = trim($_REQUEST['email']);
        $password = trim($_REQUEST['pass']);
        $conpass = trim($_REQUEST['conpass']);
        $gender = $_REQUEST['gender'];
        $degree = $_REQUEST['degree'];
        $blood = $_REQUEST['blood'];

        if( empty($username) || 
            empty($password) ||
            empty($conpass)  ||
            empty($usermail) ||
            empty($gender)   ||
            empty($degree)   
        
        ){
            header('location: signup.html');
        }
        else if($password != $conpass){
            header('location: signup.html');
        }
        else{

            $user = [$username, $password, $usermail, $gender,$blood, $degree];
            $_SESSION['users'][] = $user;
            header('location: login.html');
        }
    
    }

?>