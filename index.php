<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>WSV-Lampertheim</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <main>
            <div class="greeting">
                <h2>Willkommen auf der Website des WSV-Lampertheim</h2>
                <p>
                    Gelegen am schönen Althrein betreiben wir hier am WSV erfolgreichen Kanurennsport und Kanupolo.
                    <br>Doch auch ein schönes Vereinsleben und eine gute Jugendarbeit ist uns wichtig.
                    <br>Die Kanuakademie ist teil unserer Philosophie der Vereinbarung von Sport und Schule
                    <br>und wirkt als Teilzeitinternat im Bereich der Kindernachmittagsbetreuung.
                    <br>
                    <br>
                    <img src="pics/logo1.png">
                </p>

            </div>
            <div class="newsblock">
                <h4>Vereinsnews</h4>
                <ul>
                <?php
                    try {
                        $conn = mysqli_connect("localhost", "root", "password", "wsv");
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM artikel ORDER BY date DESC LIMIT 3";
                        $result = mysqli_query($conn, $sql);
                        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        //make a div for every article that has a read more button that links to the article
                        foreach ($articles as $article) {
                            echo "<div class='article'>";
                            echo "<h2>" . $article['title'] . "</h2>";
                            echo "<p>" . $article['summary'] . "</p>";
                            echo "<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>Read more</a>";
                            echo "</div>";
                            echo "<br>";
                        }
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
                </ul>
            </div>
            <div class="text-field" style="background-color: #5F9B81;">
                <h4>Schnupperzeiten</h4>
                <p>
                    Bei uns sind neue Gesichter immer Willkommen
                    <br>
                </p>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </div>

</body>

</html>