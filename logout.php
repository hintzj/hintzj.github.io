<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    } else {
        logoutUser();
        header("Location: index.php");
        exit();
    }
?>