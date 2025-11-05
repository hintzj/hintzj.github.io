<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kultur - WSVL</title>
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
            <h2>Kultur</h2>
            <p>
                Der Kulturerhalt wird am WSV Lampertheim hoch geschätzt. Deshalb gibt es auch eine eigene Abteilung, die sich um die Kultur kümmert.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Kultur</h4>
            <ul>
            <p>
                Der Kulturausschuss des WSV Lampertheim besteht aus engagierten Mitgliedern, die sich leidenschaftlich für die Organisation und Durchführung der Vereinsveranstaltungen einsetzen.
            </p>
            <ul>
            <li>Nico Stenger (Kulturwart)</li>
            <li>Patricia Altamore</li>
            <li>Erika Gabler</li>
            <li>Andreas Herrmann</li>
            <li>Mattheo Herrmann</li>
            <li>Petra Herrmann</li>
            <li>Peter Horstfeld</li>
            </ul>
            <p>
                Der Kulturausschuss hält das Vereinsleben lebendig - mit pragmischem Einsatz für gut organisierte Veranstaltungen.
            </p>
            </ul>
        </div>

        <div class="text-field2">
            <h4>Unsere Aktivitäten</h4>
            <ul>
                <li>Planung und Umsetzung ausgewählter Vereinsfeste</li>
                <li>Unterstützung bei der jährlichen Durchführung von Kulturprojekten</li>

            <p>
                Schwerpunkt: unkomplizierte Organisation, gute Stimmung und gemeinschaftliches Miteinander.
            </p>
            </ul>
        </div>
        <?php
            $news = getAbteilungsNews(7);
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

            printOutDatesOfAbteilung(7);
        ?>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>