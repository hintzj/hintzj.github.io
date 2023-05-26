<?php
    require_once 'functions.php';
?>

<a href="sponsors.php">

<div>
<?php
    //do the same thing as in sponsorScroll.php but with the sponsors table in the database
    try {
        $conn = connect("public");
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
        echo "Error: " . $e->getMessage();
    }
?>
</div>
</a>