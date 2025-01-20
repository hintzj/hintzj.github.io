<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <?php include 'functions.php'; ?>
    <title>Passwort vergessen - WSVL</title>
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
            <h2>Passwort vergessen</h2>
            <p>
                Bitte geben Sie Ihre E-Mail-Adresse ein, um Ihr Passwort zurückzusetzen.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Passwort zurückzusetzen</h4>
            <p>
                <ul>
                    <li>Bitte geben Sie Ihre E-Mail-Adresse ein, um Ihr Passwort zurückzusetzen.</li>
                    <li>Wir senden Ihnen eine E-Mail mit einem Link, um Ihr Passwort zurückzusetzen.</li>
                    <li>Bitte überprüfen Sie Ihren Spam-Ordner, falls Sie keine E-Mail erhalten.</li>
                    <br>
                    
                    <form action="forgotPassword.php" method="post">
                        <label for="email">E-Mail-Adresse:</label>
                        <input type="email" id="email" name="email" placeholder="E-Mail-Adresse" required>
                        <input type="submit" value="Passwort zurücksetzen">
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>