<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Vorstand - WSVL</title>
    </style>
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
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);" ;>
                <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                    <div>
                        <h2>Vorstand</h2>
                        <p>
                            Als Interessenvertretung unsere Mitglieder leitet
                            <br> der Vorstand die Angelegenheiten des Vereins
                            <br> Er wird jedes Jahr auf unsere Mitgliederhauptversammlung gewählt
                        </p>
                    </div>
                </div>
            </div>
        <div class="text-field1">
            <h4>Amtsinhaber</h4>
            <p>
                <?php
                    $conn = connect();
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }

                    function writeTable($conn) {
                        //$sql = "SELECT personen.personID, personen.vorname, personen.nachname, personen.email, vorstandsmitglieder.position, personen.bildURL, personen.gender, vorstandspositionen.positionName, vorstandspositionen.positionName FROM personen INNER JOIN vorstandsmitglieder ON personen.personID = vorstandsmitglieder.personID INNER JOIN vorstandspositionen ON vorstandsmitglieder.position = vorstandspositionen.positionID ORDER BY vorstandspositionen.positionID ASC";
                        //$sql = "SELECT * FROM personen LEFT JOIN vorstandsmitglieder ON personen.personID = vorstandsmitglieder.mitgliedID INNER JOIN vorstandspositionen ON vorstandsmitglieder.mitgliedID = vorstandspositionen.positionsID";
                        $sql = "SELECT * FROM vorstandsmitglieder
                        INNER JOIN personen ON mitgliedID = personID
                        INNER JOIN vorstandspositionen ON personen.gender = vorstandspositionen.gender
                            AND vorstandsmitglieder.positionsID = vorstandspositionen.positionsID 
                        ORDER BY vorstandsmitglieder.positionsID ASC";
                        $result = $conn->query($sql);
                        $tableScript = "<table style='width: 100%'>";
                        $counter = 0;
                        while($row = $result->fetch_assoc()) {
                            if ($counter == 0) {
                                $tableScript .= "<tr>";
                            }
                            $tableScript .= "<td>";
                            $tableScript .= "<img src='documents/pics/vorstandsImages/" . $row['bildURL'] . "' alt='" . $row['Vorname'] . " " . $row['Nachname'] . "' style='width: 10em; height: 10em;'>";
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
                ?>

            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>