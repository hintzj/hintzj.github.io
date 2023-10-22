<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Kontakt - WSVL</title>
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
            <h2>Kontakt</h2>
            <p>
                Hier findest du alle wichtigen Kontaktdaten zum WSV Lampertheim!
            </p>
        </div>
        <div class="text-field1">
            <h4>Kontakt</h4>
            <p>
            <ul>Wassersportverein Lampertheim 1929 e.V.
                Adresse:<br>
                <ul>Wassersportverein Lampertheim 1929 e.V.
                    <br>Albrecht-Dürer-Str. 46
                    <br>68623 Lampertheim
                    <br>Tel.: 06206/12483
                </ul>
                <br>
                Vorsitzender: [*Insert Text Here*]
                <ul>Adresse: [*Insert Text Here*]</ul>
                <ul>Telefon: [*Insert Text Here*]</ul>
                <ul>E-Mail: [*Insert Text Here*]</ul>
                <br>
                Obmänner:
                <ul>Kanurennsport: [*Insert Text Here*]</ul>
                <ul>Kanu Freizeit: [*Insert Text Here*]</ul>
                <ul>Kanu Jugend: [*Insert Text Here*]</ul>
                <ul>Kanu Kinder: [*Insert Text Here*]</ul>
                <ul>Turnen: [*Insert Text Here*]</ul>
            </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Bankverbindung</h4>
            <p>
            <ul>Bank: Volksbank Darmstadt - Südhessen eG</ul>
            <ul>IBAN: DE54508900000002050102</ul>
            <ul>BIC: GENODEF1VBD</ul>
            </p>
        </div>
        <div class="text-field3">
            <h4>Kontaktformular</h4>
            <p>
                <form action="kontakt.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Dein Name"><br>
                    <label for="email">E-Mail:</label>
                    <input type="text" id="email" name="email" placeholder="Deine E-Mail"><br>
                    <label for="subject">Betreff:</label>
                    <input type="text" id="subject" name="subject" placeholder="Betreff"><br>
                    <label for="message">Nachricht:</label>
                    <textarea id="message" name="message" placeholder="Deine Nachricht" style="height:200px"></textarea><br>
                    <input type="submit" value="Absenden">
                </form>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>