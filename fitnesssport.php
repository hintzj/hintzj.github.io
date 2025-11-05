<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Fitnesssport - WSVL</title>
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
        <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);" ;>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
                    <h2>Fitnesssport am WSV</h2>
                    <p>Hier findest du alle wichtigen Informationen zu Fitnesssport am WSV Lampertheim!
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Abseits vom Leistungssport</h4>
            <ul>
                <p>
                    Auch für nicht Leistungssportler gibt es zahlreiche Angebote.

                    Dienstags kann man z.B. zum Kraftausdauer-Training kommen, am Mittwoch zum Rücken-Fitness-Kurs,
                    Donnerstags zum Bodyforming und Freitags zur AH-Gymnastik. Am Wochenende darf man sich ausruhen oder
                    mit
                    dem Boot eine Runde auf dem Altrhein drehen.

                    Einfach das passende Angebot aussuchen und mitmachen.
                </p>
            </ul>
        </div>
        <div class="text-field2">
            <h4>Unsere Angebote</h4>
            <ul>
                <li>
                    <div class="article"> 
                        <h3>Bodyforming</h3>
                        <p>
                            Seit über 15 Jahren besteht im Bereich Fitness das Kursangebot Aerobic/Bodyforming. Der Kurs richtet
                            sich an alle Frauen, die etwas für bzw. gegen ihre Problemzonen machen wollen, oder einfach nur Spaß
                            an der Bewegung mit Musik haben. Der Stundenschwerpunkt liegt auf einem ausgewogenen Powertraining
                            mit Muskelkräftigung und Fatburning.
                            <br>
                            <input type="button" class="button" value="Kontakt" onclick="window.location.href='/kontakt.php#abteilungsleiter'">
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>AH-Gruppe</h3>
                        <p>
                            Die größte Breitensportabteilung ist die AH. Im Winterhalbjahr wird jeden Freitag ausgiebig
                            Gymnastik gemacht. Das Angebot ist sehr beliebt, da es für alle Altersgruppen geeignet ist. Nach der
                            Gymnastik wird noch Hallenhockey oder Fußball gespielt. Den Abschluss dieses Freitags bildet der
                            gesellige Abend in der Vereinsgaststätte. Montags und Mittwochs finden noch Saunaabende statt. Im
                            Sommerhalbjahr kann man sich, je nach Geschmack, den Paddlern anschließen, die den heimischen
                            Altrhein befahren oder den Radfahrern, die Touren rund um Lampertheim machen. Wanderungen und
                            Kameradschaftsabende runden das Jahresprogramm ab. Die sangesfreudige Gruppe ist auch bei der WSV-
                            Faßnacht aktiv. Sie sind als "Fidele Paddler" ein fester Bestandteil der Prunksitzungen.
                            <br>
                            <input type="button" class="button" value="Kontakt" onclick="window.location.href='#contactCard'">
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>Rücken-Fitness</h3>
                        <p>
                            Bei uns sind die Kurse geprüft. Wer sich überzeugen will, kommt mittwochs in die WSV Sporthalle:
                            09:00 bis 10:00 Uhr unter der Leitung von Erika Gabler.
                            Man braucht Sportkleidung, ein großes Handtuch und eine Matte. Redondo-Bälle, Pezzibälle, Kleinhanteln
                            und Therabänder sind vorhanden. Egal welches Alter, die Übungen können so variiert werden, dass vom
                            Beginner bis zum Fortgeschrittenen etwas dabei ist. Auch für Nichtmitglieder.
                            <br>
                            <input type="button" class="button" value="Kontakt" onclick="window.location.href='/kontakt.php#abteilungsleiter'">
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>Kanuwandersport</h3>
                        <p>
                            Dienstags um 18:00 Uhr treffen sich im Sommerhalbjahr alle, die auf dem
                            Altrhein eine gemütliche Runde drehen wollen. Gepaddelt wird in
                            Einerkajaks oder im Canadier, die zur Verfügung gestellt werden,
                            natürlich mit Paddel und Schwimmweste. Die Boote sind für Anfänger und
                            Profis gleichermaßen geeignet. Nach vorheriger Absprache werden wir auch
                            größere Touren, z. B. zum Faudi oder zum Klenk, angehen.
                            <br>
                            <input type="button" class="button" value="Kontakt" onclick="window.location.href='#contactCard'">
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>Yoga</h3>
                        <p>
                            Beim Yoga für Alle bieten wir dir die Möglichkeit, den Alltag hinter dir zu lassen und etwas Gutes für Körper und Geist zu tun. Jeden Mittwochabend fließen wir gemeinsam durch abwechslungsreiche Yogasequenzen, die Kraft, Beweglichkeit und innere Ruhe fördern. Praktiziert wird klassisches Hatha Yoga, ergänzt durch Elemente aus Yogatherapie, Pilates und Pranayama (Atemtechniken).
                            <br>
                            Im Mittelpunkt steht dabei eine gesunde und individuelle Ausrichtung, die an die eigenen körperlichen Voraussetzungen angepasst wird. So entsteht eine Praxis, die für alle geeignet ist – egal ob du schon Yoga-Erfahrung hast oder ganz neu einsteigst. Die Einheiten sind funktional, kräftigend, mobilisierend und ausgleichend gestaltet, sodass jede*r Teilnehmende auf seine Weise profitiert und mit einem guten Gefühl aus der Stunde geht.
                            <br>
                            Geleitet wird der Kurs von Julia Hartmann, Bewegungspädagogin und Yogalehrerin mit therapeutischem Hintergrund. Mit viel Erfahrung, Achtsamkeit und einem geschulten Blick auf eine gesunde Körperhaltung begleitet sie die Teilnehmenden durch die Praxis und zeigt, wie Yoga nachhaltig zu mehr Wohlbefinden beitragen kann.
                            <br>
                            Wenn du noch unsicher bist, ob Yoga das Richtige für dich ist, kannst du ganz unkompliziert an einer kostenlosen Probestunde Mittwochs von 18:30 bis 20:00 Uhr teilnehmen. Komm einfach vorbei, atme durch und erlebe, wie wohltuend Yoga für Körper, Geist und Seele sein kann.
                            <br>
                            <input type="button" class="button" value="Kontakt" onclick="window.location.href='/kontakt.php#abteilungsleiter'">
                        </p>
                    </div>
                </li>
            </ul>
            
        </div>
        <?php
            $news = getAbteilungsNews(3);
            if (count($news) > 0) {
                echo '<div class="text-field3">';
                echo '<h4>News</h4>';
                foreach ($news as $item) {
                    echo "<ul>";
                    echo "<div class='article'>";
                    echo "<h4>" . $item['title'] . "</h4>";
                    echo "<p>" . $item['summary'] . "</p>";
                    echo "<input type='button' style='margin-left: 2em;' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $item['artikelID'] . "\"'>";
                    echo "</div>";
                    echo "</ul>";
                    echo "<br>";
                }
                echo '</div>';
            }

            printOutDatesOfAbteilung(3);
        ?>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>