<?php
    if(isset($_POST['submit'])){

        $gender = $_POST['gender'] ;

        if($gender != "" && $gender != null){
            header('location : page2_5.html');
            exit();
        }
    }
    else{
        header('location : page2_3.html');
        exit();
    }
?>