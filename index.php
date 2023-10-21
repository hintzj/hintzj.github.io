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
    <?php include 'header.php'; ?>
    <div class="content">
        <main>
            <div class="greeting" style="background-image: url(documents/pics/Bg-Canadier.png);">
                <h2>Willkommen auf der Website des WSV-Lampertheim</h2>
                <p>
                    Gelegen am schönen Althrein betreiben wir hier am WSV erfolgreichen Kanurennsport und Kanupolo.
                    <br>Doch auch ein schönes Vereinsleben und eine gute Jugendarbeit ist uns wichtig.
                    <br>Die Kanuakademie ist teil unserer Philosophie der Vereinbarung von Sport und Schule
                    <br>und wirkt als Teilzeitinternat im Bereich der Kindernachmittagsbetreuung.
                    <br>
                    <br>
                    <img src="documents/pics/logo1.png" alt="Logo des Wassersportvereins">
                </p>

            </div>
            <div class="text-field1">
                <h4>Vereinsnews</h4>
                <ul>
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
                            echo "<h2>" . $article['title'] . "</h2>";
                            echo "<p>" . $article['summary'] . "</p>";
                            echo "<input type='button' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $article['artikelID'] . "\"'>";
                            echo "</div>";
                            echo "<br>";
                        }
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                        //error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                    }
                ?>
                </ul>
            </div>
            <div class="text-field2">
                <h4>Schnupperzeiten</h4>
                <p>
                    <ul>
                    Bei uns sind neue Gesichter immer Willkommen. Wenn du Interesse hast, kannst du gerne zu unseren Schnupperzeiten kommen.
                    <br>
                    <br>
                    <b>Kanurennsport:</b> Montags 16.30 - 18.00 Uhr
                    <br>
                    <b>Kanupolo:</b> Dienstags 18.00 - 20.00 Uhr
                    <br>
                    <b>Wanderpaddeln:</b> Mittwochs 18.00 - 20.00 Uhr
                    <br>
                    <b>Rückengymnastik:</b> Mittwochs 09.00 - 10.30 Uhr
                    <br>
                    <b>Yoga:</b> Freitags 18.30 - 20.00 Uhr
                    <br>
                    <b>Boule:</b> Freitags 15.00 - 17.00 Uhr
                    <br>
                    <b>Bodyforming:</b> Freitags 20.00 - 21.00 Uhr
                    </ul>
                </p>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>