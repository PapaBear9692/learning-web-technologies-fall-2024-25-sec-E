<?php 
    session_start();
    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['name']);
        $password = trim($_REQUEST['pass']);

        $checkuser = null;
        $checkpass = null;
        
        for(int i=0; i<sizeof($_SESSION['users']); i++){
            if($_SESSION['users'][0] == $username)
                $checkpass = $_SESSION['users'][1];
        }

        if($username == null || empty($password)){
            echo "Null username/password";
            header('location: login.html');
        }
        else if($password == $checkpass){
            $_SESSION['status'] = true;
            $_SESSION['username'] = $username;
            header('location: home.php');
            echo "login worked";
        }
    
    }
    else if (isset($_REQUEST['signup'])){
        header('location: signup.html');
    }
    else{
        header('location: login.html');
    }

?>