<?php
if (isset($_POST['submit'])) {
    
    if (isset($_POST['gender']) && $_POST['gender'] !== "") {
        $gender = $_POST['gender'];
        header('Location: page2_5.html');
        exit();
    } 
    else {
        
        echo "Please select a gender.";
    }
} 
else{ 
    header('Location: page2_3.html');
    exit();
}

?>
