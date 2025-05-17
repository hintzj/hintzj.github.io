<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }
    //echo "BRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR";
    if ($_GET['file']) {
        $fileToDelete = $_GET['file'];
        $filePath = "documents/mitgliederinfos/" . $fileToDelete;

        deleteMitgliederInfo($filePath);
        header("Location: adminMitgliederinfo.php");
        exit();
    }
?>