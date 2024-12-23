<?php
    require_once('../model/userModel.php');
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        
        $status = updateUser($id, $username, $password, $email);
        if($status){
            header('location: ../view/userlist.php');
        }else{
            echo "Error while updating";
        }

    }
?>