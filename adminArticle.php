<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Artikel Verwalten - WSVL</title>
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
            <h2>Artikel verwalten</h2>
            <p>
                Willkommen im Administrationsbereich für die Artikel der Webseite. Hier kannst du Artikel hinzufügen, bearbeiten oder löschen. Bitte wähle ein Artikel aus oder erstelle einen neuen Artikel, um fortzufahren.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminDashboard.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Neuen Artikel erstellen</h4>
            <p>
                <ul>
                    <input type="button" style="background-color: royalblue;" onclick="location.href='newArticle.php';" value='Neuer Artikel' />
                </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Artikel</h4>
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
                        $sql = "SELECT * FROM artikel ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);
                        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        //make a div for every article that has a read more button that links to the article
                        foreach ($articles as $article) {
                            echo "<div class='article'>";
                            echo "<h3 style='text-indent: 1em;'>" . $article['title'] . "</h3>";
                            echo "<p style='text-indent: 2em;'>" . $article['summary'] . "</p>";
                            echo "<input type='button' style='margin-left: 2em;' value='Bearbeiten' onclick='window.location.href=\"adminEditArticle.php?id=" . $article['artikelID'] . "\"'>";
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
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>