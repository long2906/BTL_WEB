<?php 
    session_start();

    if (isset($_SESSION['user_username']) && $_SESSION['user_username']) {
        unset($_SESSION['user_username']);
        unset($_SESSION['user_fullname']);
        unset($_SESSION['user_id']);
    }

    header('Location:login.php');
?>