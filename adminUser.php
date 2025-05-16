<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    } else if (!isSuperuser($_SESSION['user'])) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Benutzer Verwalten - WSVL</title>
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
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);";>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
            <h2>Benutzer verwalten</h2>
            <p>
                Willkommen im Administrationsbereich für die Benutzer der administrativen Seite der Webseite. Hier kannst du Benutzer hinzufügen, bearbeiten oder löschen. Bitte wähle einen Benutzer aus oder erstelle einen neuen Benutzer, um fortzufahren.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>[*Insert Text Here*]</h4>
            <p>
                <ul>
                    <li>[*Insert Text Here*]</li>
                    <li>[*Insert Text Here*]</li>
                    <li>[*Insert Text Here*]</li>
                </ul>
            </p>
            <p>
                <ul>
                    <input type="button" style="background-color: royalblue;" onclick="location.href='adminDashboard.php';" value='Zurück' />
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>