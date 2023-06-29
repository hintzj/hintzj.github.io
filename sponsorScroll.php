<?php
    require_once 'functions.php';
?>

<a href="sponsors.php">

<div>
<?php
    //do the same thing as in sponsorScroll.php but with the sponsors table in the database
    try {
        $conn = connect();
        if ($conn == false) {
            throw new Exception("DB Connection failed");
        }
        $sql = "SELECT * FROM sponsors";
        $result = mysqli_query($conn, $sql);
        $sponsors = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);

        echo "<logo-slider>\n
            <div>\n";
        foreach ($sponsors as $sponsor) {
            if ($sponsor['sponsorLogoFile'] != NULL) {
                echo "<img src='documents/pics/sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' alt='" . $sponsor['sponsorName'] . "'>\n";
            }
        }
        echo "</div>\n
            <div>\n";
        foreach ($sponsors as $sponsor) {
            if ($sponsor['sponsorLogoFile'] != NULL) {
                echo "<img src='documents/pics/sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' alt='" . $sponsor['sponsorName'] . "'>\n";
            }       
         }
        echo "</div>\n
        </logo-slider>";
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "Error: " . $error;
        error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
    }
?>
</div>
</a>