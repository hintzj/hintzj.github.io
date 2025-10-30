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
                    </ul>
                    <br>
                    Vorsitzender: Rainer Vetter
                    <ul>Telefon: <a href="tel:+490620612483">06206/12483</a></ul>
                    <ul>E-Mail: <a href="mailto:kanupolo@wsv-lampertheim.de">kanupolo@wsv-lampertheim.de</a></ul>
                </ul>
            </p>
        </div>
        <div class="text-field2" id="abteilungsleiter">
            <table style="margin-left:auto; margin-right:auto; width: 100%;">
                <h4>Abteilungsleiter</h4>
                    <tr>
                        <th>Abteilung</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                    </tr>
                    <?php
                        $contactPersons = getAllAnsprechpartner();
                        foreach ($contactPersons as $person) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($person['abteilungName']) . "</td>";
                            echo "<td>" . htmlspecialchars($person['Vorname']) . " " . htmlspecialchars($person['Nachname']). "</td>";
                            echo "<td><a href='mailto:" . htmlspecialchars($person['email']) . "'>" . htmlspecialchars($person['email']) . "</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </table>
        </div>
        <div class="text-field3">
            <h4>Mitgliedschaft</h4>
            <p>
                <ul>
                    Hier findest du alle wichtigen Dokumente zur Mitgliedschaft im WSV Lampertheim:
                </ul>
            </p>
            <p>
                <ul>
                    <li><a href="documents/aufnahmeantrag.pdf" target="_blank">Aufnahmeantrag</a></li>
                    <li><a href="documents/vereinssatzung.pdf" target="_blank">Vereinssatzung</a></li>
                    <li><a href="documents/datenschutz.pdf" target="_blank">Datenschutzordnung</a></li>
                    <li><a href="documents/zustimmungserklaerung.pdf" target="_blank">Zustimmungserklärung</a></li>
                </ul>
            </p>
            <p>
                <ul>
                    <?php
                        $person = getMitgliederverwaltungPerson();
                        if ($person) {
                            echo "Bei Fragen zur Mitgliedschaft kannst du dich gerne an <a href='mailto:" . htmlspecialchars($person['email']) . "'>" . htmlspecialchars($person['Vorname']) . " " . htmlspecialchars($person['Nachname']) . "</a> wenden.";
                        } else {
                            echo "Bei Fragen zur Mitgliedschaft kannst du dich gerne an den Vorstand wenden.";
                        }
                    ?>
                </ul>
        </div>
        <div class="text-field4">
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