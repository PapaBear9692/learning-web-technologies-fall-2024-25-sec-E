<?php
    if (isset($_POST['submit'])) {

        $username =trim( $_POST['name'] );

        // Check if username is empty
        if ($username === "" || $username === null) {
            echo "Username cannot be empty";
        } 
        else {
            // Check if username contains at least two words
            $wordCount = 0;
            $insideWord = true;
            
            for ($i = 0; $i < strlen($username); $i++) {
                if ($username[$i] == ' ' || $username[$i] == '.' || $username[$i] == '-') {
                    $wordCount++;
                }
            }

            if ($wordCount < 2) {
                echo "Username must contain at least two words";
            }
            // Check if username starts with a letter
            else if (!(($username[0] >= 'a' && $username[0] <= 'z') || ($username[0] >= 'A' && $username[0] <= 'Z'))) {
                echo "Username must start with a letter";
            }
            // Check if username contains only valid characters
            else {
                $isValid = true;

                for ($i = 0; $i < strlen($username); $i++) {
                    $char = $username[$i];
                    if (!(($char >= 'a' && $char <= 'z') || 
                        ($char >= 'A' && $char <= 'Z') || 
                        $char === '.' || 
                        $char === '-' || 
                        $char === ' ')) {
                        $isValid = false;
                        break;
                    }
                }
                if (!$isValid) {
                    echo "Username can contain a-z, A-Z, period, dash, and spaces only";
                } else {
                    // If all validations pass
                    header('Location: page2_2.html');
                    exit();
                }
            }
        }
    } 
    else {
        // Redirect to the initial form page if accessed improperly
        header('location: Page2.html');
        exit();
    }
?>
