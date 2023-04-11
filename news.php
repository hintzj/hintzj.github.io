<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>News - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting-jgn">
            <h2>News des WSV</h2>
            <p>
                Hier findest du alle wichtigen Neuingen des WSV Lampertheim!
            </p>
        </div>
        <div class="text-field">
        <?php
            try {
                $conn = mysqli_connect("localhost", "root", "password", "wsv");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM artikel WHERE date > NOW() ORDER BY date DESC";
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
        </div>
        <?php include "footer.php"; ?>
    </div>

</body>

</html>