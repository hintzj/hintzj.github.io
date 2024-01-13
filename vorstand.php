<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <link rel='stylesheet' type='text/css' href='vs.css'>
    <title>Vorstand - WSVL</title>
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);background-color: rgba(255, 255, 255, 0.75); height: 100%;";>
                <h2>Vorstand</h2>
                <p>
                    Als Interessenvertretung unsere Mitglieder leitet
                    <br> der Vorstand die Angelegenheiten des Vereins
                    <br> Er wird jedes Jahr auf unsere Mitgliederhauptversammlung gewählt
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
                        $sql = "SELECT vorstand.personID, vorstand.vorname, vorstand.nachname, vorstand.email, vorstand.position, vorstand.bildURL, vorstandspositionen.positionName FROM vorstand INNER JOIN vorstandspositionen ON vorstand.position = vorstandspositionen.positionsID ORDER BY vorstandspositionen.positionsID";
                        $result = $conn->query($sql);
                        $tableScript = "<table style='width: 100%'>";
                        $counter = 0;
                        while($row = $result->fetch_assoc()) {
                            if ($counter == 0) {
                                $tableScript .= "<tr>";
                            }
                            $tableScript .= "<td>";
                            $tableScript .= "<img src='documents/pics/vorstandsImages/" . $row['bildURL'] . "' alt='" . $row['vorname'] . " " . $row['nachname'] . "' style='width: 10em; height: 10em;'>";
                            $tableScript .= "<br>";
                            $tableScript .= "<a href='mailto:" . $row['email'] . "'>";
                            $tableScript .= $row['vorname'] . " " . $row['nachname'];
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