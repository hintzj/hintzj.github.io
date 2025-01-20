<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kindeswohl - WSVL</title>
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
            <h2>Kindeswohl am WSV</h2>
            <p>Kindeswohl ist für alle Beteiligten am WSV Lampertheim sehr wichtig. Daher haben wir hier einige wichtige
                Informationen für dich zusammengestellt.</p>
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Informationen Kindeswohl</h4>
            <p>
            <ul>
                Wir legen viel Wert auf das Wohl unserer Kinder. Daher haben wir einige Informationen für dich zusammengestellt.
            </ul>

            <!--<img src="documents/pics/kindeswohl.png" alt="Kindeswohl" style="border-radius: 15px; width: 100%">-->
            <br>
            <a href="documents/Kindeswohl-Verhaltenskodex.pdf" target="_blank" rel="noopener noreferrer">Hier</a>
            findest du den aktuellen Verhaltenskodex im Bezug auf Kindeswohl des Landessprtundes Hessen e.V.
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>