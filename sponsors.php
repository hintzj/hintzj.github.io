<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Sponsoren - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting-jgn">
            <h2>Sponsoren des WSV</h2>
            <p>Hier findest du alle wichtigen Informationen zu Sponsoren des WSV Lampertheim! Wir bedanken uns vielmals bei unseren Sponsoren für die Unterstützung!</p>
            </p>
        </div>
        <div class="text-field">
            <h4>Sponsoren</h4>
            <?php
                $conn = mysqli_connect("localhost", "root", "password", "wsv");
                if ($conn-> connect_error) {
                    die("Connection failed:". $conn-> connect_error);
                }
                $sql = "SELECT * FROM sponsors";
                $result = mysqli_query($conn, $sql);
                $sponsors = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                mysqli_close($conn);

                //list all the sponsorLogos with a link to the sponsor page. display the sponsor names when hovering over the logo
                foreach ($sponsors as $sponsor) {
                    //echo "<div class='sponsor'>";
                    echo "<a href='" . $sponsor['sponsorUrl'] . "'><img src='sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' style='width: 100%' alt='" . $sponsor['sponsorName'] . "'></a>";
                    //echo "</div>";
                }
                
            ?>
        </div>
        <?php include "footer.php"; ?>
    </div>

</body>

</html>