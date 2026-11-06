<?php
    require_once 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Mitgliederinfo - WSVL</title>
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
            <h2>Mitgliederinfo</h2>
            <p>
                Hier findest du die Mitgliederinfos des WSV Lampertheim. Diese werden jährlich erstellt und enthalten alle wichtigen Informationen des vergangenen Jahres.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1" >
            <h4>Mitgliederinfo</h4>
            <br>
            <object data="<?php
                $dir = "documents/mitgliedsinfos";
                $files = array_values(array_filter(scandir($dir), function ($file) {
                    return preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $file);
                }));
                usort($files, function ($a, $b) {
                    preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $a, $dateA);
                    preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $b, $dateB);
                    $yearA = (int) $dateA[1];
                    $yearB = (int) $dateB[1];
                    $monthA = isset($dateA[2]) ? (int) $dateA[2] : 0;
                    $monthB = isset($dateB[2]) ? (int) $dateB[2] : 0;
                    return ($yearB <=> $yearA) ?: ($monthB <=> $monthA);
                });
                echo !empty($files) ? $dir . "/" . $files[0] : "";
            ?>" type="application/pdf" id="pdfViewer" width="80%" height="750px" style="display: block; margin: auto;">
                <script>
                    hideButtons();
                </script>
                <p>
                    Es sieht so aus, als ob dein Browser keine PDFs anzeigen kann. Kein Problem! Du kannst die Mitgliederinfos hier herunterladen.
                
                <?php
                    $dir = "documents/mitgliedsinfos";
                    $files = scandir($dir);

                    // sort the files in descending order based on the file name which is of the format "mitgliederinfo_YYYY(_MM).pdf"
                    usort($files, function ($a, $b) {
                        preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $a, $dateA);
                        preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $b, $dateB);
                        $yearA = isset($dateA[1]) ? (int) $dateA[1] : 0;
                        $yearB = isset($dateB[1]) ? (int) $dateB[1] : 0;
                        $monthA = isset($dateA[2]) ? (int) $dateA[2] : 0;
                        $monthB = isset($dateB[2]) ? (int) $dateB[2] : 0;

                        return ($yearB <=> $yearA) ?: ($monthB <=> $monthA);
                    });

                    echo "Hier sind die verfügbaren Mitgliederinfos:<br>";
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
                    usort($files, function ($a, $b) {
                        preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $a, $dateA);
                        preg_match('/^mitgliederinfo_(\d{4})(?:_(\d{2}))?\.pdf$/i', $b, $dateB);
                        $yearA = isset($dateA[1]) ? (int) $dateA[1] : 0;
                        $yearB = isset($dateB[1]) ? (int) $dateB[1] : 0;
                        $monthA = isset($dateA[2]) ? (int) $dateA[2] : 0;
                        $monthB = isset($dateB[2]) ? (int) $dateB[2] : 0;

                        return ($yearB <=> $yearA) ?: ($monthB <=> $monthA);
                    });
                    echo "var pdfFiles = [";
                    foreach ($files as $file) {
                        if (strpos($file, ".pdf") !== false) {
                            echo "'documents/mitgliedsinfos/". $file . "',";
                        }
                    }
                    echo "];";
                ?>

                console.log(pdfFiles);

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