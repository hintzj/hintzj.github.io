<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Links - WSVL</title>
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
            <h2>Nützliche Links</h2>
            <p>
                Hier findest du alle wichtigen Links zu Sportvereinen, Sportverbänden und anderen Organisationen!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Verbände</h4>
            <p>
                <ul>
                    <li><a href="https://www.kanu.de/" target="_blank">Deutscher Kanu-Verband</a></li>
                    <li><a href="https://www.landessportbund-hessen.de/" target="_blank">Landessportbund Hessen</a></li>
                    <li><a href="https://www.kanu-hessen.de/" target="_blank">Hessischer Kanu-Verband</a></li>
                </ul>
            </p>

            <br>

            <h4>Soziale Medien</h4>
            <p>
                <ul>
                    <li><a href="https://www.instagram.com/wsv_lampertheim_1929/" target="_blank">Instagram</a></li>
                    <li><a href="https://www.facebook.com/wsvla/?locale=de_DE" target="_blank">Facebook</a></li>
                    <li><a href="https://www.instagram.com/wsvlampertheim.jugend/" target="_blank">Instagram Jugendgruppe</a></li>
                </ul>
            </p>

            <br>

            <h4>Online-Shops</h4>
            <p>
                <ul>
                    <li><a href="https://sportinn.eu/WSV-Lampertheim" target="_blank">Sportinn</a></li>
                </ul>
            </p>

            <br>

            <h4>Rhein Pegel</h4>
            <p>
                <ul>
                    <li><a href="https://www.elwis.de/DE/dynamisch/Wasserstaende/Pegeleinzeln:WORMS" target="_blank">Pegel Lampertheim</a> 	(Kritischer Wert für den WSV: ca. 6,40 m)</li>
                </ul>
            </p>

            <br>

            <h4>Wetter</h4>
            <p>
                <ul>
                    <li><a href="https://uwapp.iotxs.de/dash02.php?devEUI=38bb2bb32d9d744d" target="_blank">Wetterstation am WSV</a></li>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>