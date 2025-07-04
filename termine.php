<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Termine - WSVL</title>
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
            <h2>Willkommen auf der Terminseite des WSV</h2>
            <p>Hier findest du alle wichtigen Termine des Vereins
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Kommende Termine</h4>
            <p style="font-family: CreteRoundItalic;">
                <ul>
                <?php
                    //make a request to the termine table of the database and filter for all upcoming events
                    try{
                        $conn = connect("public");
                        if ($conn == false) {
                            throw new Exception("DB Connection failed");
                        }
                        $sql = "SELECT * FROM termine WHERE terminDate > NOW() ORDER BY terminDate ASC";
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
            </p>
        </div>
        <div class="text-field2">
            <h4>Terminkalender</h4>
            <br>
            <div style="text-align: center;">
                <iframe width="90%" height="1200" src="https://cloud.wsv-lampertheim.de/index.php/apps/calendar/embed/E4WRd829yYyZdLSf" style="border: none;"></iframe>
            </div>
            <br>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>