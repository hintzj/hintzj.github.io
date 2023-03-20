<!DOCTYPE HTML>
<html> 
         <head>
           <link rel="stylesheet" type="text/css" href="mainstyle.css">
           <link rel="stylesheet" type="text/css" href="dropdown.css">
           <link rel="stylesheet" type="text/css" href="index.css">
           <link rel="icon" type="image/x-icon" href="pics/icon-logo-wsvl.ico">
                 <title>WSV-Lampertheim</title>
                 <style>
                           .logo-image{
                               width: 46px;
                               height: 46px;
                               border-radius: 25%;
                               overflow: hidden;
                               margin-top: -8px;
                               margin-bottom: -20px;
                           }
                  </style>
         </head>
  <body>
        <?php include 'header.php'; ?>
        <div class="content">
            <main>
                  <div class="greeting">
                        <h2>Willkommen auf der Website des WSV-Lampertheim</h2>
                        <p>
                              Kanurennsport und Kanupolo sind es Wert gelieb zu werden. Doch der WSV ist noch
                              viel mehr als nur das. 
                          <br>Hier möchten wir ihnen einen Einlick in unser Leben im Einklang mit dem Wassr geben.
                          <br><img src="pics/logo1.png">
                        </p>

                  </div>
                  <div class="newsblock">
                        <h4>Vereinsnews</h4>

                        <?php
                              $dir = "C:\Users\hintz\Downloads\WSV Website\hintzj.github.io\articles\main\\";
                              $files = scandir($dir, SCANDIR_SORT_NONE);

                              //echo the content of the files in the directory and set the file name as the title
                              foreach ($files as $file) {
                                    if ($file == "." || $file == "..") {
                                          continue;
                                    }
                                    $filename = pathinfo($file, PATHINFO_FILENAME);
                                    echo "<article>
                                          <h3>$filename</h3>
                                          <p>" . file_get_contents($dir . $file) . "</p>";
                              }
                        ?>
                        <article1>
                              <h3>Sieg bei den Schülermeisterschaften in Sandhofen</h3>
                              <p>
                                    Am 17 September 2022 fanden die Schülermeisterschaften im Kanurennsport in Mannheim Sandhofen statt.
                                    <br>Der WSV konnte sich mit vielen Medallien schm&uumlcken
                              </p>
                        </article1>
                        <article2>
                              <h3>Vatertag</h3>
                              <p>
                                          Nach 2 Jahren Ausfall wegen Corona konnte endlich wieder eine Veranstaltung am Vatertag auf unserem Vereinsgel&auml;nde durchgef&uuml;hrt werden.
                                          <br>Vom fr&uuml;hen Morgen bis zum sp&auml;ten Nachmittag str&ouml;mten die Besucher und wurden mit Gegrilltem, Getr&auml;nken, Kaffe und Kuchen versorgt.
                                          <br>Au&szlig;erdem bestand die M&ouml;glichkeit, auf dem Altrhein zu paddeln.
                                          <br>Der Vorstand bedankt sich bei den vielen Helfern, die zum Gelingen beigetragen haben.
                              </p>
                        </article2>
                        <article3>
                                    <h3>Dritter Beispielartikel</h3>
                                    <p>
                                          Hier wird später auch ein Artikel stehen, ich denke es werden hier immer drei Artikel stehen, der rest landet im Archiv
                                    </p>
                        </article3>
                  </div>
                  <div class="text-field" style="background-color: #5F9B81;">
                        <h4>Schnupperzeiten</h4>
                        <p>
                              Bei uns sind neue Gesichter immer Willkommen
                              <ul> Zeitenliste (Muss noch eingefügt werden)</ul>
                        </p>
                  </div>
            </main>
            <?php include "footer.php"; ?>
        </div>

  </body>
</html>
