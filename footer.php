<!--This file is included in all pages of the website. It contains the footer of the website.-->
<!--The footer is the same on all pages, so it is easier to maintain it in one file.-->
<?php
    
    echo "<div class='endOfPage'>\n";
    include 'sponsorScroll.php';
    echo "<adress>\n
        <p>\n
        Wassersportverein Lampertheim 1929 e.V. / Albrecht-D&uuml;rer-Stra&szlig;e 46 / 68623 Lampertheim / Hessen, Deutschland\n
        </p>\n
        </adress>\n
        <footer>\n
        Copyright 1929-" . date("Y") . " /\n
        <a href='impressum.php'>Impressum</a>\n
        </footer>\n
        <br>\n
        </div>";        
?>