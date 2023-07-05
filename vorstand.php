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
        <div class="greeting" style="background-image: url(pics/Bg-Canadier.png);">
            <h2>Vorstand</h2>
            <p>
                Als Interessenvertretung unsere Mitglieder leitet
                <br> der Vorstand die Angelegenheiten des Vereins
                <br> Er wird jedes Jahr auf unsere Mitgliederhauptversammlung gewählt
            </p>
        </div>
        <div class="text-field1">
            <h4>Amtsinhaber</h4>
            <p>
            <ul>
                <li>1. Vorsitzender: Rainer Vetter</li>
                <li>2. Vorsitzende: Erika Gabler</li>
                <li>Kassenwärtin: Briska Horstfeld</li>
                <li>Schriftführerin: Erika Fuchs</li>
                <li>Mitgliederverwaltung: Justine Sand-Soballa</li>
                <li>Sportwart: Dieter Brechenser</li>
                <li>Beisitzer:inneen:
                    <ul>
                        <li>Andras Leppich</li>
                        <li>Stefan Sand</li>
                        <li>Jonathan Hintz</li>
                        <li>Michael Vetter</li>
                        <li>Erik Messirek</li>
                        <li>Lukas Heilmann</li>
                    </ul>
                </li>
            </ul>
            </p>
            <p>
                <?php
                    $conn = connect("private");
                    $sql = "SELECT vorname, nachname FROM mitglieder WHERE mitgliedID = (SELECT mitgliedID FROM specialusers WHERE specialPositionID = 1)";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "Webmaster: " . $row['vorname'] . " " . $row['nachname'];
                ?>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>