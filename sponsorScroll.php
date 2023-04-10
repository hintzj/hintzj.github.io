<?php
    echo "<logo-slider>\n
        <div>\n";

        //loop through a txt file and put the urls and put them into the html like in sponsorScroll.php
        $file = fopen("C:\Users\hintz\Downloads\WSV Website\hintzj.github.io-2\sponsorScroll.txt", "r");
        while(!feof($file)) {
            $line = fgets($file);
            echo "<img src='$line'>\n";
        }
        fclose($file);
        echo "</div>\n
        <div>\n";
        $file = fopen("C:\Users\hintz\Downloads\WSV Website\hintzj.github.io-2\sponsorScroll.txt", "r");
        while(!feof($file)) {
            $line = fgets($file);
            echo "<img src='$line'>\n";
        }
        fclose($file);
        echo "</div>\n
    </logo-slider>";
?>