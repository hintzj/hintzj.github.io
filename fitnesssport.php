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
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>Rücken-Fitness</h3>
                        <p>
                            Bei uns sind die Kurse geprüft. Wer sich überzeugen will, kommt mittwochs in die WSV Sporthalle:
                            09:00 bis 10:15 Uhr unter der Leitung von Hans Schlatter, Tel. 06206/57613.
                            Man braucht Sportkleidung und ein großes Handtuch; Matten, Redondo-Bälle, Pezzibälle, Kleinhanteln
                            und Therabänder sind vorhanden. Egal welches Alter, die Übungen können so variiert werden, dass vom
                            Beginner bis zum Fortgeschrittenen etwas dabei ist. Auch für Nichtmitglieder.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="article">
                        <h3>Kanuwandersport</h3>
                        <p>
                            Donnerstags um 18:00 Uhr treffen sich alle, die auf dem Altrhein eine gemütliche Runde drehen
                            wollen. Ab dem 26. April geht es los. Am besten schon paddelfertig anrücken, wenn wir dann mit
                            unserer Tour fertig sind, haben wir freie Umkleiden und Duschen zur Verfügung.
                            Gepaddelt wird in sieben Einerkajaks und in sieben Zweierkajaks, die uns zur Verfügung stehen.
                            Natürlich mit Paddel, Schwimmweste und Spritzdecke. Die Boote sind für Anfänger und Profis
                            gleichermaßen tauglich. Mit besseren Paddelkenntnissen werden wir auch größere Touren angehen.
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
        ?>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>