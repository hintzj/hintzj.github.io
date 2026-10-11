<?php
    require 'functions.php';
    $article = null;
    $text = '';
?>

<!DOCTYPE HTML>
<html>
<?php
    try{
        //get the title of the article from the get request and the article database
        $id = $_GET['id'];
        $conn = connect("public");
        if ($conn == false) {
            throw new Exception("DB Connection failed");
        }
        $sql = "SELECT * FROM artikel WHERE artikelID = '$id'";
        $result = mysqli_query($conn, $sql);
        $article = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);

        if ($article == NULL) {
            header("Location: 404.php");
            exit;
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "Error: " . $error;
        error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
    }
?>
<head>
    <?php include 'defaultHead.php'; ?>
    <title><?php echo htmlspecialchars($article['title'] ?? ''); ?>- WSVL</title>
</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="content">
        <div class="text-field1">
            <h4><?php echo htmlspecialchars($article['title'] ?? ''); ?></h4>
            <p>
                <ul>
                    <?php
                        // Print the article along with all new lines
                        $text = $article['text'] ?? '';
                    ?>

                    <div id="markdown-content" class="markdown-content">Loading markdown...</div>

                    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
                    <script>
                        const markdownContent = <?php echo json_encode($text, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
                        document.getElementById('markdown-content').innerHTML = marked.parse(markdownContent);
                    </script>


                    <br>
                    <input type="button" class="button" value="Zurück" onclick="history.back()">
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>