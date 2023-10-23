<?php
    require 'functions.php';

    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $date = $_POST["date"];

        $result = newDate($name, $date);

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
    <title>Neuer Termin - WSVL</title>
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
            <h2>Neuer Termin</h2>
            <p>Hier kann man einfach neue Termine hinzufügen. Füllen sie dafür das folgende Formular aus.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Termin</h4>
            <p>
                <form action="" method="post">
                    <label>Name: </label>
                    <input type="text" placeholder="neuer Termin" name="name" id="name">
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