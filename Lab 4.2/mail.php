<?php
    if (isset($_POST['submit'])){
        $mail = trim( $_POST['email'] );
        
        if($mail == null || $mail == "")
        {
            echo "Email cannot be empty";
        }
        else
        {
            $isValid = true;
            $at = 0;
            $dot = 0;
            for($i = 0; $i < strlen($mail); $i++)
            {
                $char = $mail[$i];
                if($char == '@')
                {
                    $at++;
                }
            }
            if($at != 1 || $mail[strlen($mail) - 4] != '.')
            {
                echo "Invalid Email";
            }
            else
            {
                header('location: page2_4.html');
                exit();
            }
        }
    }
    else {
        header('location: page2_2.html');
        exit();
    }
    
?>