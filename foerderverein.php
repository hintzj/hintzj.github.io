<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Förderverein - WSVL</title>
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
            <h2>Förderverein des WSV</h2>
            <p>Hier findest du alle wichtigen Informationen zum Förderverein des WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
        <h4>Förderverein</h4>
            <p>
                - Was 1 € so alles bewirken kann –
                <br>
                <br>
                Seit 2008 gibt es beim WSV einen Nachwuchsförderverein
                <br>
                Wir haben Veranstaltungen organisiert:
                <br>
            <ul>
                Flohmärkte, Vereinsfeste, MundartTheater, Meister von Morgen, Aktion Nikolausstiefel am Schillerplatz
                mit Glühwein und selbstgebackenen Plätzchen, Kuchenverkauf und und und …..
                <br>
                Durch die Erlöse aus diesen Aktivitäten, zusammen mit Spenden von Unternehmen und nicht zuletzt durch
                unsere Mitgliedsbeiträge konnte der Nachwuchs mit teilweise dringend benötigtem Material effektiv
                unterstützt werden durch:
                <ul>
                    Den Kauf von unzähligen Boote vom K 1 bis zum K 4
                    <br>
                    Den Kauf eines Pavillons für Regatten
                    <br>
                    Zuschüsse für den Vereinsbus und das Motorboot für die Trainer
                    <br>
                    Zuschüsse für den Ankaufg von Paddelergometern
                    <br>
                    Und natürlich beträchtliche Zuschüsse für die jährlichen Trainingslager
                    Um die Sportler weiter so fördern zu können brauchen wir Unterstützung
                </ul>
                <br>
                Helft mit – bringt Euch und Eure Ideen ein – werdet Mitglied
                <br>
                Der Beitrag ist erschwinglich: 1 € / Monat
            </ul>
            <br>
            Ansprechpartner:
            <ul>
                1. Vorsitzende: <a href="mailto:Mechthild.Kiebel@kcs-beratung.de">Mechthild Kiebel</a>
                <br>
                2. Vorsitzende: Hiltrud Lutes
            </ul>
            Bankverbindung:
            <ul>
                VR Bank Ried-Überwald eG
                <br>
                IBAN DE71 5096 1206 0000 4390 10
                <br>
                BIC GENODE51RBU
                <br>
                Vereinsregister Darmstadt, Registerblatt VR 82365
            </ul>
            <br>
            <a href="documents/Foerderverein_2023.pdf" target="_blank" rel="noopener noreferrer">Den Aufnahmeantrag gibt
                es hier zum Download</a>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>