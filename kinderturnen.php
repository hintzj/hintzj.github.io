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
    <?php include 'header.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);";>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.5); color: #fff; height: 100%;">
                <div>
            <h2>Kinderturnen am WSV</h2>
            <p>Hier findest du alle wichtigen Informationen zum Kinderturnen am WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Trainingszeiten Kleinkinder</h4>
            <p>
                <ul>
                    <li>Montag: 18:00 - 20:00 Uhr</li>
                </ul>
            </p>

            <h4>Trainingszeiten Kinder</h4>
            <p>
                <ul>
                    <li>Dienstag: 18:00 - 20:00 Uhr</li>
                    <li>Donnerstag: 18:00 - 20:00 Uhr</li>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>