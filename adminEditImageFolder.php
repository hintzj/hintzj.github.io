<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Ordner Bearbeiten - WSVL</title>
</head>

<script>
    function previewThumbnail(input, imgId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.getElementById(imgId);
                if (!img) {
                    img = document.createElement("img");
                    img.id = "thumbnailPreview";
                    img.style.maxWidth = "200px";
                    img.style.maxHeight = "200px";
                    input.parentNode.insertBefore(img, input.nextSibling);
                }
                img.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<body>
    <?php include 'header1.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);";>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
            <h2>Ordner bearbeiten</h2>
            <p>
                Willkommen im Administrationsbereich zum Bearbeiten von Bildordnern. Hier kannst du die Eigenschaften eines Ordners ändern.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminImages.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <?php if (!isset($_GET['folder'])) {
                // point user to adminImages.php if no folder is specified
                header("Location: adminImages.php");
                exit();
            } else {
                $folderPath = "documents/pics/gallery/" . $_GET['folder'];
                if (!is_dir($folderPath)) {
                   header("Location: adminImages.php");
                    exit();
                } else {
                    if ($_GET['folder'] == "") {
                        echo "<h4>Hauptverzeichnis bearbeiten</h4>";
                    } else {
                        echo "<h4>Ordner \"" . htmlspecialchars($_GET['folder']) . "\" bearbeiten</h4>";
                    }
                }
            } ?>
            <ul>
            <form method="post" enctype="multipart/form-data" action="adminUpdateImageFolder.php">
                <input type="hidden" name="originalFolder" value="<?php echo htmlspecialchars($_GET['folder']); ?>" />
                <?php
                    $currentFolder = "/" . $_GET['folder'];
                    if ($currentFolder !== "/") {
                        // print the FolderName question and parentFolder selection only if not in the root folder
                        echo '<label for="folderName">Neuer Ordnername:</label><br>';
                        echo '<input type="text" id="folderName" name="newFolderName" value="' . basename(htmlspecialchars($_GET['folder'])) . '" required><br><br>';
                        echo '<label for="newParentFolder">Übergeordneten Ordner auswählen:</label><br>';
                        echo '<select id="newParentFolder" name="newParentFolder">';
                        echo '<option value="">Hauptverzeichnis</option>';
                        function renderFolderOptions($dir, $currentFolder, $baseDir, $prefix = "") {
                            $items = scandir($dir);
                            foreach ($items as $item) {
                                if ($item === '.' || $item === '..') continue;
                                $fullPath = $dir . '/' . $item;
                                if (is_dir($fullPath)) {
                                    $relativePath = str_replace($baseDir, '', $fullPath);
                                    //log relativePath and currentFolder in console for debugging
                                    //echo "<script>console.log('Relative Path: " . htmlspecialchars($relativePath) . "');</script>";
                                    //echo "<script>console.log('Current Folder: " . htmlspecialchars($currentFolder) . "');</script>";
                                    if ($relativePath !== $currentFolder) {
                                        echo '<option value="' . htmlspecialchars($relativePath) . '"';
                                        //echo "<script>console.log('Dirname Current Folder: " . htmlspecialchars(dirname($currentFolder)) . "');console.log('Comparing: " . htmlspecialchars(dirname($currentFolder)) . " and " . htmlspecialchars($relativePath) . "');</script>";
                                        if (dirname($currentFolder) === $relativePath) {
                                            echo ' selected';
                                        }
                                        echo '>' . htmlspecialchars($prefix . $item) . '</option>';
                                        renderFolderOptions($fullPath, $currentFolder, $baseDir, $prefix . $item . '/');
                                    }
                                }
                            }
                        }
                        renderFolderOptions("documents/pics/gallery/", $currentFolder, "documents/pics/gallery/");
                        echo '</select>';
                        echo '<br><br>';
                        echo '<label for="thumbnailImage">Vorschaubild:</label><br>';
                        echo '<input type="file" id="thumbnailImage" name="thumbnailImage" accept="image/*" onchange="previewThumbnail(this, \'thumbnailPreview\')"><br><br>';
                        // display the current thumbnail if none is uploaded yet, if one is uploaded show the uploaded one instead
                        $thumbnailPath = $folderPath . '/thumbnail.jpg';
                        if (file_exists($thumbnailPath)) {
                            echo '<img id="thumbnailPreview" src="' . htmlspecialchars($thumbnailPath) . '" alt="Vorschaubild" style="max-width:200px; max-height:200px;"><br><br>';
                        } else {
                            echo 'Kein Vorschaubild vorhanden.<br><br>';
                        }
                    }
                
                    //check if the folder contains images and list them with options to upload or download
                    // count the number of images in the folder
                    $imageCount = 0;
                    $images = scandir($folderPath);
                    foreach ($images as $image) {
                        if ($image === '.' || $image === '..') continue;
                        $imageFullPath = $folderPath . '/' . $image;
                        if (is_file($imageFullPath)) {
                            $imageCount++;
                        }
                    }
                    if ($imageCount > 0) {
                        echo '<label for="images">Bilder im Ordner:</label><br>
                                <table class="adminTable" id="images" name="images">
                                    <tr>
                                        <th>Hochladen</th>
                                        <th>Bildname</th>
                                        <th>Vorschau</th>
                                        <th>Runterladen</th>
                                    </tr>';
                                        $images = scandir($folderPath);
                                        foreach ($images as $image) {
                                            if ($image === '.' || $image === '..') continue;
                                            $imageFullPath = $folderPath . '/' . $image;
                                            if (is_file($imageFullPath)) {
                                                if (strpos($image, '.php') !== false) {
                                                    continue; // skip .php files for security
                                                }
                                                if (strpos($image, '.htaccess') !== false) {
                                                    continue; // skip .htaccess files for security
                                                }
                                                if (strpos($image, 'thumbnail.jpg') !== false) {
                                                    continue; // skip thumbnail file
                                                }
                                                echo '<tr>';
                                                echo '<td><input type="checkbox" name="imagesToUpload[]" checked value="' . htmlspecialchars($image) . '"></td>';
                                                echo '<td>' . htmlspecialchars($image) . '</td>';
                                                echo '<td><img src="' . htmlspecialchars($imageFullPath) . '" alt="' . htmlspecialchars($image) . '" style="max-width:100px; max-height:100px;"></td>';
                                                echo '<td><a href="' . htmlspecialchars($imageFullPath) . '" download>Download</a></td>';
                                                echo '</tr>';
                                            }
                                        }
                                echo '</table><br><br>';
                    }
                ?>
                <label for="uploadImages">Neue Bilder in den Ordner hochladen:</label><br>
                <input type="file" id="uploadImages" name="uploadImages[]" accept="image/*" multiple><br><br>
                <input type="submit" value="Änderungen speichern" style="background-color: royalblue;">
            </form>
            </ul>
        </div>
        <div class="text-field2">
            <h4>Neuen Ordner unter "<?php if ($_GET['folder'] !== "") { echo htmlspecialchars($_GET['folder']);} else { echo "Hauptverzeichnis"; } ?>" erstellen</h4>
            <ul>
                <form method="POST" enctype="multipart/form-data" action="adminNewImageFolder.php">
                    <input type="hidden" name="parentFolder" value="<?php echo htmlspecialchars($_GET['folder']); ?>" />
                    
                    <label for="newFolderName">Neuer Ordnername:</label><br>
                    <input type="text" id="newFolderName" name="newFolderName" value="" required><br><br>

                    <label for="thumbnailImage">Vorschaubild:</label><br>
                    <input type="file" id="thumbnailImage" name="thumbnailImage" required accept="image/*" onchange="previewThumbnail(this, 'thumbnailNewFolderPreview')"><br><br>
                    <img id="thumbnailNewFolderPreview" src="documents\pics\logo1.png" alt="Vorschaubild" style="max-width:200px; max-height:200px;"><br><br>

                    <input type="submit" style="background-color: royalblue;" value='Neuen Ordner erstellen' />
                </form>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>