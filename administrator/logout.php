<?php

    session_start();

    $_SESSION['status'] = 'invalid';

    unset($_SESSION['admin_id']);
    unset($_SESSION['user_type']);
    unset($_SESSION['username']);
   


    
    header('location:  login.php ');
?>