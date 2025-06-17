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

    /*
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

    */

    function loginUser($username, $password){
        if (checkInputForSQLInjection($username) == false || checkInputForSQLInjection($password) == false) {
            return "Invalid input";
        }
        $conn = connect("private", "read");
        if ($conn === false) {
            return "Error connecting to database";
        }
        $username = trim($username);
        $password = trim($password);

        if($username == "" or $password == ""){
            return "All fields are required";
        }

        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try {
            $stmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
        } catch (Exception $e) {
            $error = $e->getMessage();
            error_logfile($error, debug_backtrace()[0]['file'].":".debug_backtrace()[0]['line']);
            return "Error preparing statement";
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        if($result == NULL){
            return "Username or password is incorrect1";
        }

        if($password != $result['password']){
            return "Username or password is incorrect2";
        } else {
            $_SESSION["user"] = $username;
            header("Location: adminDashboard.php");
            exit();
        }

        /* if(password_verify($password, $result['password']) == FALSE){
            return "Username or password is incorrect";
        } else {
            $_SESSION["user"] = $username;
            header("Location: adminDashboard.php");
            exit();
        } */

    };

    function logoutUser(){
        session_destroy();
        header("Location: login.php");
        exit();
    };

    /*
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
    */
    
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
        if (checkInputForSQLInjection($username) == false || checkInputForSQLInjection($old_password) == false || checkInputForSQLInjection($new_password) == false || checkInputForSQLInjection($confirm_new_password) == false) {
            return "Invalid input";
        }
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

    function newDate($name, $date, $time, $youth){
        if (checkInputForSQLInjection($name) == false || checkInputForSQLInjection($date) == false || checkInputForSQLInjection($time) == false || checkInputForSQLInjection($youth) == false) {
            return "Invalid input";
        }
        $conn = connect("public", "write");
        
        $stmt = $conn->prepare("INSERT INTO termine(terminTitle, terminDate, terminTime, terminType) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $date, $time, $youth);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error creating account, please try again or contact an administrator";
        } else {
            return "success";
        } 
    }

    function editDate($id, $name, $date, $time, $youth){
        if (checkInputForSQLInjection($id) == false || checkInputForSQLInjection($name) == false || checkInputForSQLInjection($date) == false || checkInputForSQLInjection($time) == false || checkInputForSQLInjection($youth) == false) {
            return "Invalid input";
        }
        $conn = connect("public", "write");
        
        $stmt = $conn->prepare("UPDATE termine SET terminTitle = ?, terminDate = ?, terminTime = ?, terminType = ? WHERE terminID = ?");
        $stmt->bind_param("ssssi", $name, $date, $time, $youth, $id);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error updating date, please try again or contact an administrator";
        } else {
            return "success";
        } 
    }

    function newArticle($date, $title, $summary, $text, $isJugendEvent = false, $abteilungID = 0){
        if (checkInputForSQLInjection($date) == false || checkInputForSQLInjection($title) == false || checkInputForSQLInjection($summary) == false || checkInputForSQLInjection($text) == false || !is_numeric($isJugendEvent) || !is_numeric($abteilungID)) {
            return "Invalid input";
        }
        $conn = connect("public", "write");

        $stmt = $conn->prepare("INSERT INTO artikel(date, title, summary, text, artikelType, abteilungID) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $date, $title, $summary, $text, $isJugendEvent, $abteilungID);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error creating account, please try again or contact an administrator";
        } else {
            //if the article was created successfully, return the id of the new article
            $newArticleId = $stmt->insert_id;
            $stmt->close();
            destroyConnection($conn);

            //return the id of the new article
            return $newArticleId; // Return the new article ID
        } 
    }

    function editArticle($id, $date, $title, $summary, $text, $isJugendEvent, $abteilungID = 0){
        if (checkInputForSQLInjection($id) == false || checkInputForSQLInjection($date) == false || checkInputForSQLInjection($title) == false || checkInputForSQLInjection($summary) == false || checkInputForSQLInjection($text) == false || !is_numeric($isJugendEvent) || !is_numeric($abteilungID)) {
            return "Invalid input";
        }
        $conn = connect("public", "write");

        $stmt = $conn->prepare("UPDATE artikel SET date = ?, title = ?, summary = ?, text = ?, artikelType = ?, abteilungID = ? WHERE artikelID = ?");
        $stmt->bind_param("ssssssi", $date, $title, $summary, $text, $isJugendEvent, $abteilungID, $id);
        //echo $stmt;
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error updating article, please try again or contact an administrator";
        } else {
            return "success";
        } 
    }

    function addMultipleArticleImages($id, $files){
        if (checkInputForSQLInjection($id) == false || !is_array($files)) {
            return "Invalid input";
        }

        //print_r($files);

        // If $files is in the $_FILES format, restructure it to an array of file arrays
        if (isset($files['name']) && is_array($files['name'])) {
            //echo "<br>Restructuring files...<br>";
            $restructuredFiles = [];
            foreach ($files['name'] as $key => $name) {
                $restructuredFiles[] = [
                    'name' => $name,
                    'type' => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                ];
            }
        } else {
            $restructuredFiles = $files;
        }
        foreach ($restructuredFiles as $file) {
            //echo "<br>";
            //print_r($file);
            //echo "<br>";
            $result = addArticleImage($id, $file);
            if ($result != "success") {
                return $result; // Return error if any file fails to upload
            }
        }
        return "success"; // Return success if all files are uploaded
    }

    function addArticleImage($id, $file){
        if (checkInputForSQLInjection($id) == false) {
            return "Invalid input";
        }
        $target_dir = "documents/pics/siteImageScroll/artikel/artikel_" . $id . "/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        //print_r($file);
        
        if (!isset($file) || !isset($file["name"]) || !isset($file["tmp_name"])) {
            return "Invalid file input";
        }
        

        $filename = basename($file["name"]);
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        // Check file size
        if ($file["size"] > 100000000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return "Error uploading image";
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return "success";
            } else {
            return "Error uploading image";
            }
        }
    }

    function getArticleDetails($id){
        if (checkInputForSQLInjection($id) == false) {
            return "Invalid input";
        }
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM artikel WHERE artikelID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $article = $result->fetch_assoc();
        destroyConnection($conn);
        return $article;
    }

    function getContactDetails($site = "kontakt.php"){
        if (checkInputForSQLInjection($site) == false) {
            return "Invalid input";
        }
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
        if (isRunningOnLinux()) {
            if ($site == "/") {
                $site = "index.php";
            }
        } else {
            if ($site == "/WSV_Webpage/") {
                $site = "index.php";
            }
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

    function isSuperuser($username){
        if (checkInputForSQLInjection($username) == false) {
            return false; // Invalid input
        }
        $conn = connect("private", "read");
        if($conn == false){
            return false;
        }
        $stmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        if($result == NULL){
            return false;
        } else {
            if($result['superuser'] == 1){
                return true;
            } else {
                return false;
            }
        }
    }

    function getMitgliederInfos() {
        // return a list of all mitgliederInfos saved in the /document/mitgliedsinfos folder
        $dir = "documents/mitgliedsinfos/";
        $files = array();
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $returnFiles[] = $file;
                }
            }
        } else {
            return null;
        }
        $returnFiles = array_diff($files, array('..', '.'));
        //print_r($returnFiles);
        return $returnFiles;
    }

    function deleteMitgliederInfo() {
        echo "deleteMitgliederInfo";
        // delete the selected mitgliederInfo from the /document/mitgliedsinfos folder
        $file = $_GET['file'];
        $file = "documents/mitgliedsinfos/" . $file;
        if (file_exists($file)) {
            unlink($file);
            return true;
        } else {
            return false;
        }
    }

    function newMitgliederInfo($file) {
        // upload a new mitgliederInfo to the /document/mitgliedsinfos folder
        $target_dir = "documents/mitgliedsinfos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 100000000) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "pdf") {
            //echo "Sorry, only PDF is allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                return true;
            } else {
                //echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }
    }

    function getNewestMitgliederInfo() {
        $dir = "documents/mitgliedsinfos/";
        $infos = getMitgliederInfos();
        $newest = null;
        $newestDate = 0;
        foreach ($infos as $info) {
            $file = "documents/mitgliedsinfos/" . $info;
            $fileDate = filemtime($file);
            if ($fileDate > $newestDate) {
                $newestDate = $fileDate;
                $newest = $info;
            }
        }
        if ($newest != null) {
            return $dir . $newest;
        } else {
            return null;
        }
    }

    function getFutureDates() {
        // get all future dates from the database
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM termine WHERE terminDate >= CURDATE() ORDER BY terminDate ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $dates = array();
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row;
        }
        destroyConnection($conn);
        return $dates;
    }

    function getPastDates($num = 5) {
        if (!is_numeric($num) || $num <= 0) {
            return "Invalid number of past dates requested";
        }
        // get all past dates from the database
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM termine WHERE terminDate < CURDATE() ORDER BY terminDate DESC LIMIT ?");
        $stmt->bind_param("i", $num);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $dates = array();
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row;
        }
        destroyConnection($conn);
        return $dates;
    }

    function getDateDetails($id) {
        if (!is_numeric($id)) {
            return "Invalid date ID";
        }
        // get the details of a date by id
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM termine WHERE terminID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $date = $result->fetch_assoc();
        destroyConnection($conn);
        return $date;
    }

    function checkInputForSQLInjection($input) {
        // Check if the input contains any SQL injection patterns
        $patterns = [
            '/\b(SELECT|INSERT|UPDATE|DELETE|DROP|CREATE|ALTER|TRUNCATE|EXECUTE)\b/i',
            '/--/',
            '/;/', 
            '/\b(OR|AND)\b/i'
        ];
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $input)) {
                return false; // Input is unsafe
            }
        }
        return true; // Input is safe
    }

    function getAllSponsors() {
        // Get all sponsors from the database
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM sponsors");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $sponsors = array();
        while ($row = $result->fetch_assoc()) {
            $sponsors[] = $row;
        }
        destroyConnection($conn);
        return $sponsors;
    }

    function uploadSponsorLogo($logo) {
        if (!isset($logo) || !isset($logo["name"]) || !isset($logo["tmp_name"])) {
            return "Invalid file input";
        }

        $target_dir = "documents/pics/sponsorLogos/";
        $target_file = $target_dir . basename($logo["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        // Check file size
        if ($logo["size"] > 10000000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return "Error uploading logo";
        } else {
            if (move_uploaded_file($logo["tmp_name"], $target_file)) {
                return basename($logo["name"]); // Return the name of the uploaded file
            } else {
                return "Error uploading logo";
            }
        }
    }

    function addSponsor($title, $url, $logoFileName) {
        if (checkInputForSQLInjection($title) == false || checkInputForSQLInjection($url) == false || checkInputForSQLInjection($logoFileName) == false) {
            return "Invalid input";
        }
        $conn = connect("public", "write");
        if($conn == false){
            return "Error connecting to database";
        }

        $stmt = $conn->prepare("INSERT INTO sponsors (sponsorName, sponsorUrl, sponsorLogoFile) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $url, $logoFileName);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error adding sponsor, please try again or contact an administrator";
        } else {
            return "success";
        }
    }

    function sponsorExists($sponsorId) {
        if (!is_numeric($sponsorId)) {
            return false; // Invalid input
        }
        $conn = connect("public", "read");
        if($conn == false){
            return false; // Error connecting to database
        }
        $stmt = $conn->prepare("SELECT * FROM sponsors WHERE sponsorID = ?");
        $stmt->bind_param("i", $sponsorId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        destroyConnection($conn);
        return $result->num_rows > 0; // Returns true if sponsor exists, false otherwise
    }

    function getSponsorLogo($sponsorId) {
        if (!is_numeric($sponsorId)) {
            return null; // Invalid input
        }
        $conn = connect("public", "read");
        if($conn == false){
            return null; // Error connecting to database
        }
        $stmt = $conn->prepare("SELECT sponsorLogoFile FROM sponsors WHERE sponsorID = ?");
        $stmt->bind_param("i", $sponsorId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        destroyConnection($conn);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['sponsorLogoFile']; // Return the logo file name
        } else {
            return null; // Sponsor not found
        }
    }

    function deleteSponsor($sponsorId) {
        if (!is_numeric($sponsorId)) {
            return "Invalid sponsor ID"; // Invalid input
        }
        if (!sponsorExists($sponsorId)) {
            return "Sponsor does not exist"; // Sponsor not found
        }
        $conn = connect("public", "write");
        if($conn == false){
            return "Error connecting to database"; // Error connecting to database
        }
        
        $stmt = $conn->prepare("DELETE FROM sponsors WHERE sponsorID = ?");
        $stmt->bind_param("i", $sponsorId);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "Error deleting sponsor, please try again or contact an administrator";
        } else {
            destroyConnection($conn);
            return "success";
        }
    }

    function deleteSponsorLogo($logoFileName) {
        if (checkInputForSQLInjection($logoFileName) == false) {
            return "Invalid input"; // Invalid input
        }
        $filePath = "documents/pics/sponsorLogos/" . $logoFileName;
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                return "success"; // Logo deleted successfully
            } else {
                return "Error deleting logo"; // Error deleting logo
            }
        } else {
            return "Logo file does not exist"; // Logo file not found
        }
    }

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    function getAllAnsprechpartner() {
        // Get all contact persons from the database
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM personen INNER JOIN abteilungen ON abteilungen.obmannID = personen.personID ORDER BY abteilungen.abteilungName ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ansprechpartner = array();
        while ($row = $result->fetch_assoc()) {
            $ansprechpartner[] = $row;
        }
        destroyConnection($conn);
        return $ansprechpartner;
    }

    function isRunningOnLinux() {
        $opSys = php_uname("s");
        if (stripos($opSys, 'Linux') !== false) {
            return true; // Running on Linux
        } else {
            return false; // Not running on Linux
        }
    }

    function getVorstandPeopleDetails($vorstandsID = 1) {
        if (!is_numeric($vorstandsID)) {
            return "Invalid Vorstand ID"; // Invalid input
        }
        // Get the details of the Vorstand members
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $sql = "SELECT * FROM vorstandsmitglieder AS vm
                        INNER JOIN personen AS p ON vm.personID = p.personID
                        INNER JOIN vorstandspositionen AS vp ON p.gender = vp.gender
                            AND vm.positionsID = vp.positionsID 
                        WHERE vm.vorstandID = ?
                        ORDER BY vm.positionsID ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $vorstandsID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $vorstandDetails = array();
        while ($row = $result->fetch_assoc()) {
            if ($row['bildURL'] == "") {
                $row['bildURL'] = "default.png"; // Set default image if no image is set
            }
            $vorstandDetails[] = $row;
        }
        destroyConnection($conn);
        if (empty($vorstandDetails)) {
            return "No Vorstand members found for the given ID";
        } else {
            return $vorstandDetails; // Return the details of the Vorstand members
        }
    }

    function getAllMitgliederInfos() {
        $path = "documents/mitgliedsinfos/";
        if (!is_dir($path)) {
            return "Directory does not exist"; // Directory not found
        }
        $files = scandir($path);
        $returnFiles = array();
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $returnFiles[] = $file; // Add file to the return array
            }
        }
        return $returnFiles;
    }

    function getAbteilungsNews($abteilungsID) {
        if (!is_numeric($abteilungsID)) {
            return "Invalid Abteilungs ID"; // Invalid input
        }
        // Get the news for a specific Abteilung
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT * FROM artikel WHERE abteilungID = ? AND date >= CURRENT_DATE - INTERVAL 30 DAY ORDER BY date DESC");
        $stmt->bind_param("i", $abteilungsID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $news = array();
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
        return $news;
    }

    function getAbteilungenWithWebpage() {
        // Get all Abteilungen that have a webpage
        $conn = connect("public", "read");
        if($conn == false){
            return "Error connecting to database";
        }
        $stmt = $conn->prepare("SELECT abteilungID, abteilungName FROM abteilungen WHERE abteilungsPage IS NOT NULL AND abteilungsPage != ''");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $abteilungen = array();
        while ($row = $result->fetch_assoc()) {
            $abteilungen[] = $row;
        }
        destroyConnection($conn);
        if (empty($abteilungen)) {
            return null; // No Abteilungen with webpages
        } else {
            return $abteilungen; // Return the list of Abteilungen with webpages
        }
    }
?>