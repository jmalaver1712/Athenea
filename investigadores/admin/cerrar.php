<?php
    require_once('../admin/locked.php');
    session_destroy();
    session_unset();
    unset($_COOKIE['AoIuser']);  
    unset($_COOKIE['userPass']);  
    header("Location: ../../index.html");
?>