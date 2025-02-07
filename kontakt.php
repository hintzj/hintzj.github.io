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
            <h2>Kontakt</h2>
            <p>
                Hier findest du alle wichtigen Kontaktdaten zum WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Kontakt</h4>
            <p>
                <ul>Wassersportverein Lampertheim 1929 e.V.
                    <br>
                    Adresse:<br>
                    <ul>Wassersportverein Lampertheim 1929 e.V.
                        <br>Albrecht-Dürer-Str. 46
                        <br>68623 Lampertheim
                        <br>Tel.: 06206/12483
                    </ul>
                    <br>
                    Vorsitzender: Rainer Vetter
                    <ul>Telefon: <a href="tel:+490620612483">06206/12483</a></ul>
                    <ul>E-Mail: <a href="mailto:kanupolo@wsv-lampertheim.de">kanupolo@wsv-lampertheim.de</a></ul>
                    <br>
                </ul>
            </p>
        </div>
        <div class="text-field2" id="abteilungsleiter">
        <table style="margin-left:auto; margin-right:auto;">
            <h4>Abteilungsleiter</h4>
                    <tr>
                        <th>Abteilung</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                    </tr>
                    <tr>
                        <td>Kanurennsport</td>
                        <td>Dieter Brechenser</td>
                        <td><a href="mailto:kanurennsport@wsv-lampertheim.de">kanurennsport@wsv-lampertheim.de</a></td>
                    </tr>
                    <tr>
                        <td>Kanurennsport-Anfänger</td>
                        <td>Patricia Herrmann</td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Kanupolo</td>
                        <td>Rainer Vetter</td>
                        <td><a href="mailto:kanupolo@wsv-lampertheim.de">kanupolo@wsv-lampertheim.de</a></td>
                    </tr>
                    <tr>
                        <td>Frauen-Gymnastik</td>
                        <td>Christa Müller</td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Kinderturnen</td>
                        <td>Patricia Herrmann</td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Bodyforming</td>
                        <td>Angela Samson</td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Männergymnastik</td>
                        <td>Gunter Saeger</td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Carnevals-Gremium Blau-Weiss</td>
                        <td>Christa Müller</td>
                        <td><a href="mailto:carnevals-gremium-blau-weiss@wsv-lampertheim.de">carnevals-gremium-blau-weiss@wsv-lampertheim.de</a></td>
                    </tr>
                    <tr>
                        <td>Nutzung Campingplatz</td>
                        <td>Bernd Volk</td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Vereinsjugend</td>
                        <td>Matteo Lunkenbein</td>
                        <td><a href="mailto:matteo.lunkenbein@icloud.com">matteo.lunkenbein@icloud.com</a></td>
                    </tr>
                </table>
        </div>
        <div class="text-field3">
            <h4>Bankverbindung</h4>
            <p>
            <ul>Bank: Volksbank Darmstadt - Südhessen eG</ul>
            <ul>IBAN: DE54508900000002050102</ul>
            <ul>BIC: GENODEF1VBD</ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>