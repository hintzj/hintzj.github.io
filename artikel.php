<?php
    require 'functions.php';
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
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "Error: " . $error;
        error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
    }
?>
<head>
    <?php include 'defaultHead.php'; ?>
    <title><?php echo $article['title']; ?>- WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="text-field1">
            <h4><?php echo $article['title']; ?></h4>
            <p>
                <ul>
                    <?php
                        echo "<p>" . $article['text'] . "</p>";
                    ?>

                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>