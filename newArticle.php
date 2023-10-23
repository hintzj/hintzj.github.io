<?php
    require 'functions.php';

    if(isset($_POST['submit'])){
        $title = $_POST["title"];
        $summary = $_POST["summary"];
        $text = $_POST["text"];
        $date = $_POST["date"];

        $result = newArticle($date, $title, $summary, $text);

        if($result == "success"){
            //header("location: termine.php");
        }else{
            $response = $result;
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Neuer Artikel - WSVL</title>
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
            <h2>Neuer Artikel</h2>
            <p>Hier kann man einfach neue Artikel hinzufügen. Füllen sie dafür das folgende Formular aus.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Artikel</h4>
            <p>
                <form action="" method="post">
                    <label>Titel: </label>
                    <input type="text" placeholder="Titel des Artikels" name="title" id="title">
                    <br>
                    <label>Zusammenfassung: </label>
                    <input type="text" placeholder="Zusammenfassung" name="summary" id="summary">
                    <br>
                    <label>Inhalt: </label>
                    <input type="text" placeholder="Inhalt" name="text" id="text">
                    <br>
                    <label>Datum: </label>
                    <input type="date" name="date" id="date">
                    <br>
                    <br>
                    <input type="submit" value="Absenden" name="submit">
                </form>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>