<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Jugendnews - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting" style="background-image: url(pics/bg_Jgn.png);">
            <h2>Willkommen auf der Newsseite der WSV-Jugend</h2>
            <p>Hier infomieren wir über kommende und Vergangene Events
            </p>
        </div>
        <div class="text-field1">
            <h4>Upcoming Events</h4>
            <p style="font-family: CreteRoundItalic;">
                Hier steht noch nichts, Jonathan viel SPaß mit dem Backend
            </p>
        </div>
        <div class="text-field2" >
            <h4>Past Events</h4>
            <p style="font-family: CreteRoundItalic;">
                Hier steht auch noch nichts
                <br>
                <?php
                    $response = file_get_contents('https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/WORMS/W/measurements.json?start=P1D');
                    $response = json_decode($response);
                    $response = (end($response));
                    $tiefe = $response->value;
                    $zeit = $response->timestamp;
                    $zeit = date('H:i', strtotime($zeit));
                    $datum = $response->timestamp;
                    $datum = date('d.m.Y', strtotime($datum));
                    echo 'Aktueller Wasserstand in Worms: ' . $tiefe . 'cm um ' . $zeit . ' Uhr' . ' am ' . $datum;
                    $tiefeLA = ($response->value) - 75;
                    echo '<br>';
                    echo 'Daraus folgt ein ungefährer Wasserstand in Lampertheim von circa ' . $tiefeLA . 'cm';
                ?>
                <br>
                <br>
                <img src="https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/WORMS/W/measurements.png?start=P14D&width=900&height=400&enableSecondaryYAxis=true" alt="Wasserstand" style="width: 50%;">
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>