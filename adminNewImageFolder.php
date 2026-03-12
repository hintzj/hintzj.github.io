<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    $path = 'documents/pics/gallery/';
    // read the webaddress parameter 'parent' to get the parent directory
    if (isset($_POST['parentFolder'])) {
        $parentDir = $_POST['parentFolder'] . '/';
    } else {
        $parentDir = '';
    }

    $fullPath = $path . $parentDir;
    //echo $fullPath;

    $newFolderName = '';
    if (isset($_POST['newFolderName'])) {
        //echo 'posted';
        $newFolderName = trim($_POST['newFolderName']);
    }
    if ($newFolderName !== '') {
        $newFolderPath = $fullPath . $newFolderName;
        if (!file_exists($newFolderPath)) {
            mkdir($newFolderPath, 0777, true);
            echo 'created folder';
            // Handle thumbnail upload
            print_r($_FILES);
            echo $_FILES['thumbnailImage'];
            if (isset($_FILES['thumbnailImage']) && $_FILES['thumbnailImage']['error'] === UPLOAD_ERR_OK) {
                echo 'uploading thumbnail';
                $thumbnailTmpPath = $_FILES['thumbnailImage']['tmp_name'];
                $thumbnailDestPath = $newFolderPath . '/thumbnail.jpg';
                move_uploaded_file($thumbnailTmpPath, $thumbnailDestPath);
                echo 'thumbnail uploaded';
            }
        }
        echo $newFolderPath;
    }

    header("Location: adminImages.php");
    exit();
?>