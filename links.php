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
    <?php include 'header.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>)";>
            <h2>Nützliche Links</h2>
            <p>
                Hier findest du alle wichtigen Links zu Sportvereinen, Sportverbänden und anderen Organisationen!
            </p>
        </div>
        <div class="text-field1">
            <h4>Links</h4>
            <p>
                <ul>
                    <li>ALLE LINKS NUR ALS BEISPIEL</li>
                    <li><a href="https://www.wsv-lampertheim.de/">WSV Lampertheim</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/turnen/">Turnen</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/kanurennsport/">Kanurennsport</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/fitnesssport/">Fitnesssport</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/kinderturnen/">Kinderturnen</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/links/">Links</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/impressum/">Impressum</a></li>
                    <li><a href="https://www.wsv-lampertheim.de/datenschutz/">Datenschutz</a></li>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>