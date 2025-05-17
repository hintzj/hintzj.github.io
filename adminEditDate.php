<?php
    require_once 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Termin bearbeiten - WSVL</title>
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
            <h2>Termin bearbeiten</h2>
            <p>
                Willkommen im Administrationsbereich für die Termine der Webseite. Hier kannst du den ausgwählten Termin bearbeiten. Bitte fülle die Felder aus und klicke auf "Termin ändern", um die Änderungen zu speichern.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminDate.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Termin bearbeiten</h4>
            <p>
                <ul>
                    <form action="" method="post">
                        Title: <input type="text" name="title" placeholder="Titel" required value="<?php echo null; ?>" />
                        <br>
                        <br>
                        Datum: <input type="text" name="date" placeholder="TT.MM.JJJJ" required value="<?php echo null; ?>" />
                        <br>
                        <br>
                        Uhrzeit: <input type="text" name="time" placeholder="HH:MM" required value="<?php echo null; ?>" />
                        <br>
                        <br>
                        Jugendveranstaltung: <input type="checkbox" name="youthEvent" value="yes" value="<?php null; ?>" >
                        <br>
                        <br>
                        <input type="submit" name="submit" value="Termin ändern">
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>