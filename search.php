<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Suche:
        <?php echo $_POST['search']; ?>
        - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>
                <?php echo $_POST['search']; ?>
            </h2>
            <p>[*Insert Text Here*]
            </p>
        </div>
        <div class="text-field1">
            <h4>[*Insert Text Here*]</h4>
            <p>
                <ul>
                    <li>[*Insert Text Here*]</li>
                    <li>[*Insert Text Here*]</li>
                    <li>[*Insert Text Here*]</li>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>