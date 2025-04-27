<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kindeswohl - WSVL</title>
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
            <h2>Kindeswohl am WSV</h2>
            <p>Kindeswohl ist für alle Beteiligten am WSV Lampertheim sehr wichtig. Daher haben wir hier einige wichtige
                Informationen für dich zusammengestellt.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Informationen Kindeswohl</h4>
            <p>
                Das Wohl unserer Kinder liegt uns besonders am Herzen. Um sicherzustellen, dass alle Beteiligten gut informiert sind, haben wir die wichtigsten Informationen für dich zusammengestellt:
            </p>
            <ul>
                <li>Der Schutz und die Förderung von Kindern stehen bei uns an erster Stelle.</li>
                <li>Wir setzen uns aktiv für ein sicheres und unterstützendes Umfeld ein.</li>
                <li>Alle Mitglieder und Trainer verpflichten sich, den Verhaltenskodex einzuhalten.</li>
                <li>Regelmäßige Schulungen und Workshops zum Thema Kindeswohl werden angeboten.</li>
            </ul>
            <p>
                Weitere Details und Richtlinien findest du in unserem offiziellen Verhaltenskodex. 
                <a href="documents/Kindeswohl-Verhaltenskodex.pdf" target="_blank" rel="noopener noreferrer">Hier</a> 
                kannst du den aktuellen Verhaltenskodex des Landessportbundes Hessen e.V. einsehen.
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>