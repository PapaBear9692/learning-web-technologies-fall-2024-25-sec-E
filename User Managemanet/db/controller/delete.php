<?php
    require_once('../model/userModel.php');
    if(isset($_REQUEST['delete'])){
        $username = $_REQUEST['username'];
        $status = deleteUser($username);
        if($status){
            header('location: ../view/userlist.php');
        }else{
            echo "Error while deleting";
        }
    }
?>