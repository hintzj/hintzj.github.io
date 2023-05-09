<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Termine - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>Willkommen auf der Terminseite des WSV</h2>
            <p>Hier findest du alle wichtigen Termine des Vereins
            </p>
        </div>
        <div class="text-field1">
            <h4>Upcoming Events</h4>
            <p style="font-family: CreteRoundItalic;">
                <ul>
                <?php
                    //make a request to the termine table of the database and filter for all upcoming events
                    $conn = mysqli_connect("localhost", "websiteReadAccess", "password", "wsv");
                    //$conn = mysqli_connect("sql7.freemysqlhosting.net", "sql7614355", "1C62akdn38", "sql7614355");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT * FROM termine WHERE terminDate > NOW() ORDER BY terminDate ASC";
                    $result = mysqli_query($conn, $sql);
                    $termine = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    
                    //print every event in a list along with the date
                    foreach ($termine as $termin) {
                        echo "<li>" . $termin['terminDate'] . " - " . $termin['terminTitle'] . "</li>";
                    }
                ?>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>