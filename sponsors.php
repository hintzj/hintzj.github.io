<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <link rel='stylesheet' type='text/css' href='sponsors.css'>
    <title>Sponsoren - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>Sponsoren des WSV</h2>
            <p>Hier findest du alle wichtigen Informationen zu Sponsoren des WSV Lampertheim! Wir bedanken uns vielmals bei unseren Sponsoren für die Unterstützung!</p>
            </p>
        </div>
        <div class="text-field1">
            <h4>Sponsoren</h4>
            <?php
                $conn = mysqli_connect("localhost", "websiteReadAccess", "password", "wsvPublic");
                //$conn = mysqli_connect("sql7.freemysqlhosting.net", "sql7614355", "1C62akdn38", "sql7614355");
                if ($conn-> connect_error) {
                    die("Connection failed:". $conn-> connect_error);
                }
                $sqlLogos = "SELECT * FROM sponsors WHERE sponsorLogoFile IS NOT NULL";
                $resultLogos = mysqli_query($conn, $sqlLogos);
                $sponsorsLogos = mysqli_fetch_all($resultLogos, MYSQLI_ASSOC);
                mysqli_free_result($resultLogos);

                $sqlNoLogos = "SELECT * FROM sponsors WHERE sponsorLogoFile IS NULL";
                $resultNoLogos = mysqli_query($conn, $sqlNoLogos);
                $sponsorsNoLogos = mysqli_fetch_all($resultNoLogos, MYSQLI_ASSOC);
                mysqli_free_result($resultNoLogos);

                mysqli_close($conn);

                //list all the sponsorLogos with a link to the sponsor page. display the sponsor names when hovering over the logo
                echo "<div class='sponsor'>";
                echo "<ul>";
                foreach ($sponsorsLogos as $sponsor) {
                    
                    echo "<li>";
                    echo "<a href='" . $sponsor['sponsorUrl'] . "' target='_blank' rel='noopener noreferrer'><img src='sponsorLogos/" . $sponsor['sponsorLogoFile'] . "' loading='lazy' style='width: 100%' alt='" . $sponsor['sponsorName'] . "'></a>";
                    echo "</li>";
                 
                }
                echo "</ul>";
                echo "</div>";
                echo "<br><br>";

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


                
            ?>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>