<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $response = loginUser($_POST['username'], $_POST['password']);
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Termine verwalten - WSVL</title>
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
            <h2>Termine verwalten</h2>
            <p>
                Willkommen im Administrationsbereich für die Termine der Webseite. Hier kannst du Termine hinzufügen, bearbeiten oder löschen. Bitte wähle einen Termin aus oder erstelle einen neuen Termin, um fortzufahren.
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
            <p>
                <ul>
                    <input type="button" style="background-color: royalblue;" onclick="location.href='adminDashboard.php';" value='Zurück' />
                </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Neuen Termin erstellen</h4>
            <p>
                <ul>
                    <form action="" method="post">
                        <input type="text" name="title" placeholder="Titel" required />
                        <input type="date" name="date" required />
                        <input type="time" name="time" required />
                        <input type="checkbox" name="youthEvent" value="yes"> Jugendveranstaltung
                        <input type="submit" name="submit" value="Termin erstellen">
                    </form>
                </ul>
            </p>
        </div>
        <div class="text-field3">
            <h4>Zukünftige Termine</h4>
            <p>
                <ul>
                    <table>
                        <tr>
                            <th>Titel</th>
                            <th>Datum</th>
                            <th>Uhrzeit</th>
                            <th>Jugendveranstaltung</th>
                        </tr>
                        <tr>
                            <td>Termin 1</td>
                            <td>01.01.2024</td>
                            <td>10:00</td>
                            <td>Ja</td>
                        </tr>
                        <tr>
                            <td>Termin 2</td>
                            <td>02.01.2024</td>
                            <td>11:00</td>
                            <td>Nein</td>
                        </tr>
                    </table>
                </ul>
            </p>
        </div>
        <div class="text-field4">
            <h4>Vergangene Termine</h4>
            <p>
                <ul>
                    <table>
                        <tr>
                            <th>Titel</th>
                            <th>Datum</th>
                            <th>Uhrzeit</th>
                            <th>Jugendveranstaltung</th>
                        </tr>
                        <tr>
                            <td>Termin 1</td>
                            <td>01.01.2023</td>
                            <td>10:00</td>
                            <td>Ja</td>
                        </tr>
                        <tr>
                            <td>Termin 2</td>
                            <td>02.01.2023</td>
                            <td>11:00</td>
                            <td>Nein</td>
                        </tr>
                    </table>
                </ul>
            </p>
        </div>
            
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>