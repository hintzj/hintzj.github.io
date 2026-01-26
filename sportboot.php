<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Sportboot - WSVL</title>
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
                    <h2>Sportboot</h2>
                    <p>
                        Willkommen bei der Sportbootabteilung des Wassersportvereins Lampertheim
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h3>Über uns</h3>
            <ul>
                Die Sportbootabteilung des WSVL bietet eine Vielzahl von Aktivitäten und Veranstaltungen für
                Wassersportbegeisterte jeden Alters. Unser Ziel ist es, eine freundliche und einladende
                Gemeinschaft zu schaffen, in der sich alle Mitglieder wohlfühlen und ihre Leidenschaft für den
                Wassersport teilen können.
            </p>
            </ul>
        </div>
        <?php
            $news = getAbteilungsNews(17); // 17 is the ID for Sportboot
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

            printOutDatesOfAbteilung(17);
        ?>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>