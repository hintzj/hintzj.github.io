<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Neues Benutzerkonto - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>Neues Benutzerkonto</h2>
            <p>
                Hier können Sie ein neues Benutzerkonto erstellen. Bitte füllen Sie alle Felder aus.
            </p>
        </div>
        <div class="text-field1">
            <h4>Neues Benutzerkonto</h4>
            <p>
                <ul>
                    <form action="newLogin.php" method="post">
                        <label for="firstname">Vorname:</label>
                        <input type="text" name="firstname" id="firstname" required>
                        <br>
                        <label for="lastname">Nachname:</label>
                        <input type="text" name="lastname" id="lastname" required>
                        <br>
                        <label for="birthday">Geburtsdatum:</label>
                        <input type="date" name="birthday" id="birthday" required>
                        <br>
                        <br>
                        <label for="email">E-Mail-Adresse:</label>
                        <input type="email" name="email" id="email" required>
                        <br>
                        <label for="username">Benutzername:</label>
                        <input type="text" name="username" id="username" required>
                        <br>
                        <label for="password">Passwort:</label>
                        <input type="password" name="password" id="password" required>
                        <br>
                        <label for="password">Passwort wiederholen:</label>
                        <input type="password" name="password" id="password" required>
                        <br>
                        <br>
                        <input type="submit" value="Registrieren">
                    </form>
                    <br>
                    <a href='login.php'>Bereits Mitglied? Hier einloggen!</a>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>