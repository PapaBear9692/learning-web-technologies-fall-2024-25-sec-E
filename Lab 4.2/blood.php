<?php
    if(isset($_POST['submit'])){
        $blood = $_POST['blood'];

        if($blood != "")
            header('location: page2_7.html');
        else
            header('location: page2_6.html');
    }
?>