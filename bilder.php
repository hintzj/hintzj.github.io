<?php
    require_once 'functions.php';
    // CSS link moved into the <head> to avoid emitting HTML before the DOCTYPE.

    $path = 'documents/pics/gallery/';

    // read the webaddress parameter 'dir' to get the subdirectory
    if (isset($_GET['dir'])) {
        $subdir = $_GET['dir'] . '/';
    } else {
        $subdir = '';
    }
    $fullPath = $path . $subdir;
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <link rel="stylesheet" href="design/css/gallery.css">
    <title>Bildergalerie - WSVL</title>
</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="content">
        <?php 
            $filename = getcwd() . $_SERVER['PHP_SELF'];
            $filename = basename($filename, ".php");
            $imageFilename = "documents/pics/introImage/" . $filename . ".png";
            //echo $filename;
        ?>
        <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);">
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
                    <h2>Bildergalerie</h2>
                    <p>
                        Hier findest du eine Auswahl an Bildern von unseren Veranstaltungen und Aktivitäten
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <!-- Display the current directory or subdirectory with links to navigate to past directories -->
            <div class="directory-navigation">
                <ul>
                <h3>
                <a href="bilder.php">Hauptverzeichnis</a>
                <?php
                    $pathParts = explode('/', rtrim($subdir, '/'));
                    $cumulativePath = '';
                    foreach ($pathParts as $part) {
                        if ($part !== '') {
                            $cumulativePath .= $part . '/';
                            echo ' / <a href="bilder.php?dir=' . rtrim($cumulativePath, '/') . '">' . htmlspecialchars($part) . '</a>';
                        }
                    }
                ?>
                </h3>
                </ul>
            </div>
        </div>
        <div class="text-field2" style="padding-right: 9px;">
            <br>
            <?php
                if (is_dir($fullPath)) {
                    displayGalleryFormattedToScreen($subdir);
                } else {
                    echo '<p>Das Verzeichnis existiert nicht.</p>';
                }
            ?>
        </div>
        <div class="text-field3">
            <h4>Haben Sie Bilder für die Galerie?</h4>
            <ul>
                <p>Wenn Sie Bilder haben, die Sie der Galerie hinzufügen möchten, laden Sie sie diese bitte über unser <a target="_blank" rel="noopener noreferrer" href="https://link.wsv-lampertheim.de/go/upload">Bilder-Upload-Formular</a> hoch. Wir freuen uns über Ihre Beiträge!</p>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>