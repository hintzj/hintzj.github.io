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
    <?php include 'header.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>)";>
            <h2>Kultur</h2>
            <p>
                Der Kulturerhalt wird am WSV Lampertheim hoch geschätzt. Deshalb gibt es auch eine eigene Abteilung, die sich um die Kultur kümmert.
            </p>
        </div>
        <div class="text-field1">
            <h4>Kultur</h4>
            <p>
                <ul>
                    <li>Die Kulturabteilung kümmert sich um die Kultur des Vereins</li>
                    <li>Die Kulturabteilung kümmert sich um die Kultur des Vereins</li>
                    <li>Die Kulturabteilung kümmert sich um die Kultur des Vereins</li>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>