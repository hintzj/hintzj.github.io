<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kinderturnen - WSVL</title>
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
            <h2>Kinderturnen am WSV</h2>
            <p>Hier findest du alle wichtigen Informationen zum Kinderturnen am WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Bewegung, Spiel und Spaß</h4>
            <ul>
                <p>
                    Bewegung, Spiel und Spaß – beim Wassersportverein Lampertheim kommen schon die Kleinsten ganz groß raus! Neben dem Kanurennsport bieten wir ein buntes Kinderturnprogramm an, bei dem Kinder spielerisch die Freude an Bewegung entdecken und gleichzeitig die ersten Kontakte zum Wassersport knüpfen können.
                </p>
            </ul>

            <h4>Unsere Trainingszeiten:</h4>
            <ul>
                <p>
                    <ul>
                        <li>Mittwoch, 16:30 – 17:30 Uhr: 2–4 Jahre</li>
                        <li>Donnerstag, 17:00 – 18:00 Uhr: 3–7 Jahre</li>
                    </ul>
                </p>

                <p>
                    In unseren Turnstunden steht der Spaß im Vordergrund: Klettern, Balancieren, Springen und erste kleine Spiele helfen dabei, die motorischen Fähigkeiten der Kinder zu fördern. Abwechslungsreiche Bewegungsangebote und kreative Herausforderungen machen jede Stunde zu einem neuen Abenteuer!
                </p>
            </ul>
        </div>
        <div class="text-field2">
            <h4>Bei uns ist jedes Kind willkommen!</h4>
            <ul>
                <p>
                    Egal ob mit oder ohne Vorerfahrung, ob mit oder ohne Einschränkungen – beim Kinderturnen können alle Kinder dabei sein, sich ausprobieren und wachsen. Unser Ziel ist es, Bewegungsfreude zu wecken, Selbstvertrauen zu stärken und Gemeinschaft erlebbar zu machen.
                    <br>
                    Kommt vorbei und erlebt, wie viel Spaß Bewegung machen kann – wir freuen uns auf euch!  
                </p>
            </ul>
            
        </div>
        <?php
            $news = getAbteilungsNews(5);
            if (count($news) > 0) {
                echo '<div class="text-field3">';
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