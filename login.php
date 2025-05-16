<?php
    require 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Admin Login - WSVL</title>
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
            <h2>Administrator Login</h2>
            <p>
                Hier kannst du dich als Administrator einloggen. Bitte gib deine Zugangsdaten ein, um auf die Administrationsseite zuzugreifen.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Login</h4>
            <p>
                <ul>
                    <form action="adminDashboard.php" method="post">
                            <label for="username">Benutzername:</label>
                            <input type="text" id="username" name="username" required>
                            <br>
                            <label for="password">Passwort:</label>
                            <input type="password" id="password" name="password" required>
                            <br>
                            <button type="submit">Einloggen</button>
                        </li>
                    </form>
                    <br>
                    <br>
                    <button onclick="alert('Bitte kontaktiere den Administrator, wenn du Probleme beim Einloggen hast.');">Passwort vergessen?</button>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>