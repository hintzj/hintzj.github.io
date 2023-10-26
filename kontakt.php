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
        <table>
            <h4>Abteilungsleiter</h4>
                    <tr>
                        <th>Abteilung</th>
                        <th>Name</th>
                        <th>Telefon</th>
                        <th>E-Mail</th>
                    </tr>
                    <tr>
                        <td>Kanurennsport</td>
                        <td>Dieter Brechenser</td>
                        <td><a href="tel:+490620655986">06206/55986</a></td>
                        <td><a href="mailto:kanurennsport@wsv-lampertheim.de">kanurennsport@wsv-lampertheim.de</a></td>
                    </tr>
                    <tr>
                        <td>Kanurennsport-Anfänger</td>
                        <td>Patricia Herrmann</td>
                        <td><a href="tel:+49017673059461">0176/73059461</a></td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Kanupolo</td>
                        <td>Rainer Vetter</td>
                        <td><a href="tel:+490620612483">06206/12483</a></td>
                        <td><a href="mailto:kanupolo@wsv-lampertheim.de">kanupolo@wsv-lampertheim.de</a></td>
                    </tr>
                    <tr>
                        <td>Frauen-Gymnastik</td>
                        <td>Christa Müller</td>
                        <td><a href="tel:+490620656252">06206/56252</a></td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Kinderturnen</td>
                        <td>Patricia Herrmann</td>
                        <td><a href="tel:+49017673059461">0176/73059461</a></td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Bodyforming</td>
                        <td>Angela Samson</td>
                        <td><a href="tel:+49062065804406">06206/5804406</a></td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Männergymnastik</td>
                        <td>Gunter Saeger</td>
                        <td><a href="tel:+490620651464">06206/51464</a></td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Carnevals-Gremium Blau-Weiss</td>
                        <td>Christa Müller</td>
                        <td><a href="tel:+490620656252">06206/56252</a></td>
                        <td><a href="mailto:carnevals-gremium-blau-weiss@wsv-lampertheim.de">carnevals-gremium-blau-weiss@wsv-lampertheim.de</a></td>
                    </tr>
                    <tr>
                        <td>Nutzung Campingplatz</td>
                        <td>Bernd Volk</td>
                        <td><a href="tel:+49017696543186">0176/96543186</a></td>
                        <td><a href="mailto:"></a></td>
                    </tr>
                    <tr>
                        <td>Vereinsjugend</td>
                        <td>Matteo Lunkenbein</td>
                        <td><a href="tel:+491791362771">0179/1362771</a></td>
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
        <div class="text-field4">
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