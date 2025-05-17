<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['submit'])) {
        $var = newMitgliederInfo($_FILES['fileToUpload']);
        if ($var) {
            echo "<script>alert('Die Mitgliederinfo wurde erfolgreich hochgeladen.');</script>";
            header("Location: adminMitgliederinfo.php");
            exit();
        } else {
            echo "<script>alert('Fehler beim Hochladen der Mitgliederinfo.');</script>";
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Mitgliederinfos verwalten - WSVL</title>
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
            <h2>Mitgliederinfos verwalten</h2>
            <p>
                Willkommen im Administrationsbereich für die Mitgliederinfos der Webseite. Hier kannst du Mitgliederinfos hinzufügen oder entfernen. Bitte wähle eine Mitgliederinfo aus oder lade eine neue Mitgliederinfo hoch, um fortzufahren.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminDashboard.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Neue Mitgliederinfo erstellen</h4>
            <p>
                <ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="fileToUpload">Mitgliederinfo hochladen:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" required accept=".pdf">
                        <input type="submit" name="submit" value="Hochladen">
                    </form>
                </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Mitgliederinfos</h4>
            <ul>
                <table class="adminTable">
                    <tr>
                        <th>Mitgliederinfo</th>
                        <th>Öffnen</th>
                        <th>Löschen</th>
                    </tr>
                    <?php
                        $files = getMitgliederInfos();
                        foreach ($files as $file) {
                            $filename = basename($file);
                            echo "<tr>";
                            echo "<td>" . $filename . "</td>";
                            echo "<td><a href='documents/mitgliedsinfos/" . $file . "' target='_blank'>Öffnen</a></td>";
                            echo "<td><a href='deleteMitgliederinfo.php?file=" . urlencode($filename) . "' onclick=\"return confirm('Bist du sicher, dass du diese Mitgliederinfo löschen möchtest?');\">Löschen</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>