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
                <?php
                    try{
                        $conn = connect("public");
                        if ($conn == false) {
                            throw new Exception("DB Connection failed");
                        }
                        $sql = "SELECT * FROM termine WHERE terminDateStart > NOW() AND abteilungID = 0 ORDER BY terminDateStart ASC";
                        $result = mysqli_query($conn, $sql);
                        $termine = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                        mysqli_close($conn);

                        if (count($termine) > 0) {
                            echo '<ul>';

                            //print every event in a list along with the date
                            foreach ($termine as $termin) {
                                $startDate = $termin['terminDateStart'];
                                $startDate = date("d.m.Y", strtotime($startDate));
                                if ($termin['terminDateEnd'] != null) {
                                    $endDate = $termin['terminDateEnd'];
                                    $endDate = date("d.m.Y", strtotime($endDate));
                                }

                                // helper to format time (if minutes are "00" show only hour)
                                $formatTime = function($t) {
                                    $tm = date("H:i", strtotime($t));
                                    if (substr($tm, 3) === '00') {
                                        return intval(substr($tm, 0, 2)); // drop leading zero
                                    }
                                    return $tm;
                                };

                                $hasEndDate = !empty($termin['terminDateEnd']);
                                $hasStartTime = !empty($termin['terminTimeStart']);
                                $hasEndTime = !empty($termin['terminTimeEnd']);

                                if ($hasEndDate) {
                                    // start and end date present
                                    if ($hasStartTime && $hasEndTime) {
                                        $tStart = $formatTime($termin['terminTimeStart']);
                                        $tEnd = $formatTime($termin['terminTimeEnd']);
                                        echo "<li>{$startDate} {$tStart} Uhr bis {$endDate} {$tEnd} Uhr - {$termin['terminTitle']}</li>";
                                    } elseif ($hasStartTime) {
                                        $tStart = $formatTime($termin['terminTimeStart']);
                                        echo "<li>{$startDate} ab {$tStart} Uhr bis {$endDate} - {$termin['terminTitle']}</li>";
                                    } elseif ($hasEndTime) {
                                        $tEnd = $formatTime($termin['terminTimeEnd']);
                                        echo "<li>{$startDate} bis {$endDate}, Ende: {$tEnd} Uhr - {$termin['terminTitle']}</li>";
                                    } else {
                                        echo "<li>{$startDate} bis {$endDate} - {$termin['terminTitle']}</li>";
                                    }
                                } else {
                                    // only start date
                                    if ($hasStartTime && $hasEndTime) {
                                        $tStart = $formatTime($termin['terminTimeStart']);
                                        $tEnd = $formatTime($termin['terminTimeEnd']);
                                        echo "<li>{$startDate} von {$tStart} Uhr bis {$tEnd} Uhr - {$termin['terminTitle']}</li>";
                                    } elseif ($hasStartTime) {
                                        $tStart = $formatTime($termin['terminTimeStart']);
                                        echo "<li>{$startDate} ab {$tStart} Uhr - {$termin['terminTitle']}</li>";
                                    } elseif ($hasEndTime) {
                                        $tEnd = $formatTime($termin['terminTimeEnd']);
                                        echo "<li>{$startDate} bis {$tEnd} Uhr - {$termin['terminTitle']}</li>";
                                    } else {
                                        echo "<li>{$startDate} - {$termin['terminTitle']}</li>";
                                    }
                                }


                            }
                            echo '</ul>';
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo "Error: " . $error;
                        //error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                    }
                ?>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>