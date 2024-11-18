<?php
    if(isset($_POST['submit'])){
        $degree[] = $_POST['degree'];

        if(sizeof($degree) >= 2){
            header('location: page2_6.html');
            exit();
        }else{
            header('location: page2_5.html');
            exit();
        }
    }
?>