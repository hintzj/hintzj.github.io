<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $name = $_POST["title"];
        $date = $_POST["startDate"];
        $time = $_POST["startTime"];
        $endDate = $_POST["endDate"];
        $endTime = $_POST["endTime"];
        $youthEvent = isset($_POST["youthEvent"]) ? 1 : 0;
        $abteilung = $_POST["abteilung"];

        if ($time == "") {
            $time = null; // Set default time if not provided
        }
        if ($endDate == "") {
            $endDate = null;
        }
        if ($endTime == "") {
            $endTime = null;
        }

        $result = newDate($name, $date, $time, $endDate, $endTime, $youthEvent, $abteilung);

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
    <title>Termine verwalten - WSVL</title>
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
            <h2>Termine verwalten</h2>
            <p>
                Willkommen im Administrationsbereich für die Termine der Webseite. Hier kannst du Termine hinzufügen, bearbeiten oder löschen. Bitte wähle einen Termin aus oder erstelle einen neuen Termin, um fortzufahren.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminDashboard.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Neuen Termin erstellen</h4>
            <p>
                <ul>
                    <form action="" method="post">
                        Title: <input type="text" name="title" placeholder="Titel" required />
                        <br>
                        <br>
                        Anfangsdatum: <input type="date" name="startDate" placeholder="TT.MM.JJJJ" required />
                        <br>
                        <br>
                        Anfangszeit: <input type="time" name="startTime" placeholder="HH:MM" />
                        <br>
                        <br>
                        Enddatum: <input type="date" name="endDate" placeholder="TT.MM.JJJJ" />
                        <br>
                        <br>
                        Endzeit: <input type="time" name="endTime" placeholder="HH:MM" />
                        <br>
                        <br>
                        Jugendveranstaltung: <input type="checkbox" name="youthEvent">
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
                                            echo "<option value='" . $abteilung['abteilungID'] . "'>" . $abteilung['abteilungName'] . "</option>";
                                        }
                                    ?>
                                </select>
                        <br>
                        <br>                    
                        <input type="submit" name="submit" value="Termin erstellen">
                    </form>
                </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Zukünftige Termine</h4>
            <p>
                <ul>
                    <table class="adminTable">
                        <tr>
                            <th>Titel</th>
                            <th>Anfangsdatum</th>
                            <th>Anfangszeit</th>
                            <th>Enddatum</th>
                            <th>Enduhrzeit</th>
                            <th>Jugendveranstaltung</th>
                            <th>Abteilung</th>
                            <th>Bearbeiten</th>
                        </tr>
                        <?php
                            $dates = getFutureDates();
                            if($dates){
                                foreach($dates as $date){
                                    $title = htmlspecialchars($date['terminTitle']);

                                    if ($date['terminTimeStart'] == null) {
                                        $startTime = " - ";
                                    } else {
                                        $startTime = htmlspecialchars(date('H:i', strtotime($date['terminTimeStart'])));
                                    }
                                    if ($date['terminDateEnd'] == null) {
                                        $endDate = " - ";
                                    } else {
                                        $endDate = htmlspecialchars(date('d.m.Y', strtotime($date['terminDateEnd'])));
                                    }
                                    if ($date['terminTimeEnd'] == null) {
                                        $endTime = " - ";
                                    } else {
                                        $endTime = htmlspecialchars(date('H:i', strtotime($date['terminTimeEnd'])));
                                    }

                                    $startDate = htmlspecialchars(date('d.m.Y', strtotime($date['terminDateStart'])));

                                    echo "<tr>";
                                    echo "<td>" . $title . "</td>";
                                    echo "<td>" . $startDate . "</td>";
                                    echo "<td>" . $startTime . "</td>";
                                    echo "<td>" . $endDate . "</td>";
                                    echo "<td>" . $endTime . "</td>";
                                    echo "<td>" . ($date['terminType'] ? 'Ja' : 'Nein') . "</td>";
                                    echo "<td>" . htmlspecialchars(getAbteilungNameByID($date['abteilungID'])) . "</td>";
                                    echo "<td><input type='button' style='background-color: royalblue;' onclick=\"location.href='adminEditDate.php?id=" . $date['terminID'] . "';\" value='Bearbeiten' /></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Keine zukünftigen Termine gefunden.</td></tr>";
                            }
                        ?>
                    </table>
                </ul>
            </p>
        </div>
        <div class="text-field3">
            <h4>Vergangene Termine</h4>
            <p>
                <ul>
                    <table class="adminTable">
                        <tr>
                            <th>Titel</th>
                            <th>Anfangsdatum</th>
                            <th>Anfangszeit</th>
                            <th>Enddatum</th>
                            <th>Enduhrzeit</th>
                            <th>Jugendveranstaltung</th>
                            <th>Abteilung</th>
                            <th>Bearbeiten</th>
                        </tr>
                        <?php
                            $pastDates = getPastDates();
                            if($pastDates){
                                foreach($pastDates as $date){
                                    $title = htmlspecialchars($date['terminTitle']);

                                    if ($date['terminTimeStart'] == null) {
                                        $startTime = " - ";
                                    } else {
                                        $startTime = htmlspecialchars(date('H:i', strtotime($date['terminTimeStart'])));
                                    }
                                    if ($date['terminDateEnd'] == null) {
                                        $endDate = " - ";
                                    } else {
                                        $endDate = htmlspecialchars(date('d.m.Y', strtotime($date['terminDateEnd'])));
                                    }
                                    if ($date['terminTimeEnd'] == null) {
                                        $endTime = " - ";
                                    } else {
                                        $endTime = htmlspecialchars(date('H:i', strtotime($date['terminTimeEnd'])));
                                    }

                                    $startDate = htmlspecialchars(date('d.m.Y', strtotime($date['terminDateStart'])));

                                    echo "<tr>";
                                    echo "<td>" . $title . "</td>";
                                    echo "<td>" . $startDate . "</td>";
                                    echo "<td>" . $startTime . "</td>";
                                    echo "<td>" . $endDate . "</td>";
                                    echo "<td>" . $endTime . "</td>";
                                    echo "<td>" . ($date['terminType'] ? 'Ja' : 'Nein') . "</td>";
                                    echo "<td>" . htmlspecialchars(getAbteilungNameByID($date['abteilungID'])) . "</td>";
                                    echo "<td><input type='button' style='background-color: royalblue;' onclick=\"location.href='adminEditDate.php?id=" . $date['terminID'] . "';\" value='Bearbeiten' /></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Keine vergangenen Termine gefunden.</td></tr>";
                            }
                        ?>
                    </table>
                </ul>
            </p>
        </div>
            
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>