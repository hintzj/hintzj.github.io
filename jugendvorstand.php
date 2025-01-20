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
            <h4>Jugendvorstand</h4>
            <p >
                Seit dem 01.02.23 sind folgende im Amt:
            <ul>
                <li>Vorsitzender: Matteo Lunkenbein</li>
                <li>2. Vorsitzender: Alessandro Paterna</li>
                <li>Kassenwart: Jonathan Hintz</li>
                <li>Beisitzer: <ul>
                        <li>Femke Rupf</li>
                        <li>Tim Walther</li>
                        <li>Paul Gutschalk</li>
                        <li>Franka Wernz</li>
                        <li>Leonard Persson</li>
                    </ul>
                </li>
            </ul>
            </p>

            <p>
                <a href="documents/Jugendordnung.pdf" target="_blank" rel="noopener noreferrer">Hier</a> findest du die aktuelle Satzung des Jugendvorstandes
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>