<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Log In - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>Mitgliederbereich</h2>
            <p>
                Bitte loggen Sie sich ein, um den Mitgliederbereich zu betreten.
                Im Mitgliederbereich finden Sie unter anderem nicht die Mitgliederliste, die Satzung und die Beitragsordnung.
            </p>
        </div>
        <div class="text-field1">
            <h4>Log In</h4>
            <p>
                <ul>
                <form action="login.php" method="post">
                    <label for="username">Benutzername:</label>
                    <input type="text" name="username" id="username" required>
                    <br>
                    <label for="password">Passwort:</label>
                    <input type="password" name="password" id="password" required>
                    <br>
                    <input type="submit" value="Log In">
                </form>
                <br>
                <a href='forgotPassword.php'>Passwort vergessen?</a>
                <br>
                <a href='forgotUsername.php'>Benutzername vergessen?</a>
                <br>
                <br>
                <a href='newLogin.php'>Neu hier? Jetzt Mitglied werden!</a>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>