<?php
    require 'config.php';
    require 'utils.php';

    function connect($type = "public", $access = "read"){
        try{
            if ($type == "public" and $access == "read") {
                //echo "public read";
                $username = publicReadUsername;
                $password = publicReadPassword;
                $database = publicDatabase;
            } else if ($type == "public" and $access == "write") {
                //echo "public write";
                $username = publicWriteUsername;
                $password = publicWritePassword;
                $database = publicDatabase;
            } else if ($type == "private" and $access == "read") {
                //echo "private read";
                $username = privateReadUsername;
                $password = privateReadPassword;
                $database = privateDatabase;
            } else if ($type == "private" and $access == "write") {
                //echo "private write";
                $username = privateWriteUsername;
                $password = privateWritePassword;
                $database = privateDatabase;
            } else {
                throw new Exception("Invalid database type");
            }

            try{
                $conn = new mysqli(server, $username, $password, $database);
            } catch(Exception $e){
                $error = $e->getMessage();
                //echo "Error: " . $error;
                error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
                return false;
            }
            
        } catch(Exception $e){
            $error = $e->getMessage();
            error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
            return false;
        }        
        return $conn;
    };

    function destroyConnection($conn){
        $conn->close();
    };

    function newMember($answers){
        print_r($answers);
        $conn = connect("private");
        if($conn == false){
            return "Error connecting to database";
        }

        $anrede = $answers['anrede'];
        $vorname = $answers['vorname'];
        $name = $answers['name'];
        $strasse = $answers['strasse'];
        $plz = $answers['plz'];
        $ort = $answers['ort'];
        $email = $answers['email'];
        $geburtstag = $answers['geburtstag'];
        $beruf = $answers['beruf'];
        
    }

    /*
    function newMember($anrede, $vorname, $name, $strasse, $plz, $ort, $email, $geburtstag, $beruf, $devision, $liegeplatz, $sonderbootPlatz, $anlegeplatz, $startDate, $accountName, $bic, $bank, $checkboxes, $recaptcha) {
        $conn = connect("private");
        if($conn == false){
            return "Error connecting to database";
        }
        $args = func_get_args();

        $args = array_map(function($value){
            return trim($value);
        }, $args);

        return $args;
    }
    */

   /* 
   function registerUser($email, $fName, $lName, $birthday, $username, $password, $confirm_password){
        $conn = connect("private");
        if($conn == false){
            return "Error connecting to database";
        }
        $args = func_get_args();

        $args = array_map(function($value){
            return trim($value);
        }, $args);

        foreach($args as $arg){
            if(empty($arg)){
                return "All fields are required";
            }
        }

        foreach($args as $arg){
            if(preg_match("/([<|>])/i", $arg)){
                return "Invalid characters used";
            }
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Invalid email address";
        }

        $stmt = $conn->prepare("SELECT * FROM users WHERE EXISTS (SELECT * FROM mitglieder WHERE email = ?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        if($result != NULL) {
            return "Email address already in use";
        }

        if(strlen($username) > 50){
            return "Username must be less than 50 characters";
        }

        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        if($result != NULL) {
            return "Username already in use";
        }

        if(strlen($password) > 255 and strlen($password) < 8){
            return "Password must be between 8 and 255 characters";
        }

        if($password != $confirm_password){
            return "Passwords do not match";
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        //get the mitgliedID from the mitglieder table by searching for the email, first name, last name, and birthday
        $stmt = $conn->prepare("SELECT mitgliedID FROM mitglieder WHERE email = ? AND vorname = ? AND nachname = ? AND geburtsdatum = ?");
        $stmt->bind_param("ssss", $email, $fName, $lName, $birthday);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        if($result == NULL){
            return "Error creating account, please try again";
        }

        //echo $result;

        $userID = $result['mitgliedID'];

        destroyConnection($conn);

        $conn = connect("private", "write");
        if($conn == false){
            return "Error connecting to database";
        }

        $stmt = $conn->prepare("INSERT INTO users (mitgliedID, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $userID, $username, $password);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error creating account, please try again or contact an administrator";
        } else {
            return "success";
        }
    };

    function loginUser($username, $password){
        $conn = connect("private");
        $username = trim($username);
        $password = trim($password);

        if($username == "" or $password == ""){
            return "All fields are required";
        }

        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        if($result == NULL){
            return "Username or password is incorrect";
        }

        if(password_verify($password,$result['password']) == FALSE){
            return "Username or password is incorrect";
        } else {
            $_SESSION["user"] = $username;
            header("Location: account.php");
            exit();
        }

    };

    function logoutUser(){
        session_destroy();
        header("Location: login.php");
        exit();
    };

    function passwordReset($email){
        $conn = connect("private");
        $email = trim($email);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Invalid email address";
        }

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();

        if($result == NULL){
            return "Email address not found";
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password_len = 8;
        $newPass = substr(str_shuffle($characters), 0, $password_len);

        $subject = "Password Reset WSV Lampertheim";
        $message = "Your new password is: {$newPass}";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" .  "\r\n";
        $headers .= "From: Admin \r\n";

        $send = mail($email, $subject, $message, $headers);
        if($send == FALSE){
            return "Error sending email";
        } else {
            $newPass = password_hash($newPass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $newPass, $email);
            $stmt->execute();
            if($stmt->affected_rows != 1){
                return "Error updating password";
            } else {
                return "success";
            }
        }

    };

    function deleteAccount(){
        $conn = connect("private");
        $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['user']);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error deleting account";
        } else {
            session_destroy();
            header("location: delete-message.php");
            exit();

        }
    };

    function changePassword($username, $old_password, $new_password, $confirm_new_password){
        $conn = connect("private");
        $username = trim($username);
        $old_password = trim($old_password);
        $new_password = trim($new_password);
        $confirm_new_password = trim($confirm_new_password);

        if($old_password == "" or $new_password == "" or $confirm_new_password == ""){
            return "All fields are required";
        }

        $old_password = filter_var($old_password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_password = filter_var($new_password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirm_new_password = filter_var($confirm_new_password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();

        if($result == NULL){
            return "Error changing password";
        }

        if(password_verify($old_password,$result['password']) == FALSE){
            return "Old password is incorrect";
        }

        if(strlen($new_password) > 255 and strlen($new_password) < 8){
            return "Password must be between 8 and 255 characters";
        }

        if($new_password != $confirm_new_password){
            return "Passwords do not match";
        }

        $new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $new_password, $username);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error changing password";
        } else {
            return "success";
        }
    };
*/
    function newDate($name, $date){
        $conn = connect("public", "write");
        
        $stmt = $conn->prepare("INSERT INTO termine(terminTitle, terminDate) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $date);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error creating account, please try again or contact an administrator";
        } else {
            return "success";
        } 
    }

    function newArticle($date, $title, $summary, $text){
        $conn = connect("public", "write");

        $stmt = $conn->prepare("INSERT INTO termine(date, title, summary, text) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $date, $title, $summary, $text);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error creating account, please try again or contact an administrator";
        } else {
            return "success";
        } 
    }

    function getContactImage($site = "kontakt.php"){
        $site = basename($site, ".php");

        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT bildURL, Vorname, Nachname, email FROM personen AS p INNER JOIN contactperson AS c ON p.personID = c.personID WHERE site = ?");
        $stmt->bind_param("s", $site);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();

        if($result == NULL){
            return null;
        } else {
            if ($result['bildURL'] == "") {
                $result['bildURL'] = "default.png";
            }
            return [$result['bildURL'],  $result['Vorname'], $result['Nachname'], $result['email']];
        }
    }

    function getSiteImages($site = "index.php"){
        $postID = null;
        if (str_contains($site, "?")) {
            $postID = explode("?", $site)[1];
            $postID = explode("=", $postID)[1];
            $site = explode("?", $site)[0];
        }
        //echo $site;
        //echo "<br>";
        $site = clean($site);
        //echo $site;
        //echo "<br>";
        if ($site == "artikel") {
            //echo "..................................";
            $site = $site . "/" . $site;
        }
        if ($postID != null) {
            $site = $site . "_" . $postID;
        }
        $dir = "documents/pics/siteImageScroll/" . $site . "/";
        //echo $dir;
        $images = array();
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $images[] = $dir . $file;
                }
            }
        } else {
            return null;
        }
        return $images;
    }

    function clean($site) {
        if ($site == "/WSV_Webpage/") {
            $site = "index.php";
        }
            
        //look if there is a folder with the name of the site in documents/pics/siteImageScroll
        $site = strtolower($site);
        //echo $site;
        $position = strpos($site, '.');
        // Extract the part of the string before the comma
        $site = substr($site, 0, $position);

        //echo $site;

        $parts = explode("/", $site);

        //print_r($parts);

        $site = end($parts);

        return $site;
     }
?>