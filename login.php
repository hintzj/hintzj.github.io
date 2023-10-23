<?php
    require 'functions.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = loginUser($username, $password);

        if($result == "success"){
            header("location: account.php");
        }else{
            $response = $result;
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Log In - WSVL</title>
</head>

<body>
    <?php include 'header.php'; ?>
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
            <h2>Mitgliederbereich</h2>
            <p>
                Bitte loggen Sie sich ein, um den Mitgliederbereich zu betreten.
                Im Mitgliederbereich finden Sie unter anderem nicht die Mitgliederliste, die Satzung und die Beitragsordnung.
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Log In</h4>
            <p>
                <ul>
                <form action="" method="post">
                    <label for="username">Benutzername:</label>
                    <input type="text" name="username" id="username" required value="<?php echo @$_POST['username']; ?>">
                    <br>
                    <label for="password">Passwort:</label>
                    <input type="password" name="password" id="password" required value="<?php echo @$_POST['password']; ?>">
                    <br>
                    <input type="submit" value="Log In" name="submit">
                </form>
                <p class="error">
                    <?php echo @$response; ?>
                </p>
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