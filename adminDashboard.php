<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Admin Dashboard - WSVL</title>
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
            <h2>Administrator Dashboard</h2>
            <p>
                Willkommen im Administrationsbereich des WSV Lampertheim. Hier kannst du auf alle administrativen Funktionen zugreifen und die Website verwalten. Bitte wähle eine der folgenden Optionen aus, um fortzufahren.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Funktionen</h4>
            <p>
                <ul>
                    <input type="button" onclick="location.href='adminDate.php';" value="Termine verwalten" />
                    <br>
                    <br>
                    <input type="button" onclick="location.href='adminArticle.php';" value="News verwalten" />
                    <br>
                    <br>
                    <input type="button" onclick="location.href='adminMitgliederinfo.php';" value="Mitgliederinfos verwalten" />
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>