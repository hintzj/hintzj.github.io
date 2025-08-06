<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <link rel='stylesheet' type='text/css' href='jgv.css'>
    <title>Jugendvorstand - WSVL</title>
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
                    <h2>Willkommen auf der Seite des Jugendvorstandes</h2>
                    <p>Als Interessenvertretung der Jugend sind wir die Verbindung zum Hauptvorstand
                        <br> Zudem organisieren wir Events für die Jugend
                    </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Amtsinhaber des Jugendvorstands</h4>
            <p>
                <?php
                    /*
                    $conn = connect();
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }

                    function writeTable($conn) {
                        //$sql = "SELECT personen.personID, personen.vorname, personen.nachname, personen.email, vorstandsmitglieder.position, personen.bildURL, personen.gender, vorstandspositionen.positionName, vorstandspositionen.positionName FROM personen INNER JOIN vorstandsmitglieder ON personen.personID = vorstandsmitglieder.personID INNER JOIN vorstandspositionen ON vorstandsmitglieder.position = vorstandspositionen.positionID ORDER BY vorstandspositionen.positionID ASC";
                        //$sql = "SELECT * FROM personen LEFT JOIN vorstandsmitglieder ON personen.personID = vorstandsmitglieder.mitgliedID INNER JOIN vorstandspositionen ON vorstandsmitglieder.mitgliedID = vorstandspositionen.positionsID";
                        $sql = "SELECT * FROM vorstandsmitglieder AS vm
                        INNER JOIN personen AS p ON vm.personID = p.personID
                        INNER JOIN vorstandspositionen AS vp ON p.gender = vp.gender
                            AND vm.positionsID = vp.positionsID 
                        WHERE vm.vorstandID = 1
                        ORDER BY vm.positionsID ASC";
                        $result = $conn->query($sql);
                        $tableScript = "<table style='width: 100%'>";
                        $counter = 0;
                        while($row = $result->fetch_assoc()) {
                            if ($counter == 0) {
                                $tableScript .= "<tr>";
                            }
                            $tableScript .= "<td>";
                            $tableScript .= "<img src='documents/pics/personPortraits/" . $row['bildURL'] . "' alt='" . $row['Vorname'] . " " . $row['Nachname'] . "' style='width: 10em; border-radius: 5%;' />";
                            $tableScript .= "<br>";
                            $tableScript .= "<a href='mailto:" . $row['email'] . "'>";
                            $tableScript .= $row['Vorname'] . " " . $row['Nachname'];
                            $tableScript .= "</a>";
                            $tableScript .= "<br>";
                            $tableScript .= $row['positionName'];
                            $tableScript .= "<br>";
                            $tableScript .= "<br>";
                            $tableScript .= "</td>";
                            $counter++;
                            if ($counter == 3) {
                                $tableScript .= "</tr>";
                                $counter = 0;
                            }
                        }
                        $tableScript .= "</table>";
                        return $tableScript;
                    }
                    
                    echo writeTable($conn);
                    $conn->close();
                    */
                    $details = getVorstandPeopleDetails(2); // 2 is the ID for the Jugendvorstand
                    if ($details == false) {
                        echo "<p>Es sind keine Vorstandsmitglieder eingetragen.</p>";
                    } else {
                        echo "<table style='width: 100%'>";
                        $counter = 0;
                        foreach ($details as $row) {
                            if ($counter == 0) {
                                echo "<tr>";
                            }
                            if ($row == end($details) && $counter != 2) {
                                echo "<td></td>"; // Add an empty cell if the last row is not complete
                            }
                            echo "<td>";
                            echo "<img src='documents/pics/personPortraits/" . $row['bildURL'] . "' alt='" . $row['Vorname'] . " " . $row['Nachname'] . "' style='width: 10em; border-radius: 5%;' />";
                            echo "<br>";
                            echo "<a href='mailto:" . $row['email'] . "'>";
                            echo $row['Vorname'] . " " . $row['Nachname'];
                            echo "</a>";
                            echo "<br>";
                            echo $row['positionName'];
                            echo "<br>";
                            echo "<br>";
                            echo "</td>";
                            $counter++;
                            if ($counter == 3) {
                                echo "</tr>";
                                $counter = 0;
                            }
                        }
                        if ($counter != 0) {
                            echo "</tr>"; // Close the last row if it wasn't closed
                        }
                        echo "</table>";
                    }

                ?>
                

            </p>
        </div>
        <div class="text-field2">
            <h4>Jugendordnung</h4>
            <p>
                Die Jugendordnung des WSVL ist hier zu finden: <a href="documents/Jugendordnung.pdf" target="_blank">Jugendordnung WSVL</a>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>