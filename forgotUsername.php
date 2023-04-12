<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Benutzername vergessen - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting-jgn">
            <h2>Benutzername vergessen</h2>
            <p>
                Bitte geben Sie Ihre E-Mail-Adresse ein, um Ihren Benutzernamen zurückzusetzen.
            </p>
        </div>
        <div class="text-field">
            <h4>Benutzername zurücksetzen</h4>
            <p>
                <ul>
                    <li>Bitte geben Sie Ihre E-Mail-Adresse ein, um Ihren Benutzernamen zurückzusetzen.</li>
                    <li>Wir senden Ihnen eine E-Mail mit Ihrem Benutzernamen.</li>
                    <li>Bitte überprüfen Sie Ihren Spam-Ordner, falls Sie keine E-Mail erhalten.</li>
                    <br>
                    
                    <form action="forgotUsername.php" method="post">
                        <label for="email">E-Mail-Adresse:</label>
                        <input type="email" id="email" name="email" placeholder="E-Mail-Adresse" required>
                        <input type="submit" value="Benutzername zurücksetzen">
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>

</body>

</html>