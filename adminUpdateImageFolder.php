<?php
    // update image folder details in the file system

    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    // read all the posted data
    $originalFolder = '';
    if (isset($_POST['originalFolder'])) {
        $originalFolder = trim($_POST['originalFolder']);
    } else {
        header("Location: adminImages.php");
    }

    $newFolderName = trim($_POST['newFolderName']);
    $newParentFolder = trim($_POST['newParentFolder']);
    $thumbnail = $_FILES['thumbnailImage'];
    $images = $_POST['imagesToUpload'];
    $newImages = $_FILES['uploadImages'];

    echo 'Original Folder: ' . $originalFolder . '<br>';
    echo 'New Folder Name: ' . $newFolderName . '<br>';
    echo 'New Parent Folder: ' . $newParentFolder . '<br>';
    echo 'thumbnail: ';
    print_r($thumbnail);
    echo '<br>New Images: ';
    print_r($newImages);
    echo '<br>Images to keep: ';
    print_r($images);
    
    $path = 'documents/pics/gallery/';

    $fullPath = $path . $originalFolder;
    //echo $fullPath;

    // Determine new folder path
    $newFolderPath = $path;
    if ($newParentFolder !== '') {
        $newFolderPath .= $newParentFolder . '/';
    }
    $newFolderPath .= $newFolderName;
    echo '<br>New Folder Path: ' . $newFolderPath . '<br>';
    // Rename/move folder if name or parent changed
    if ($fullPath !== $newFolderPath) {
        if (!file_exists($newFolderPath)) {
            rename($fullPath, $newFolderPath);
            echo 'Folder moved/renamed.<br>';
        } else {
            echo 'Error: Target folder already exists.<br>';
        }
    }

    // Handle thumbnail upload
    if (isset($thumbnail) && $thumbnail['error'] === UPLOAD_ERR_OK) {
        echo 'uploading thumbnail<br>';
        $thumbnailTmpPath = $thumbnail['tmp_name'];
        $thumbnailDestPath = $newFolderPath . '/thumbnail.jpg';
        move_uploaded_file($thumbnailTmpPath, $thumbnailDestPath);
        echo 'thumbnail uploaded<br>';
    }

    // Remove images that are not in the $images array
    $allFiles = scandir($newFolderPath);
    foreach ($allFiles as $file) {
        if ($file === '.' || $file === '..' || $file === 'thumbnail.jpg') {
            continue;
        }
        if (!in_array($file, $images)) {
            unlink($newFolderPath . '/' . $file);
            echo 'deleted: ' . $file . '<br>';
        }
    }

    // Handle new images upload
    if (isset($newImages) && $newImages['error'][0] !== UPLOAD_ERR_NO_FILE) {
        echo 'uploading new images<br>';
        $numFiles = count($newImages['name']);
        for ($i = 0; $i < $numFiles; $i++) {
            if ($newImages['error'][$i] === UPLOAD_ERR_OK) {
                $imageTmpPath = $newImages['tmp_name'][$i];
                $imageDestPath = $newFolderPath . '/' . basename($newImages['name'][$i]);
                move_uploaded_file($imageTmpPath, $imageDestPath);
                echo 'uploaded: ' . basename($newImages['name'][$i]) . '<br>';
            }
        }
    }

    header("Location: adminImages.php");
    exit();

?>