<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>
<?php
    try{
        //get the title of the article from the get request and the article database
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        //echo "Current Page: " . htmlspecialchars($page);
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "Error: " . $error;
        error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
    }
?>       
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
                Hier kann man sich über die Vergangenheit des WSV informieren
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Berichte</h4>
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
                    if (empty($articles)) {
                        echo "<p>Es gibt keine Berichte im Archiv.</p>";
                        return;
                    }
                    // Pagination logic
                    $articlesPerPage = 6; // Number of articles per page
                    $totalArticles = count($articles);
                    $totalPages = ceil($totalArticles / $articlesPerPage);
                    $startIndex = ($page - 1) * $articlesPerPage;
                    $articles = array_slice($articles, $startIndex, $articlesPerPage);
                    if ($page > $totalPages || $page < 1) {
                        throw new Exception("Page number out of range");
                    }
                    //make a div for every article that has a read more button that links to the article
                    foreach ($articles as $article) {
                        echo "<ul>";
                        echo "<div class='article'>";
                        echo "<h2>" . $article['title'] . "</h2>";
                        echo "<p>" . $article['summary'] . "</p>";
                        echo "<input type='button' style='margin-left: 2em;' value='Weiterlesen' onclick='window.location.href=\"artikel.php?id=" . $article['artikelID'] . "\"'>";
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
            <div style="text-align: center;">
                <button onclick="lastPage()" id="lastPageButton" style="display: inline"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vorherige Seite</button>
                <script>
                    var articleButton = document.getElementById('lastPageButton');
                    var currentPage = new URLSearchParams(window.location.search).get('page') || 1;
                    if (currentPage > 1) {
                        articleButton.style.display = "inline";
                    } else {
                        articleButton.style.display = "none";
                    }
                </script>
                <script>
                    function lastPage() {
                        var currentPage = new URLSearchParams(window.location.search).get('page') || 1;
                        if (currentPage > 1) {
                            window.location.href = "archiv.php?page=" + (parseInt(currentPage) - 1);
                        } else {
                            window.location.href = "archiv.php";
                        }
                    }

                    function nextPage() {
                        var currentPage = new URLSearchParams(window.location.search).get('page') || 1;
                        window.location.href = "archiv.php?page=" + (parseInt(currentPage) + 1);
                    }
                </script>

                <?php echo "Seite " . htmlspecialchars($page) . " von " . $totalPages; ?>

                <button onclick="nextPage()" id="nextPageButton" style="display: inline">Nächste Seite <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                <script>
                    var articleButton = document.getElementById('nextPageButton');
                    var totalPages = <?php echo $totalPages; ?>;
                    if (currentPage < totalPages) {
                        articleButton.style.display = "inline";
                    } else {
                        articleButton.style.display = "none";
                    }
                </script>
            </div>
        </div>
        <div class="text-field2" >
            <h4>Mitgliederinfo</h4>
            <br>
            <object data="<?php echo getNewestMitgliederInfo(); ?>" type="application/pdf" id="pdfViewer" width="80%" height="750px" style="display: block; margin: auto;">
                <script>
                    hideButtons();
                </script>
                <p>
                    Es sieht so aus, als ob dein Browser keine PDFs anzeigen kann. Kein Problem! Du kannst die Mitgliederinfos hier herunterladen.
                
                <?php
                    $dir = "documents/mitgliedsinfos";
                    $files = scandir($dir);
                    //print_r($files);
                    foreach ($files as $file) {
                        if (strpos($file, ".pdf") !== false) {
                            echo "<div style='text-align: center;'><a href='" . $dir . "/" . $file . "'>" . $file . "</a></div>";
                        }
                    }
                ?>
                </p>
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
            <h4>Alte Webseite</h4>
            <ul>
            <p>
                Wie Sie schon gesehen haben ist die neue Webseite des WSVL online. Diese Webseite ist noch in der Testphase und wird immer wieder aktualisiert. Wenn Sie die alte Webseite einsehen wollen, können Sie das <a href="https://archiv.wsv-lampertheim.de">hier</a> tun.
            </p>
            </ul>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>