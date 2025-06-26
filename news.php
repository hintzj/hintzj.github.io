<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>News - WSVL</title>
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
            <h2>News des WSV</h2>
            <p>
                Hier findest du alle wichtigen Neuingen des WSV Lampertheim!
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Aktuelle News</h4>
            <?php
                try {
                    $conn = connect("public");
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }
                    $sql = "SELECT * FROM artikel WHERE date >= DATE_SUB(NOW(), INTERVAL 14 DAY) ORDER BY date DESC";
                    $result = mysqli_query($conn, $sql);
                    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    //make a div for every article that has a read more button that links to the article
                    foreach ($articles as $article) {
                        echo "<ul>";
                        echo "<div class='article'>";
                        echo "<h2>" . $article['title'] . "</h2>";
                        echo "<p>" . $article['summary'] . "</p>";
                        echo "<input type='button' style='margin-left: 2em;' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $article['artikelID'] . "\"'>";
                        echo "</div>";
                        echo "</ul>";
                        echo "<br>";
                    }
                    if (count($articles) == 0) {
                        echo "<ul>";
                        echo "<div class='article'>";
                        echo "<h2>Leider gibt es im Moment keine Neuigkeiten zu berichten</h2>";
                        echo "<p>Falls Sie jedoch mehr Informationen über vergangene Ereignisse wünschen, schauen Sie bitte in unserem Archiv nach.</p>";
                        echo "<input type='button' style='margin-left: 2em;' value='Ab ins Archiv' onclick='window.location.href=\"archiv.php\"'>";
                        echo "</div>";
                        echo "</ul>";
                    }
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo "Error: " . $error;
                    error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                }
            ?>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>