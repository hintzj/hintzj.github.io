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
            <p>
                <ul>
                Der Kulturausschuß plant und organisiert alles im Bereich Kultur. Derzeit gehören dem Kulturausschuß an:<br>
                Peter Weber, Peter Horstfeld, Susanne Asel, Carmen Geppert, Volker Altenbach, Sven Stollhofer, Klaus Heiler, Jan Heilmann(Jugendgruppe), Tina Heiler
                </ul>
            </p>
            <button onclick="window.location.href='kontakt.php#abteilungsleiter';">Interesse? Hier geht's zum Kontakt!</button>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>