<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $url = $_POST['url'];
        //print_r($_FILES);
        $logo = $_FILES['logo'];

        // Validierung der Eingaben
        if(empty($title)){
            echo "<script>alert('Bitte gib einen Namen für den Sponsor ein.');</script>";
        } else {
            if (!isset($url) || empty($url)) {
                $url = ''; // Standardwert für URL, falls nicht angegeben
            }

            // if logo is not set, call uploadSponsorLogo with null
            if (!isset($logo) || $logo['error'] != 0) {
                $logo = null; // Kein Logo hochgeladen
            } else {
                // Logo hochladen
                $logoFileName = '';
                if($logo['error'] == 0){
                    $logoFileName = uploadSponsorLogo($logo);
                    if(!$logoFileName){
                        echo "<script>alert('Fehler beim Hochladen des Logos.');</script>";
                    }
                }
            }
            
            // Sponsor in die Datenbank einfügen
            if(addSponsor($title, $url, $logoFileName)){
                echo "<script>alert('Sponsor erfolgreich erstellt.');</script>";
                header("Location: adminSponsor.php");
            } else {
                echo "<script>alert('Fehler beim Erstellen des Sponsors.');</script>";
            }
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Sponsoren verwalten - WSVL</title>
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
            <h2>Sponsoren verwalten</h2>
            <p>
                Willkommen im Administrationsbereich für die Sponsoren des Vereins. Hier kannst du Sponsoren hinzufügen, bearbeiten oder löschen. Bitte wähle einen Sponsor aus oder erstelle einen neuen Sponsor, um fortzufahren.
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminDashboard.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Neuen Sponsor erstellen</h4>
            <p>
                <ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        Name: <input type="text" name="title" placeholder="Name des Sponsors" required />
                        <br>
                        <br>
                        Link: <input type="url" name="url" placeholder="https://www.beispiel.de" />
                        <br>
                        <br>
                        Logo: <input type="file" name="logo" accept="image/png, image/jpg, image/jpeg" />
                        <br>
                        <br>
                        <input type="submit" name="submit" value="Sponsor erstellen">
                    </form>
                </ul>
            </p>
        </div>
        <div class="text-field2">
            <h4>Aktuelle Sponsoren</h4>
            <p>
                <ul>
                    <table class="adminTable" style="word-break: break-word;">
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Logo</th>
                            <th>Löschen</th>
                        </tr>
                        <?php
                            $sponsors = getAllSponsors();
                            if($sponsors){
                                foreach($sponsors as $sponsor){
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($sponsor['sponsorName']) . "</td>";
                                    echo "<td><a href='" . htmlspecialchars($sponsor['sponsorUrl']) . "' target='_blank'>" . htmlspecialchars($sponsor['sponsorUrl']) . "</a></td>";
                                    if (empty($sponsor['sponsorLogoFile'])) {
                                        echo "<td>Kein Logo vorhanden</td>";
                                    } else {
                                        echo "<td><img src='documents/pics/sponsorLogos/" . htmlspecialchars($sponsor['sponsorLogoFile']) . "' alt='Logo' style='width: 50px; height: auto;'></td>";
                                    }
                                    echo "<td><input type='button' style='background-color: red;' onclick=\"location.href='deleteSponsor.php?id=" . $sponsor['sponsorID'] . "';\" value='Löschen' /></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Keine Sponsoren gefunden.</td></tr>";
                            }
                        ?>
                    </table>
                </ul>
            </p>
        </div>
            
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>