<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Jugendnews - WSVL</title>
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
                    <h2>Willkommen auf der Newsseite der WSV-Jugend</h2>
                    <p>Hier infomieren wir über kommende und Vergangene Events
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Kommende Events</h4>
            <ul>
                <?php
                    //make a request to the termine table of the database and filter for all upcoming events
                    try{
                        $conn = connect("public");
                        if ($conn == false) {
                            throw new Exception("DB Connection failed");
                        }
                        $sql = "SELECT * FROM termine WHERE (terminDate > NOW() AND terminType = 1) ORDER BY terminDate ASC";
                        $result = mysqli_query($conn, $sql);
                        $termine = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        
                        //print every event in a list along with the date
                        foreach ($termine as $termin) {
                            $date = $termin['terminDate'];
                            $date = date("d.m.Y", strtotime($date));
                            if ($termin['terminTime'] != null) {
                                echo "<li>" . $date . " ab " . substr($termin['terminTime'], 0, strpos($termin['terminTime'], ":00")) . " Uhr" . " - " . $termin['terminTitle'] . "</li>";
                            } else {
                                echo "<li>" . $date . " - " . $termin['terminTitle'] . "</li>";
                            }
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo "Error: " . $error;
                        //error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                    }
                ?>
            </ul>
        </div>
        <div class="text-field2">
            <h4>Artikel zu den vergangenen Events der Vereinsjugend</h4>
            <?php
                try {
                    $conn = connect("public");
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }
                    $sql = "SELECT * FROM artikel WHERE (date < NOW() AND artikelType = 1) ORDER BY date DESC LIMIT 6";
                    $result = mysqli_query($conn, $sql);
                    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    if (empty($articles)) {
                        echo "<p>Es gibt keine Berichte im Archiv.</p>";
                        return;
                    }
                    
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
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo "Error: " . $error;
                    error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                }
            ?>
            <div class="button-container" style="text-align: center;">
                <p>Interesse geweckt? Weitere Artikel findest du im Archiv:</p>
                <input type="button" style="margin-left: 2em;" value="Alle Artikel anzeigen" onclick="window.location.href='archiv.php'">
            </div>
        </div>

        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>