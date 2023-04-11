<a href="/sponsors.php">

<div>
<?php
    //do the same thing as in sponsorScroll.php but with the sponsors table in the database
    try {
        $conn = mysqli_connect("localhost", "root", "password", "wsv");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM sponsors";
        $result = mysqli_query($conn, $sql);
        $sponsors = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);

        echo "<logo-slider>\n
            <div>\n";
        foreach ($sponsors as $sponsor) {
            echo "<img src='sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' alt='" . $sponsor['sponsorName'] . "'>\n";
        }
        echo "</div>\n
            <div>\n";
        foreach ($sponsors as $sponsor) {
            echo "<img src='sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' alt='" . $sponsor['sponsorName'] . "'>\n";
        }
        echo "</div>\n
        </logo-slider>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>
</div>
</a>