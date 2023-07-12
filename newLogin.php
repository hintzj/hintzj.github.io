<?php
    require 'functions.php';
    include 'defaultHead.php';

    $response = "TESTTESTTEST";

    if(isset($_POST['submit'])){
        $fName = $_POST['firstname'];
        $lName = $_POST['lastname'];
        $bDay = $_POST['birthday'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];

        $result = registerUser($email, $fName, $lName, $bDay, $username, $password, $passwordRepeat);

        echo "<script>console.log('Debug Objects: " . $result . "' );</script>";
        if($result == "success"){
            echo "<script>console.log('Debug Objects: " . $result . "' );</script>";
            //header("location: login.php");
        }else{
            echo "<script>console.log('Debug Objects: " . $result . "' );</script>";
            $response = $result;
        }
    }
?>

<head>
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
                    <form action="" method="post">
                        <label for="firstname">Vorname:</label>
                        <input type="text" name="firstname" id="firstname" required value="<?php echo @$_POST['firstname']; ?>">
                        <br>
                        <label for="lastname">Nachname:</label>
                        <input type="text" name="lastname" id="lastname" required value="<?php echo @$_POST['lastname']; ?>">
                        <br>
                        <label for="birthday">Geburtsdatum:</label>
                        <input type="date" name="birthday" id="birthday" required value="<?php echo @$_POST['birthday']; ?>">
                        <br>
                        <br>
                        <label for="email">E-Mail-Adresse:</label>
                        <input type="email" name="email" id="email" required value="<?php echo @$_POST['email']; ?>">
                        <br>
                        <label for="username">Benutzername:</label>
                        <input type="text" name="username" id="username" required value="<?php echo @$_POST['username']; ?>">
                        <br>
                        <label for="password">Passwort:</label>
                        <input type="password" name="password" id="password" required value="<?php echo @$_POST['password']; ?>">
                        <br>
                        <label for="password">Passwort wiederholen:</label>
                        <input type="password" name="passwordRepeat" id="passwordRepeat" required value="<?php echo @$_POST['passwordRepeat']; ?>">
                        <br>
                        <br>
                        <input type="submit" value="Registrieren" name="submit">
                    </form>
                    <p class="error">
                        <?php echo @$response; ?>
                    </p>
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