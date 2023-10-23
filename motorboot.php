<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Mototrboot - WSVL</title>
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
            <h2>Motorboot</h2>
            <p>
                Hier findest du alle wichtigen Informationen für Motorboote am WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Motorboot - Informationen</h4>
            <p>
            <ul>Motorboote sind bei uns nur mit gültiger Bootsführerschein Klasse B zugelassen.</ul>
            <ul>Die Motorboote sind mit einem 4-Takt-Motor ausgestattet.</ul>
            <ul>Weitere Infos folgen.</ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Motorboot - Preise</h4>
            <p>
            <ul>Motorboote können für 10€ pro Stunde gemietet werden.</ul>
            <ul>Die Kaution beträgt 50€.</ul>
            </p>
        </div>
        <div class="text-field3">
            <h4>Motorboot - Anmeldung</h4>
            <p>
            <ul>Die Anmeldung erfolgt über das <a href="kontakt.php">Kontaktformular</a>.</ul>
            <ul>Die Anmeldung muss mindestens 24 Stunden vorher erfolgen.</ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>