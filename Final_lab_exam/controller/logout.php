<?php
    session_start();
    unset($_SESSION['loginflag']);
    header('location: ../view/login.html');
    exit;
?>