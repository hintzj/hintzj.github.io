<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <link rel='stylesheet' type='text/css' href='design/css/sponsors.css'>
    <title>Sponsoren - WSVL</title>
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
        <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);" ;>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
                    <h2>Sponsoren des WSV</h2>
                    <p>Hier findest du alle wichtigen Informationen zu Sponsoren des WSV Lampertheim! Wir bedanken uns
                        vielmals bei unseren Sponsoren für die Unterstützung!</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Sponsoren</h4>
            <?php
                try{
                    $conn = connect("public");
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }
                    $sqlLogos = "SELECT * FROM sponsors WHERE sponsorLogoFile IS NOT NULL ORDER BY sponsorName ASC";
                    $resultLogos = mysqli_query($conn, $sqlLogos);
                    $sponsorsLogos = mysqli_fetch_all($resultLogos, MYSQLI_ASSOC);
                    mysqli_free_result($resultLogos);

                    $sqlNoLogos = "SELECT * FROM sponsors WHERE sponsorLogoFile IS NULL";
                    $resultNoLogos = mysqli_query($conn, $sqlNoLogos);
                    $sponsorsNoLogos = mysqli_fetch_all($resultNoLogos, MYSQLI_ASSOC);
                    mysqli_free_result($resultNoLogos);

                    mysqli_close($conn);

                    //list all the sponsorLogos with a link to the sponsor page. display the sponsor names when hovering over the logo
                    echo "<div class='sponsor'>";
                    echo "<ul>";
                    foreach ($sponsorsLogos as $sponsor) {
                        
                        //echo "<li>";
                        echo "<a href='" . $sponsor['sponsorUrl'] . "' target='_blank' rel='noopener noreferrer'><img src='documents/pics/sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' loading='lazy' style='width: 50%;' alt='" . $sponsor['sponsorName'] . "'></a>";
                        //echo "</li>";
                    
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "<br><br>";

                    echo "<div class='without'>";
                    echo "Außerdem bedanken wir uns bei unseren kleineren Sponsoren:";
                    echo "<br>";
                    echo "<ul>";
                    //list all the sponsors without a logo
                    foreach ($sponsorsNoLogos as $sponsor) {
                        //echo "<div class='sponsor'>";
                        echo "<li>";
                        if ($sponsor['sponsorUrl'] == "") {
                            echo $sponsor['sponsorName'];
                        } else {
                            echo "<a href='" . $sponsor['sponsorUrl'] . "' target='_blank' rel='noopener noreferrer'>" . $sponsor['sponsorName'] . "</a>";
                        }

                        echo "<br>";
                        echo "</li>";
                        //echo "</div>";
                    }
                    echo "</ul>";
                    echo "</div>";
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo "Error: " . $error;
                    error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                }                
            ?>
        </div>

        <div class="text-field2">
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