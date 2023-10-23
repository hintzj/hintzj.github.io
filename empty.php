<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>[*Insert Text Here*] - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);";>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
            <h2>[*Insert Text Here*]</h2>
            <p>[*Insert Text Here*]
            </p>
        </div>
        </div>
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