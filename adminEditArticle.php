<?php
    require_once 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

    // get article id
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $articleId = $_GET['id'];
        $articleDetails = getArticleDetails($articleId);
        //print_r($articleDetails);
    } else {
        header("Location: adminArticle.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $title = $_POST["title"];
        $summary = $_POST["summary"];
        $content = $_POST["content"];
        $date = $_POST["date"];
        $isJugendEvent = isset($_POST["isJugendEvent"]) ? 1 : 0;
        $abteilungID = isset($_POST["abteilungID"]) ? $_POST["abteilungID"] : 0;
        $filesToUpload = $_FILES['fileToUpload'];

        // Validate inputs
        if(empty($title) || empty($summary) || empty($content) || is_numeric($abteilungID) == false){
            $response = "Bitte fülle alle Pflichtfelder aus.";
            return;
        }
        
        // Save article to database
        $result = editArticle($articleId, $date, $title, $summary, $content, $isJugendEvent, $abteilungID);
        if(!empty($filesToUpload['name'][0])){
            echo "<br>Hinzufügen von Bildern...";
            print_r($filesToUpload);
            echo "<br>";
            $result = addMultipleArticleImages($articleId, $filesToUpload);
        }
        echo $result;

        if($result == "success"){
            header("location: adminArticle.php");
        }else{
            $response = $result;
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Artikel bearbeiten - WSVL</title>
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
            <h2>Artikel bearbeiten</h2>
            <p>
                Willkommen im Administrationsbereich für die Artikel der Webseite. Hier kannst du den ausgwählten Artikel bearbeiten. Bitte fülle die Felder aus und klicke auf "Artikel speichern", um die Änderungen zu speichern.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminArticle.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Artikel bearbeiten</h4>
            <p>
                <ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="adminTable">
                            <tr>
                                <td><label>Titel: </label></td>
                                <td><input type="text" placeholder="Titel des Artikels" name="title" id="title" value="<?php echo $articleDetails["title"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label>Zusammenfassung: </label></td>
                                <td><textarea placeholder="Zusammenfassung" name="summary" id="summary" required rows="5" cols="60" style="resize: none;" required maxlength="255"><?php echo $articleDetails["summary"]; ?></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Inhalt: </label></td>
                                <td><textarea placeholder="Inhalt" name="content" id="content" required rows="10" cols="60" style="resize: none;" required><?php echo $articleDetails["text"]; ?></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Datum: </label></td>
                                <td><input type="date" name="date" id="date" value="<?php echo $articleDetails["date"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Jugendevent: </label></td>
                                <td><input type="checkbox" name="isJugendEvent" id="isJugendEvent" <?php if($articleDetails["artikelType"]) {echo "checked";} ?>></td>
                            </tr>
                            <tr>
                                <td><label>Abteilung: </label></td>
                                <td>
                                    <select name="abteilungID" id="abteilungID">
                                        <?php
                                            $abteilungen = getAbteilungenWithWebpage();
                                            if(empty($abteilungen)){
                                                echo "<option value='0'>Keine Abteilung gefunden</option>";
                                            }
                                            $abteilungen = array_merge(array(array("abteilungID" => 0, "abteilungName" => "Allgemein")), $abteilungen);
                                            foreach($abteilungen as $abteilung){
                                                $selected = ($articleDetails["abteilungID"] == $abteilung["abteilungID"]) ? "selected" : "";
                                                echo "<option value='" . $abteilung["abteilungID"] . "' " . $selected . ">" . $abteilung["abteilungName"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>   
                            <tr>
                                <td><label>Bilder hinzufügen: </label></td>
                                <td><input type="file" name="fileToUpload[]" id="fileToUpload" accept="image/jpg, image/jpeg" multiple></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Artikel speichern" name="submit"></td>
                            </tr>
                        </table>
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>