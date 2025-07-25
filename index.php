<?php
    include 'functions.php';
    header("SameSite=None; Secure");
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>WSV-Lampertheim</title>
</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="content">
        <main>
            <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);" ;>
                <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                    <div>
                        <h2>Willkommen auf der Website des WSV-Lampertheim</h2>
                        <p>
                            Gelegen am schönen Althrein betreiben wir hier am WSV erfolgreichen Kanurennsport und
                            Kanupolo.
                            <br>Doch auch ein schönes Vereinsleben und eine gute Jugendarbeit sind uns wichtig.
                            <br>Die Kanuakademie ist teil unserer Philosophie der Vereinbarung von Sport und Schule
                            <br>und wirkt als Teilzeitinternat im Bereich der Kindernachmittagsbetreuung.
                            <br>
                            <br>
                            <img src="documents/pics/logo1.png" alt="Logo des Wassersportvereins">
                        </p>

                    </div>
                </div>
            </div>
            <div class="text-field1">
                <h4>Unsere Abteilungen</h4>
                <p>
                    <?php
                        $conn = connect();
                        if ($conn == false) {
                            throw new Exception("DB Connection failed");
                        }
                        $sql = "SELECT * FROM abteilungen WHERE abteilungsPage != '' AND startPage = 1";
                        $result = $conn->query($sql);
                        $tableScript = "<table style='width: 100%'>";
                        $counter = 0;
                        while($row = $result->fetch_assoc()) {
                            if ($counter == 0) {
                                $tableScript .= "<tr>";
                            }
                            $tableScript .= "<td>";
                            $tableScript .= "<a href='" . strtolower($row['abteilungName']) . ".php'>";
                            $tableScript .= "<img src='documents/pics/introImage/" . strtolower($row['abteilungName']) . ".png' alt='" . $row['abteilungName'] . " style='width='200em'; height='auto'>";
                            $tableScript .= "</a>";
                            $tableScript .= "<br>";
                            $tableScript .= "<a href='" . strtolower($row['abteilungName']) . ".php'>";
                            $tableScript .= $row['abteilungName'];
                            $tableScript .= "</a>";
                            $tableScript .= "</td>";
                            $counter++;
                            // If the user is on mobile or tablet, we want to show only two columns
                            if (isMobile()) {
                                $maxColumns = 2;
                            } else {
                                $maxColumns = 3;
                            }
                            if ($counter == $maxColumns) {
                                $tableScript .= "</tr>";
                                $counter = 0;
                            }
                        }
                        $tableScript .= "</table>";
                        echo $tableScript;
                    ?>
                </p>
            </div>
            <div class="text-field2">
                <h4>Vereinsnews</h4>
                <ul>
                    <!--
                 * FILEPATH: /c:/webserver/htdocs/WSV_Webpage/hintzj.github.io/index.php
                 * This code connects to the "public" database, selects the latest 3 articles from the "artikel" table, and displays them on the webpage.
                 * Each article is displayed in a div with its title, summary, and a "Weiterlesen" button that links to the full article.
                 * If there is an error connecting to the database or executing the query, an error message is displayed.
                -->
                    <?php
                    try {
                        $conn = connect("public");
                        if ($conn == false) {
                            throw new Exception("DB Connection failed");
                        }
                        $sql = "SELECT * FROM artikel ORDER BY date DESC LIMIT 3";
                        $result = mysqli_query($conn, $sql);
                        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        //make a div for every article that has a read more button that links to the article
                        foreach ($articles as $article) {
                            echo "<div class='article'>";
                            echo "<h3>" . $article['title'] . "</h3>";
                            echo "<p>" . $article['summary'] . "</p>";
                            echo "<input type='button' style='margin-left: 2em;' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $article['artikelID'] . "\"'>";
                            echo "</div>";
                            echo "<br>";
                        }
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                        //error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                    }
                ?>
                </ul>
                <div style="text-align: center;">
                    Falls du immer auf dem neusten Stand bleiben willst, kannst du dich auch für unseren WhatsApp
                    verteiler anmelden.<br><br>
                    <a href="https://chat.whatsapp.com/IeHYUxnAh47HMNSKh4twUG">
                    <img src="documents/pics/whatsAppInvite.png" alt="QR-Code für den WhatsApp Verteiler"
                        style="width: 20%; margin: inherit;">
                    </a>
                </div>
            </div>
            <div class="text-field3">
                <h4>Schnupperzeiten</h4>
                <p>
                <ul>
                    Bei uns sind neue Gesichter immer Willkommen. Wenn du Interesse hast, kannst du gerne zu unseren
                    Schnupperzeiten kommen.
                    <br>
                    <br>
                    <b>Kanurennsport:</b> Montags 16.30 - 18.00 Uhr
                    <br>
                    <b>Kanupolo:</b> Dienstags 18.00 - 20.00 Uhr
                    <br>
                    <b>Wanderpaddeln:</b> Dienstags 18.00 - 20.00 Uhr
                    <br>
                    <b>Rückengymnastik:</b> Mittwochs 09.00 - 10.30 Uhr
                    <br>
                    <b>Yoga:</b> Mittwochs 18.30 - 20.00 Uhr
                    <br>
                    <b>Bodyforming:</b> Donnerstags 19.30 - 20.30 Uhr
                    <br>
                    <b>Boule:</b> Donnerstags 15.00 - 17.00 Uhr
                </ul>
                </p>
            </div>

            <div class="text-field4" style="background-color:rgba(255, 124, 124, 0.74);">
                <h4>Fusion der Volksbank mit der Mainzer Volksbank</h4>
                <table>
                    <tr>
                        <td style="width: 80%;">
                            <ul style="text-align: left;">
                                Durch die Fusion der Volksbank mit der Mainzer Volksbank gibt es neue Kontonummern, da die BLZ von Mainz übernommen wird.
                                <br>
                                Bitte teilt uns zeitnah eure neue Kontonummer mit, falls ihr betroffen seid.
                                <br>
                                Schreibt einfach eine kurze Mail an: <a href="mailto:mitgliederverwaltung@wsv-lampertheim.de">mitgliederverwaltung@wsv-lampertheim.de</a>
                            </ul>
                        </td>
                        <td style="width: 20%;">
                            <img src="https://logosandtypes.com/wp-content/uploads/2020/08/volksbanken-raiffeisenbanken.png" alt="Logo der Volksbank" style="width: 100%;">
                        </td>
                    </tr>
                </table>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>