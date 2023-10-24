<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kanurennsport - WSVL</title>
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
        <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);" ;>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
                    <h2>Kanurennsport am WSV</h2>
                    <p>Hier findest du alle wichtigen Informationen zu Kanurennsport am WSV Lampertheim!</p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Trainingszeiten</h4>
            <p>
            <ul>
                <li>Montag: 18:00 - 20:00 Uhr</li>
                <li>Mittwoch: 18:00 - 20:00 Uhr</li>
                <li>Freitag: 18:00 - 20:00 Uhr</li>
            </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Leistungssportkonzept</h4>
            <h3>Ziele des Wassersportvereins:</h3>
            <ul>
            <p>
                Der WSV möchte über seine eigene Jugendarbeit Sportler an die Weltspitze bringen. Der dazu erforderliche
                Leistungsaufbau im Kanurennsport vom Anfänger bis zum Spitzenathleten erfordert ein langjähriges,
                zielorientiertes Training. Dabei kommt es darauf an, in Trainigsstufen die vorgegebenen Trainingsinhalte
                und Trainingsumfänge einzuhalten. Im Nachwuchsbereich sollten jährliche Meistertitel, in einem
                langfristig angelegten Trainingaufbau, nur zweitrangig sein. Treten durch eine Nichteinhaltung der
                aufeinander abgestimmten Ausbildungsziele Defizite ein, sind diese im weiteren Verlauf des
                Trainigsprozesses nur schwer zu kompensieren. Deshalb sollten wir unser Leistungskonzept in der
                Trainingsarbeit auch umsetzen. Das höchste Gut unserer Sportler ist die Gesundheit, die haben wir trotz
                unseren hohen sportlichen Ziele zu bewahren.
            </p>
            </ul>
            <h3>Grundlage:</h3>
            <ul>
            <p>
                Als Grundlage unseres Vereinskonzeptes diente die Rahmentrainingskonzeption Kanurennsport des Deutschen
                Kanuverbandes vom Oktober 1997. Das WSV Leistunssportkonzept macht diese Rahmenkonzeption des DKV in
                Trainingsinhalte und Trainingsumfänge für "normale Vereine" umsetzbar. Unter "normalen Vereinen"
                verstehen wir Vereine ohne Sportinternat oder eine Anbindung an eine sportbetonte Schule. Das
                Hauptproblem, das es dabei zu meistern galt, war Möglichkeiten zu finden, die großen Trainingsumfänge ab
                der Jugendklasse in einem Verein umsetzen zu können.
            </p>
            </ul>
            <h3>Nachwuchsrekrutierung:</h3>
            <ul>
            <p>
                Eltern bringen in der heutigen Zeit, ihre Kinder immer früher in die Sportvereine. Wenn Kanuvereine
                Kinder erst in ihre Trainingsgruppen aufnehmen, wenn diese schwimmen können, bekommen sie dadurch meist
                nur noch Quereinsteiger. Deshalb sollten Kanuvereine auch Nichtschwimmern die Möglichkeit geben, Sport
                zu treiben. Der WSV beginnt, Kindern ab 3 Jahre Übungsstunden anzubieten. Viele dieser Kinder gehen mit
                6Jahren in unsere Nichtschwimmergruppe oder gleich in unsere Paddelgruppe. In ganz kurzer Zeit ist
                unsere erste Kindergruppe überfüllt gewesen und wir haben eine zweite Kindergruppe angeboten. Zur Zeit
                haben wir 50 Kinder unter 6 Jahren in den Übungsstunden. Unsere Nichtschwimmergruppe hat 20 Kinder
                Tendenz steigend und auch im Schüler B Bereich trägt unser Konzept Früchte, Im Jahr 1998 konnten wir 25
                Schüler B auf den Regatten melden. Der Zeitaufwand, einmal die Woche eine Übungsstunde mit 3-6 jährigen
                abzuhalten, ist relativ gering. Es ist also leichter für die Vereine, für eine Kindergruppe einen
                Übungsleiter zufinden, als eine Kanurennsporttrainer.
            </p>
            </ul>
        </div>
        <div class="text-field3">
            <h4>Wasserstand</h4>
            <ul>
            <?php
                    try{
                        $response = file_get_contents('https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/WORMS/W/measurements.json?start=P1D');
                    } catch (Exception $e) {
                        echo $e;
                    }

                    $response = json_decode($response);
                    $response = (end($response));
                    $tiefe = $response->value;
                    $zeit = $response->timestamp;
                    $zeit = date('H:i', strtotime($zeit));
                    $datum = $response->timestamp;
                    $datum = date('d.m.Y', strtotime($datum));
                    echo 'Aktueller Wasserstand in Worms: ' . $tiefe . 'cm um ' . $zeit . ' Uhr' . ' am ' . $datum;
                    $tiefeLA = ($response->value) - 20;
                    echo '<br>';
                    echo 'Daraus folgt ein ungefährer Wasserstand in Lampertheim von circa ' . $tiefeLA . 'cm';
                ?>
            <br>
            <br>
            </ul>
            <img src="https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/WORMS/W/measurements.png?start=P14D&width=1200&height=400&enableSecondaryYAxis=true"
                alt="Wasserstand" style="width: 100%; ">
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>