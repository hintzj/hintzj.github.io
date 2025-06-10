<?php
    require 'functions.php';

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        exit();
    } else {
        $username = $_SESSION['user'];
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Admin Dashboard - WSVL</title>
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
            <h2>Administrator Dashboard</h2>
            <p>
                Willkommen im Administrationsbereich des WSV Lampertheim. Hier kannst du auf alle administrativen Funktionen zugreifen und die Website verwalten. Bitte wähle eine der folgenden Optionen aus, um fortzufahren.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Funktionen</h4>
            <p>
                <ul>
                    <input type="button" onclick="location.href='adminDate.php';" value="Termine verwalten" />
                    <br>
                    <br>
                    <input type="button" onclick="location.href='adminArticle.php';" value="News/Artikel verwalten" />
                    <br>
                    <br>
                    <input type="button" onclick="location.href='adminMitgliederinfo.php';" value="Mitgliederinfos verwalten" />
                    <br>
                    <br>
                    <input type="button" onclick="location.href='adminSponsor.php';" value="Sponsoren verwalten" />
                    <?php
                        if (isSuperuser($username)) {
                            //echo "<br>";
                            //echo "<br>";
                            //echo "<input type='button' onclick=\"location.href='adminUser.php';\" value='Benutzer verwalten' />";
                        }
                    ?>
                    <br>
                    <br>
                    <input type="button" style="background-color: crimson;" onclick="" value="Logout" />
                    <script>
                        document.querySelector('input[type="button"][value="Logout"]').addEventListener('click', function() {
                            window.location.href = 'logout.php';
                        });
                    </script>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>