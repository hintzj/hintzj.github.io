<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <link rel='stylesheet' type='text/css' href='design/css/sponsors.css'>
    <title>Sponsoren - WSVL</title>
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
                    <h2>Sponsoren des WSV</h2>
                    <p>Hier findest du alle wichtigen Informationen zu Sponsoren des WSV Lampertheim! Wir bedanken uns
                        vielmals bei unseren Sponsoren für die Unterstützung!</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="text-field1">
            <h4>Sponsoren</h4>
            <br>
            <ul>
            <?php
                try{
                    $conn = connect("public");
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }
                    $sqlLogos = "SELECT * FROM sponsors WHERE sponsorLogoFile IS NOT NULL ORDER BY sponsorName ASC";
                    $resultLogos = mysqli_query($conn, $sqlLogos);
                    $sponsorsLogos = mysqli_fetch_all($resultLogos, MYSQLI_ASSOC);
                    mysqli_free_result($resultLogos);

                    $sqlNoLogos = "SELECT * FROM sponsors WHERE sponsorLogoFile IS NULL";
                    $resultNoLogos = mysqli_query($conn, $sqlNoLogos);
                    $sponsorsNoLogos = mysqli_fetch_all($resultNoLogos, MYSQLI_ASSOC);
                    mysqli_free_result($resultNoLogos);

                    mysqli_close($conn);

                    function sponsorTable($sponsorsLogos) {
                        $tableScript = "<table style='width: 100%'>";
                        $counter = 0;
                        foreach ($sponsorsLogos as $row) {
                            if ($counter == 0) {
                                $tableScript .= "<tr>";
                            }
                            $tableScript .= "<td>";
                            $tableScript .= "<a href='" . $row['sponsorUrl'] . "' target='_blank' rel='noopener noreferrer'>";
                            $tableScript .= "<img src='documents/pics/sponsorLogos/" . $row['sponsorLogoFile'] . "' alt='" . $row['sponsorName'] . "' style='max-width: 100%; height: auto;'>";
                            $tableScript .= "</a>";
                            $tableScript .= "<td>";
                            $counter++;
                            if ($counter == 3) {
                                $tableScript .= "</tr>";
                                $counter = 0;
                            }
                        }
                        $tableScript .= "</table>";
                        return $tableScript;
                    }

                    echo sponsorTable($sponsorsLogos);

                    echo "<br>";
                    echo "<br>";

                    echo "<div class='without'>";
                    echo "Außerdem bedanken wir uns bei unseren kleineren Sponsoren:";
                    echo "<br>";
                    echo "<ul>";
                    //list all the sponsors without a logo
                    foreach ($sponsorsNoLogos as $sponsor) {
                        //echo "<div class='sponsor'>";
                        echo "<li>";
                        if ($sponsor['sponsorUrl'] == "") {
                            echo $sponsor['sponsorName'];
                        } else {
                            echo "<a href='" . $sponsor['sponsorUrl'] . "' target='_blank' rel='noopener noreferrer'>" . $sponsor['sponsorName'] . "</a>";
                        }

                        echo "<br>";
                        echo "</li>";
                        //echo "</div>";
                    }
                    echo "</ul>";
                    echo "</div>";
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo "Error: " . $error;
                    error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                }                
            ?>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>