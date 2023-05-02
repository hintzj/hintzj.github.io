<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Passwort vergessen - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>Passwort vergessen</h2>
            <p>
                Bitte geben Sie Ihre E-Mail-Adresse ein, um Ihr Passwort zurückzusetzen.
            </p>
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