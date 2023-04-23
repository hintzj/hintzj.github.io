<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Archiv - WSVL</title>
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting-alg" style="background-image: url(pics/Bg-Canadier.png);">
            <h2>Archiv</h2>
            <p>
                Hier kann man sich über die vergangenheit des WSV informieren
            </p>
        </div>
        <div class="text-field">
            <h2>Berichte</h2>
            <?php
                try {
                    $conn = mysqli_connect("localhost", "root", "password", "wsv");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
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
                        echo "<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>Read more</a>";
                        echo "</div>";
                        echo "</ul>";
                        echo "<br>";
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
            ?>
        </div>
        <div class="text-field" style="background-color: #5F9B81;">
            <h2>Mitgliederinfo</h2>

            <object data="documents/mitgliedsinfos/Mitgliederinfo_2022.pdf" type="application/pdf" id="pdfViewer" width="80%" height="750px" style="display: block; margin: auto;">
                <script>
                    hideButtons();
                </script>
                <p>Es sieht so aus, als ob dein Browser keine PDFs anzeigen kann. Kein Problem! Du kannst die Mitgliederinfos hier herunterladen.</p>
                <?php
                    $dir = "C:\Users\hintz\Downloads\WSV Website\hintzj.github.io\documents\mitgliedsinfos";
                    $files = scandir($dir);
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
                    $dir = "C:\Users\hintz\Downloads\WSV Website\hintzj.github.io\documents\mitgliedsinfos";
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
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>