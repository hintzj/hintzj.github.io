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
                    <h2>Kanurennsport am WSV</h2>
                    <p>Hier findest du alle wichtigen Informationen zu Kanurennsport am WSV Lampertheim!</p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Trainingszeiten der Schüler:</h4>
            <p>
            <ul>
                <li>Montag: 16:00 - 18:00 Uhr</li>
                <li>Mittwoch: 16:00 - 18:00 Uhr</li>
                <li>Freitag: 16:00 - 18:00 Uhr</li>
                <br>
                Ab der Altersklasse 'Jugend' werden die Trainingszeiten mit dem Sportler abgestimmt.
            </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Leistungssportkonzept</h4>

            <ul>
                <li>
                    <div class="article">
                        <h3>Ziele des Wassersportvereins:</h3>
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
                    </div>
                </li>
                <li>
                    <div class="article"> 
                        <h3>Grundlage:</h3>
                        <p>
                            Unsere Vereinsarbeit basiert auf der neuen Rahmentrainingskonzeption Kanurennsport des Deutschen Kanuverbandes von 2024.
                            Das WSV-Leistungssportkonzept setzt diese Konzepte so um, dass sie auch für "normale Vereine" ohne Sportinternat oder spezielle Sportschulen praktikabel sind.
                            Die größte Herausforderung besteht darin, die umfangreichen Trainingsanforderungen ab der Jugendklasse im Vereinsalltag umzusetzen.
                            Unser Konzept bietet dafür konkrete Lösungen und passt die Trainingsinhalte und -umfänge an die Möglichkeiten unseres Vereins an.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>Nachwuchsarbeit:</h3>
                        <p>
                            Immer mehr Eltern legen Wert darauf, dass ihre Kinder schon früh Bewegung und Spaß im Sport erleben. Genau hier setzt der WSV Lampertheim an: Wir möchten Kindern den Einstieg in den Sport ermöglichen, unabhängig davon, ob sie bereits schwimmen können oder nicht.
                            Deshalb bieten wir schon für Kinder ab drei Jahren spielerische Übungsstunden an, in denen sie sich austoben, neue Bewegungen entdecken und Freude am gemeinsamen Sport entwickeln. Viele dieser Kinder wechseln später in unsere Nichtschwimmergruppe oder direkt in die Paddelgruppe und bleiben dem Verein so langfristig verbunden.
                            Die Nachfrage ist groß: Unsere erste Kindergruppe war schnell ausgebucht, sodass wir eine zweite Gruppe eröffnet haben. Inzwischen nehmen rund 50 Kinder unter sechs Jahren regelmäßig an den Übungsstunden teil. Auch die Nichtschwimmergruppe mit etwa 20 Kindern wächst stetig weiter.
                            Unser Konzept zahlt sich aus: immer mehr Kinder finden den Weg in den Kanusport. Aktuell können wir bei Regatten bis zu 30 junge Sportlerinnen und Sportler der Altersklasse Schüler melden.
                            Der organisatorische Aufwand für eine wöchentliche Kinderstunde ist überschaubar, was es leichter macht, engagierte Übungsleiterinnen und Übungsleiter zu gewinnen. So schaffen wir gemeinsam die Grundlage dafür, dass schon die Kleinsten Spaß am Sport entwickeln und vielleicht die Kanutalente von morgen werden.
                        </p>
                    </div>
                </li>
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
                    $tiefeLA = ($response->value) - 15;
                    echo '<br>';
                    echo 'Daraus folgt ein ungefährer Wasserstand vor unserem Steg von circa ' . $tiefeLA . 'cm';
                ?>
            <br>
            <br>
            </ul>
            <img src="https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/WORMS/W/measurements.png?start=P14D&width=1200&height=400&enableSecondaryYAxis=true"
                alt="Wasserstand" style="width: 100%; padding-left: 1.5em;">
        </div>
        <?php
            $news = getAbteilungsNews(2);
            if (count($news) > 0) {
                echo '<div class="text-field4">';
                echo '<h4>News</h4>';
                foreach ($news as $item) {
                    echo "<ul>";
                    echo "<div class='article'>";
                    echo "<h4>" . $item['title'] . "</h4>";
                    echo "<p>" . $item['summary'] . "</p>";
                    echo "<input type='button' style='margin-left: 2em;' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $item['artikelID'] . "\"'>";
                    echo "</div>";
                    echo "</ul>";
                    echo "<br>";
                }
                echo '</div>';
            }
        ?>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>
