<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    // get date id
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $dateId = $_GET['id'];
        $terminDetails = getDateDetails($dateId);
    } else {
        header("Location: adminDate.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $name = $_POST["title"];
        $startDate = $_POST["startDate"];
        $startTime = $_POST["startTime"];
        $endDate = $_POST["endDate"];
        $endTime = $_POST["endTime"];
        $youthEvent = isset($_POST["youthEvent"]) ? 1 : 0;
        $abteilung = $_POST["abteilung"];

        if ($startTime == "") {
            $startTime = null;
        }
        if ($endDate == "") {
            $endDate = null;
        }
        if ($endTime == "") {
            $endTime = null;
        }

        $result = editDate($dateId, $name, $startDate, $startTime, $endDate, $endTime, $youthEvent, $abteilung);

        if($result == "success"){
            header("location: adminDate.php");
        }else{
            $response = $result;
        }
    }
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
                        Title: <input type="text" name="title" placeholder="Titel" required value="<?php echo $terminDetails["terminTitle"]; ?>" />
                        <br>
                        <br>
                        Anfangsdatum: <input type="date" name="startDate" placeholder="TT.MM.JJJJ" required value="<?php echo $terminDetails["terminDateStart"]; ?>" />
                        <br>
                        <br>
                        Anfangszeit: <input type="time" name="startTime" id="startTime" placeholder="HH:MM" value="<?php echo $terminDetails["terminTimeStart"]; ?>" />
                        <button type="button" onclick="document.getElementById('startTime').value = ''">Eingabe Löschen</button>
                        <br>
                        <br>
                        Enddatum: <input type="date" name="endDate" id="endDate" placeholder="TT.MM.JJJJ" value="<?php echo $terminDetails["terminDateEnd"]; ?>" />
                        <button type="button" onclick="document.getElementById('endDate').value = ''">Eingabe Löschen</button>
                        <br>
                        <br>
                        Endzeit: <input type="time" name="endTime" id="endTime" placeholder="HH:MM" value="<?php echo $terminDetails["terminTimeEnd"]; ?>" />
                        <button type="button" onclick="document.getElementById('endTime').value = ''">Eingabe Löschen</button>
                        <br>
                        <br>
                        Jugendveranstaltung: <input type="checkbox" name="youthEvent" <?php echo $terminDetails["terminType"] ? 'checked' : ''; ?> />
                        <br>
                        <br>
                        Abteilung: <select name="abteilung" id="abteilung">
                                    <?php
                                        $abteilungen = getAbteilungenWithWebpage();
                                        if($abteilungen == null){
                                            echo "<option value='0'>Keine Abteilung gefunden</option>";
                                            return;
                                        }

                                        echo "<option value='0'>Allgemein</option>";

                                        foreach ($abteilungen as $abteilung) {
                                            echo "<option value='" . $abteilung['abteilungID'] . "'" . ($abteilung['abteilungID'] == $terminDetails["abteilungID"] ? " selected" : "") . ">" . $abteilung['abteilungName'] . "</option>";
                                        }
                                    ?>
                                </select>
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