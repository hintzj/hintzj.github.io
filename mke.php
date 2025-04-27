<?php
    require_once 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Mobile Kanueinheit - WSVL</title>
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
            <h2>Mobile Kanueinheit am WSV</h2>
            <p>Die Mobile Kanueinheit ist eine Initiative des Hessischen Kultusministeriums in Zusammenarbeit mit dem Hessischen Kanu-Verband e.V.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Informationen zur Mobilen Kanueinheit</h4>
            <p>
                <ul>
                    Mit der Finanzierung von Mobilen Kanueinheiten (MKE) hat der Hessische Kultusminister die Voraussetzung geschaffen, dass alle Schulen in Hessen Zugang zu einem regionalen Bootspool haben. Die sechs hessischen Mobilen Kanueinheiten und 2 Kanupolo-Einheiten sind ausgewählten Vereinen zur Verwaltung anvertraut worden. Eine mobile Kanueinheit und eine Kanupoloeinheit befindet sich in der Obhut des WSV-Lampertheim.
                </ul>
                <ul>
                    Ausgeliehen werden können Zweier/Dreiercanadier max. 8 Stück und/oder Kajaks (17 Einer und 6 Zweier) max. 35 Bootsplätze und 16 Kanupolo Boote mit sämtlichem Zubehör (Paddel, Spritzdecken, Schwimmwesten etc.) sowie ein Transportanhänger. Achtung: Der Hänger ist ohne Boote 3,35 m hoch.
                </ul>
                <ul>
                    <li>Das Nutzungsentgelt beträgt für Schulen: 3,–€ pro Tag und Bootsplatz, zusätzlich 2,–€ bei Benutzung des Vereinsgeländes, plus 5,-€ bei Übernachtung.</li>
                    <li>Das Nutzungsentgelt beträgt für Vereine: 5,–€ pro Tag und Bootsplatz, zusätzlich 2,–€ bei Benutzung des Vereinsgeländes, plus 5,-€ bei Übernachtung.</li>
                    <li>Hänger: 1 Tag 25 €, jeder weiterer Tag 5 €.</li>
                </ul>

                
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>