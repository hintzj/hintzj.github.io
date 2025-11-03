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
                    Der Kulturausschuss plant und organisiert alles im Bereich Kultur. Dabei werden sowohl traditionelle als auch moderne Ansätze berücksichtigt, um ein breites Spektrum an kulturellen Aktivitäten anzubieten. Derzeit gehören dem Kulturausschuss an:
                    <ul>
                        <li>Peter Weber</li>
                        <li>Peter Horstfeld</li>
                        <li>Susanne Asel</li>
                        <li>Carmen Geppert</li>
                        <li>Volker Altenbach</li>
                        <li>Sven Stollhofer</li>
                        <li>Klaus Heiler</li>
                        <li>Jan Heilmann (Jugendgruppe)</li>
                        <li>Tina Heiler</li>
                    </ul>
                    Gemeinsam arbeiten sie daran, kulturelle Veranstaltungen und Projekte zu realisieren, die sowohl die Vereinsmitglieder als auch die lokale Gemeinschaft ansprechen.
                </p>
            </ul>
        </div>

        <div class="text-field2">
            <h4>Unsere Aktivitäten</h4>
            <ul>
                <p>
                    Der Kulturausschuss organisiert regelmäßig verschiedene Veranstaltungen und Projekte, um die Vereinsmitglieder und die lokale Gemeinschaft einzubinden. Dazu gehören:
                    <ul>
                        <li>Jährliche Feste und Feiern, die Tradition und Moderne verbinden</li>
                        <li>Unterstützung bei der Durchführung von lokalen Kulturprojekten</li>
                    </ul>
                    <br>
                    Diese Aktivitäten bieten eine Plattform für Austausch, Kreativität und Gemeinschaftsgefühl.
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

            $termine = getAbteilungsTermine(7);
            if (count($termine) > 0) {
                echo '<div class="text-field4">';
                echo '<h4>Demnächst in der Abteilung Kultur</h4>';
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