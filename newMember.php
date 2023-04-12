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
        function calcCost() {
            var cost = 0;
            var geburtstag = document.getElementById("geburtstag").value;
            var alter = new Date().getDay - new Date(geburtstag).getDay;
            var liegeplatz = document.getElementById("liegeplatz").value;
            var sonderbootPlatz = document.getElementById("sonderbootPlatz").value;
            var anlegeplatz = document.getElementById("anlegeplatz").value;
            cost = (liegeplatz * 100) + (sonderbootPlatz * 100) + (anlegeplatz * 100);
            document.getElementById("beitragBerechnet").innerHTML = cost;
            console.log(alter);
        }
    </script>
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="greeting-jgn">
            <h2>Mitgliederantrag</h2>
            <p>
                Hier kann jeder Interessierte einen Mitgliedsantrag stellen. Bitte füllen Sie das Formular aus und senden Sie es ab.
            </p>
        </div>
        <div class="text-field">
            <h4>Antrag</h4>
            <p>
                <form method="POST">
                    <label for="anrede">Anrede:</label>
                    <select name="anrede">
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                        <option value="none">keine Angabe</option>
                    </select>

                    <br>

                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Name">

                    <label for="vorname">Vorname:</label>
                    <input type="text" name="vorname" placeholder="Vorname">

                    <br>

                    <label for="strasse">Straße:</label>
                    <input type="text" name="strasse" placeholder="Straße">

                    <label for="plz">PLZ:</label>
                    <input type="text" name="plz" placeholder="PLZ">

                    <label for="ort">Ort:</label>
                    <input type="text" name="ort" placeholder="Ort">

                    <br>

                    <label for="email">E-Mail:</label>
                    <input type="email" name="email" placeholder="E-Mail">

                    <label for="telefon">Telefon:</label>
                    <input type="text" name="telefon" placeholder="Telefon">

                    <br>

                    <label for="geburtstag">Geburtstag:</label>
                    <input type="date" name="geburtstag" placeholder="Geburtstag" id="geburtstag" onchange="calcCost()">

                    <label for="beruf">Beruf:</label>
                    <input type="text" name="beruf" placeholder="Beruf">

                    <br>

                    <label for="sportart">Sparte:</label>

                    <input type="checkbox"  name="devision" value="kanurennsport" />
                    <label for="contactChoice1">Kanurennsport</label>

                    <input type="checkbox" id="contactChoice2" name="devision" value="kanupolo" />
                    <label for="contactChoice2">Kanupolo</label>

                    <input type="checkbox" id="contactChoice3" name="devision" value="sauna" />
                    <label for="contactChoice3">Sauna</label>

                    <br>

                    <label for="liegeplatz">Liegeplatz:</label>
                    <input type="number" id="liegeplatz" name="liegeplatz" min="0" max="5" value="0" onchange="calcCost()">

                    <label for="sonderbootPlatz">Sonderbootplatz:</label>
                    <input type="number" id="sonderbootPlatz" name="sonderbootPlatz" min="0" max="5" value="0" onchange="calcCost()">

                    <label for="anlegeplatz">Anlegeplatz Motorboot:</label>
                    <input type="number" id="anlegeplatz" name="anlegeplatz" min="0" max="2" value="0" onchange="calcCost()">

                    <br>

                    Mitgliedsbeitrag:
                    <br>
                    <label for="beitrag">Beitrag:</label>
                    <span id="beitragBerechnet"></span>
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
                    <input type="date" id="start" name="start" value="<?php echo date('Y-m-d'); ?>" />
                    
                    <br>
                    
                    <label for="nameAccount">Name des Kontoinhabers:</label>
                    <input type="text" name="nameBIC" placeholder="Name des Kontoinhabers">
                    
                    <label for="iban">IBAN:</label>
                    <input type="text" name="iban" placeholder="IBAN">
                    
                    <label for="bic">BIC:</label>
                    <input type="text" name="bic" placeholder="BIC">
                    
                    <br>
                    
                    <label for="bank">Bank:</label>
                    <input type="text" name="bank" placeholder="Bank">
                    
                    <br>
                    
                    <input type="checkbox" id="agb" name="agb" value="agb">
                    <label for="agb">Ich habe die <a href="agb.php">AGB</a> gelesen und akzeptiere diese.</label>
                    
                    <br>
                    
                    <input type="checkbox" id="datenschutz" name="datenschutz" value="datenschutz">
                    <label for="datenschutz">Ich habe die <a href="datenschutz.php">Datenschutzerklärung</a> gelesen und akzeptiere diese.</label>
                    
                    <br>
                    
                    <input type="checkbox" id="mitgliedsbeitrag" name="mitgliedsbeitrag" value="mitgliedsbeitrag">
                    <label for="mitgliedsbeitrag">Ich bin damit einverstanden, dass der Mitgliedsbeitrag von meinem Konto abgebucht wird.</label>
                    
                    <br>
                    <br>
                    
                    <input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
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
                    
                    <input type="submit" value="Verbindlich Absenden">
                </form>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>

</body>

</html>