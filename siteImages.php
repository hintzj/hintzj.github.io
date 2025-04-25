<?php
    require_once 'functions.php';
    $var = $_SERVER['REQUEST_URI'];

    $imagePaths = getSiteImages($var);
    if ($imagePaths == null) {
        $imagePaths = getSiteImages();
        $var = "index.php";
    }
?>

<div class="text-field4">
    <h4>Impressionen</h4>
    <?php
        try {
            shuffle($imagePaths);
            echo "<logo-slider class='img'>\n
                <div>\n";
                    foreach ($imagePaths as $path) {
                        echo "<img src='documents/pics/siteImageScroll/" . clean($var) . "/" . $path . "'>\n";
                    }
                echo "</div>\n
                <div>\n";
                    foreach ($imagePaths as $path) {
                        echo "<img src='documents/pics/siteImageScroll/" . clean($var) . "/" . $path . "'>\n";
                    }
                echo "</div>\n
                <div>\n";
                    foreach ($imagePaths as $path) {
                        echo "<img src='documents/pics/siteImageScroll/" . clean($var) . "/" . $path . "'>\n";
                    }
                echo "</div>\n
            </logo-slider>";
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo "Error: " . $error;
            error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
        }
    ?>

</div>