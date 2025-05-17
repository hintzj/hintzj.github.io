<?php
    require_once 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Artikel bearbeiten - WSVL</title>
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
            <h2>Artikel bearbeiten</h2>
            <p>
                Willkommen im Administrationsbereich für die Artikel der Webseite. Hier kannst du den ausgwählten Artikel bearbeiten. Bitte fülle die Felder aus und klicke auf "Artikel speichern", um die Änderungen zu speichern.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminDate.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Artikel bearbeiten</h4>
            <p>
                <ul>
                    <form action="" method="post">
                        <table class="adminTable">
                            <tr>
                                <td><label>Titel: </label></td>
                                <td><input type="text" placeholder="Titel des Artikels" name="title" id="title" required></td>
                            </tr>
                            <tr>
                                <td><label>Zusammenfassung: </label></td>
                                <td><textarea placeholder="Inhalt" name="summary" id="summary" required rows="5" cols="60" style="resize: none;"></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Inhalt: </label></td>
                                <td><textarea placeholder="Inhalt" name="summary" id="summary" required rows="10" cols="60" style="resize: none;"></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Datum: </label></td>
                                <td><input type="date" name="date" id="date"></td>
                            </tr>
                            <tr>
                                <td><label>Bilder hinzufügen: </label></td>
                                <td><input type="file" name="fileToUpload" id="fileToUpload" multiple></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Artikel speichern" name="submit"></td>
                            </tr>
                        </table>
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>