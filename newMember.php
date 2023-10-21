<?php
    require 'functions.php';

    if(isset($_POST['submit'])) {
        $answers = array(
            "anrede" => $_POST['anrede'],
            "vorname" => $_POST['vorname'],
            "name" => $_POST['name'],
            "strasse" => $_POST['strasse'],
            "plz" => $_POST['plz'],
            "ort" => $_POST['ort'],
            "email" => $_POST['email'],
            "telefon" => $_POST['telefon'],
            "geburtstag" => $_POST['geburtstag'],
            "beruf" => $_POST['beruf'],
            "liegeplatz" => $_POST['liegeplatz'],
            "sonderbootPlatz" => $_POST['sonderbootPlatz'],
            "anlegeplatz" => $_POST['anlegeplatz'],
            "start" => $_POST['start'],
            "nameBIC" => $_POST['nameBIC'],
            "iban" => $_POST['iban'],
            "bic" => $_POST['bic'],
            "bank" => $_POST['bank'],
            "checkboxes" => $_POST['checkboxes'],
            "g-recaptcha-response" => $_POST['g-recaptcha-response']
        );

        $response = newMember($answers);

        echo "<script>console.log('{$response}');</script>";
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Mitgliederantrag - WSVL</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>
</head>

<body>
    <script>
        function updateForm() {
            //get the value of the radio buttons "art" and print it to the console
            var art = document.querySelector('input[name="art"]:checked').value;
            console.log(art);

            //if art is "aktiv" then show the "sparte" field else hide it
            if (art == "aktiv") {
                document.getElementById("sparte").style.display = "block";
                document.getElementById("platze").style.display = "block";
            } else {
                document.getElementById("sparte").style.display = "none";
                document.getElementById("platze").style.display = "none";
            }
        }

        function calcCost() {
            var cost = 0;

            var geburtstag = document.getElementById("geburtstag").value;
            var dob = new Date(geburtstag);
            
            //calculate month difference from current date in time
            var month_diff = Date.now() - dob.getTime();
            
            //convert the calculated difference in date format
            var age_dt = new Date(month_diff); 
            
            //extract year from date    
            var year = age_dt.getUTCFullYear();
            
            //now calculate the age of the user
            var alter = Math.abs(year - 1970);
            
            var hauptBeitrag = 0;
            var aufnahmeBeitrag = 0;

            if (alter <= 14) {
                hauptBeitrag = 5.50;
                aufnahmeBeitrag = 2.50;
            } else if (alter < 18) {
                hauptBeitrag = 6.50;
                aufnahmeBeitrag = 5.50;
            } else {
                hauptBeitrag = 7.50;
                aufnahmeBeitrag = 15.50;
            }
            var liegeplatz = document.getElementById("liegeplatz").value;
            var sonderbootPlatz = document.getElementById("sonderbootPlatz").value;
            var anlegeplatz = document.getElementById("anlegeplatz").value;

            cost = (liegeplatz * 3) + (sonderbootPlatz * 6) + (anlegeplatz * 8.50) + hauptBeitrag;

            document.getElementById("beitragBerechnet").innerHTML = cost;
            document.getElementById("aufnahmeBerechnet").innerHTML = aufnahmeBeitrag;
        }
    </script>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting">
            <h2>Mitgliederantrag</h2>
            <p>
                Hier kann jeder Interessierte einen Mitgliedsantrag stellen. Bitte füllen Sie das Formular aus und senden Sie es ab.
            </p>
        </div>
        <div class="text-field1">
            <h4>Antrag</h4>
            <p>
                <ul>
                    <form action="" method="POST">
                        <label for="anrede">Anrede:</label>
                        <select name="anrede">
                            <option value="none">keine Angabe</option>
                            <option value="Herr">Herr</option>
                            <option value="Frau">Frau</option>
                        </select>

                        <br>

                        <label for="vorname">Vorname:</label>
                        <input type="text" name="vorname" placeholder="Vorname" required>
                        
                        <br>

                        <label for="name">Nachname:</label>
                        <input type="text" name="name" placeholder="Name" >

                        <br>

                        <label for="strasse">Straße:</label>
                        <input type="text" name="strasse" placeholder="Straße" required>
                       
                        <br>

                        <label for="plz">PLZ:</label>
                        <input type="text" name="plz" placeholder="PLZ" required>
                      
                        <br>

                        <label for="ort">Ort:</label>
                        <input type="text" name="ort" placeholder="Ort" >

                        <br>

                        <label for="email">E-Mail:</label>
                        <input type="email" name="email" placeholder="E-Mail" required>

                        <br>

                        <label for="telefon">Telefon:</label>
                        <input type="text" name="telefon" placeholder="Telefon">

                        <br>

                        <label for="geburtstag">Geburtstag:</label>
                        <input type="date" name="geburtstag" placeholder="Geburtstag" id="geburtstag" onchange="calcCost()" required>

                        <br>

                        <label for="beruf">Beruf:</label>
                        <input type="text" name="beruf" placeholder="Beruf">

                        <br>

                        <label for="art">Art der Mitgliedschaft:</label>
                        <input type="radio" id="art" name="art" value="aktiv" checked onchange="updateForm()">
                        <label for="art">Aktiv</label>
                        <input type="radio" id="art" name="art" value="passiv" onchange="updateForm()">
                        <label for="art">Passiv</label>

                        <br>

                        <div id="sparte">
                            <label for="sportart">Sparte:</label>
                            <ul>
                            <?php   
                                $conn = connect();
                                if ($conn == false){
                                    throw new Exception("DB Connection failed");
                                }
                                $sql = "SELECT * FROM abteilungen";
                                $result = mysqli_query($conn, $sql);
                                $abteilungen = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                mysqli_free_result($result);
                                mysqli_close($conn);
                                foreach ($abteilungen as $abteilung) {
                                    echo "<input type='checkbox' id='contactChoice1' name='devision' value='" . $abteilung['abteilungName'] . "' />";
                                    echo "<label for='contactChoice1'>" . $abteilung['abteilungName'] . "</label>";  
                                    echo "<br>";                                  
                                }
                            ?>
                            </ul>
                        </div>

                        <div id="platze">
                            <label for="liegeplatz">Liegeplatz:</label>
                            <input type="number" id="liegeplatz" name="liegeplatz" min="0" max="5" value="0" onchange="calcCost()">

                            <label for="sonderbootPlatz">Sonderbootplatz:</label>
                            <input type="number" id="sonderbootPlatz" name="sonderbootPlatz" min="0" max="5" value="0" onchange="calcCost()">

                            <label for="anlegeplatz">Anlegeplatz Motorboot:</label>
                            <input type="number" id="anlegeplatz" name="anlegeplatz" min="0" max="2" value="0" onchange="calcCost()">
                        </div>

                        Mitgliedsbeitrag:
                        <br>
                        <ul>
                        <label for="beitrag">Monatlicher Beitrag:</label>
                        <span id="beitragBerechnet">0</span> €
                        <br>
                        <label for="aufnahmeBeitrag">Aufnahmebeitrag:</label>
                        <span id="aufnahmeBerechnet">0</span> €
                        </ul>
                        <br>

                        <input type="radio" id="interval" name="interval" value="interval">
                        <label for="interval">Ich möchte den Mitgliedsbeitrag monatlich überweisen.</label>

                        <br>

                        <input type="radio" id="interval" name="interval" value="interval">
                        <label for="interval">Ich möchte den Mitgliedsbeitrag viertel-jährlich überweisen.</label>

                        <br>

                        <input type="radio" id="interval" name="interval" value="interval">
                        <label for="interval">Ich möchte den Mitgliedsbeitrag jährlich überweisen.</label>

                        <br>
                        
                        <label for="start">Startdatum</label>
                        <input type="date" id="start" name="start" value="<?php echo date('Y-m-d'); ?>" >
                        
                        <br>
                        
                        <label for="nameAccount">Kontoinhaber:</label>
                        <input type="text" name="nameBIC" placeholder="Kontoinhaber" required>

                        <br>
                        
                        <label for="iban">IBAN:</label>
                        <input type="text" name="iban" placeholder="IBAN" required>

                        <br>
                        
                        <label for="bic">BIC:</label>
                        <input type="text" name="bic" placeholder="BIC" >
                        
                        <br>
                        
                        <label for="bank">Bank:</label>
                        <input type="text" name="bank" placeholder="Bank" >
                        
                        <br>
                        
                        <input type="checkbox" id="agb" name="checkboxes[]" value="" >
                        <label for="agb">Ich habe die <a href="agb.php">AGB</a> gelesen und akzeptiere diese.</label>
                        
                        <br>
                        
                        <input type="checkbox" id="datenschutz" name="checkboxes[]" value="" >
                        <label for="datenschutz">Ich habe die <a href="datenschutz.php">Datenschutzerklärung</a> gelesen und akzeptiere diese.</label>
                        
                        <br>
                        
                        <input type="checkbox" id="mitgliedsbeitrag" name="checkboxes[]" value="" >
                        <label for="mitgliedsbeitrag">Ich bin damit einverstanden, dass der Mitgliedsbeitrag von meinem Konto abgebucht wird.</label>
                        
                        <br>
                        <br>

                        <div class="signWrapper">
                            <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                        </div>

                        <button id="save-svg">Save as SVG</button>
                        <button id="undo">Undo</button>
                        <button id="clear">Clear</button>
                        
                        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
                        <script src="libs/signBox.js"></script>
                        
                        <br>
                        <br>

                        <input type="checkbox" id="newsletter" name="checkboxes[]" value="newsletter">
                        <label for="newsletter">Ich möchte den Newsletter erhalten.</label>
                        
                        <br>
                        <br>
                        
                        <div
                            class="g-recaptcha"
                            data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
                            data-callback="onRecaptchaSuccess"
                            data-expired-callback="onRecaptchaResponseExpiry"
                            data-error-callback="onRecaptchaError"
                            >
                        </div>
                        
                        <br>
                        <br>
                        
                        <input type="submit" value="Verbindlich Absenden" name="submit">

                        <script>

                        </script>
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>
</body>

</html>