<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kanupolo - WSVL</title>
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
            <h2>Kanupolo am WSV</h2>
            <p>Hier findest du alle wichtigen Informationen zu Kanupolo am WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Kanupolo am WSV</h4>
            <p>
            <ul>
                <li>Kanupolo ist eine spannende Mischung aus Kajakfahren und Ballsport.</li>
                <li>Unser Training (Dienstags 18.00 - 20.00 Uhr) ist perfekt für Anfänger und Fortgeschrittene.</li>
                <li>Wir nehmen regelmäßig an regionalen und nationalen Turnieren teil.</li>
            </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Warum Kanupolo?</h4>
            <p>
            <ul>
                Kanupolo am WSV Lampertheim bietet dir die Möglichkeit, Teil einer engagierten und freundlichen Gemeinschaft zu werden. 
                Egal, ob du den Sport neu entdecken möchtest oder bereits Erfahrung hast – bei uns bist du willkommen!
                <br>
                Komm vorbei und erlebe die Faszination Kanupolo hautnah!
            </ul>
            </p>
        </div>
        <?php
            $news = getAbteilungsNews(8);
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

            $termine = getAbteilungsTermine(8);
            if (count($termine) > 0) {
                echo '<div class="text-field4">';
                echo '<h4>Demnächst in der Abteilung Kanupolo</h4>';
                echo '<ul>';
                foreach ($termine as $termin) {
                    $date = $termin['terminDate'];
                    $date = date("d.m.Y", strtotime($date));
                    if ($termin['terminTime'] != null) {
                        echo "<li>" . $date . " ab " . substr($termin['terminTime'], 0, strpos($termin['terminTime'], ":00")) . " Uhr" . " - " . $termin['terminTitle'] . "</li>";
                    } else {
                        echo "<li>" . $date . " - " . $termin['terminTitle'] . "</li>";
                    }
                }
                echo '</ul>';
                echo '</div>';
            }
        ?>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>