<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Archiv - WSVL</title>
    </style>
</head>

<body>
    <?php include 'header1.php'; ?>
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
            <h2>Archiv</h2>
            <p>
                Hier kann man sich über die vergangenheit des WSV informieren
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h2>Berichte</h2>
            <?php
                try {
                    $conn = connect("public");
                    if ($conn == false) {
                        throw new Exception("DB Connection failed");
                    }
                    $sql = "SELECT * FROM artikel WHERE date < NOW() ORDER BY date DESC";
                    $result = mysqli_query($conn, $sql);
                    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    //make a div for every article that has a read more button that links to the article
                    foreach ($articles as $article) {
                        echo "<ul>";
                        echo "<div class='article'>";
                        echo "<h2>" . $article['title'] . "</h2>";
                        echo "<p>" . $article['summary'] . "</p>";
                        echo "<input type='button' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $article['artikelID'] . "\"'>";
                        echo "</div>";
                        echo "</ul>";
                        echo "<br>";
                    }
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo "Error: " . $error;
                    error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                }
            ?>
        </div>
        <div class="text-field2" >
            <h2>Mitgliederinfo</h2>

            <object data="documents/mitgliedsinfos/Mitgliederinfo_2024.pdf" type="application/pdf" id="pdfViewer" width="80%" height="750px" style="display: block; margin: auto;">
                <script>
                    hideButtons();
                </script>
                <p>Es sieht so aus, als ob dein Browser keine PDFs anzeigen kann. Kein Problem! Du kannst die Mitgliederinfos hier herunterladen.</p>
                <?php
                    $dir = "documents\mitgliedsinfos";
                    $files = scandir($dir);
                    print_r($files);
                    foreach ($files as $file) {
                        if (strpos($file, ".pdf") !== false) {
                            echo "<div style='text-align: center;'><a href='documents/mitgliedsinfos/" . $file . "'>" . $file . "</a></div>";
                        }
                    }
                ?>
            </object>

            <script>
                var pdfViewer = document.getElementById('pdfViewer');
                var pdfViewerSrc = pdfViewer.getAttribute('data');

                <?php
                    $dir = "documents\mitgliedsinfos";
                    $files = scandir($dir);
                    echo "var pdfFiles = [";
                    foreach ($files as $file) {
                        if (strpos($file, ".pdf") !== false) {
                            echo "'documents/mitgliedsinfos/". $file . "',";
                        }
                    }
                    echo "];";
                ?>

                function nextPdf() {
                    console.log(pdfFiles);
                    var currentPdf = pdfViewer.getAttribute('data');
                    var currentPdfIndex = pdfFiles.indexOf(currentPdf);
                    if (currentPdfIndex < pdfFiles.length - 1) {
                        var newPdf = pdfFiles[currentPdfIndex + 1];
                        pdfViewer.setAttribute('data', newPdf);
                        console.log(newPdf);
                    } else {
                        currentPdfIndex = 0;
                        var newPdf = pdfFiles[currentPdfIndex];
                        pdfViewer.setAttribute('data', newPdf);
                        console.log(newPdf);
                    }
                }

                function lastPdf() {
                    var currentPdf = pdfViewer.getAttribute('data');
                    var currentPdfIndex = pdfFiles.indexOf(currentPdf);
                    if (currentPdfIndex > 0) {
                        var newPdf = pdfFiles[currentPdfIndex - 1];
                        pdfViewer.setAttribute('data', newPdf);
                        console.log(newPdf);
                    } else {
                        currentPdfIndex = pdfFiles.length - 1;
                        var newPdf = pdfFiles[currentPdfIndex];
                        pdfViewer.setAttribute('data', newPdf);
                        console.log(newPdf);
                    }

                function hideButtons() {
                    var pdfButtons = document.getElementById('pdfButton').style.display = "none";
                }
                }

                
            </script>
            <br>
            <div style="text-align: center;">
                <button onclick="lastPdf()" id="pdfButton" style="display: inline"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vorheriges</button>
                <button onclick="nextPdf()" id="pdfButton" style="display: inline">Nächstes <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>

        </div>
        <div class="text-field3">
            <h2>Alte Webseite</h2>
            <ul>
            <p>
                Wie Sie schon gesehen haben ist die neue Webseite des WSVL online. Diese Webseite ist noch in der Testphase und wird immer wieder aktualisiert. Wenn Sie die alte Webseite einsehen wollen, können Sie das <a href="https://archiv.hin.tz">hier</a> tun.
            </p>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>