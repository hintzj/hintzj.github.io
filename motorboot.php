<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Motorboot - WSVL</title>
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
                    <h2>Motorboot</h2>
                    <p>
                        Willkommen bei der Motorbootabteilung des Wassersportvereins Lampertheim
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Lage:</h4>
            <p>
                <ul>
                Die Einfahrt zu unserem wunderschönen Altrhein liegt bei dem Rheinkilometer 440 und die Steganlage
                selbst befindet sich bei der Markierung 3.9
                <br>
                </ul>
                <br>
                <img src="documents/pics/motorbootLage.jpg" alt="Lage des Motorbootstegs"
                    style="width: 97%; height: auto; margin-left: 1.5em;">
                
            </p>
        </div>
        <div class="text-field2">
            <h4>Liebe Gäste:</h4>
            <ul>
            Unsere Steganlage verfügt über 2 Gastplätze (max 13m Bootslänge), wenn möglich bitte vorher über
            Verfügbarkeit informieren. Legen Sie zunächst an einem freien Steg an, sofern Ihnen kein anderer zugewiesen
            wurde. Bitte melden Sie sich anschließend bei unserem Hafenmeister Herrn K. Roos (Tel.: 01605900164) an. Er
            unterstützt Sie in Ihren Anliegen so gut es möglich ist.

            Bitte beachten Sie unsere Hafenordnung. Wir weisen darauf hin, dass auch für Gastboote eine ausreichende
            Haftpflichtversicherung vorhanden sein muss. Wir freuen uns herzlich über Ihren Besuch und heißen Sie
            jederzeit willkommen.
            </ul>


            <h4>Strom, Wasser und Sanitär:</h4>
            <ul>
            Strom (CEE-Stecker 16A, 3 Polig) und Trinkwasser stehen an jedem Steg zur Verfügung.
            Dusche und WC stehen im Vereinshaus zur Verfügung.
            </ul>

            <h4>Gebühren:</h4>
            <ul>
            Wir sind Mitglied bei "Freundschaft auf dem Wasser", für Gäste die ebenfalls Mitglied bei "Freundschaft auf
            dem Wasser" sind, sind 3 Nächte frei, es fällt lediglich eine Pauschale von 3€ pro Nacht an.
            Alle anderen Gäste zahlen pro Nacht 2€ je angefangenen Meter Bootslänge inkl. Strom/Wasser/Müll.
            </ul>

            <h4>Verpflegung:</h4>
            <ul>
            Der nächste Bäcker, Metzger und Supermarkt sind ca. 10-15 min zu Fuß entfernt. Mehr Infos bei unserem
            Hafenmeister.
            </ul>
        </div>
        <?php
            $news = getAbteilungsNews(4); // 4 is the ID for Motorboot
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