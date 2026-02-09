<?php
    require_once 'functions.php';
    $var = $_SERVER['REQUEST_URI'];
    $data = getContactDetails($var);
    if ($data == null) {
        $data = getContactDetails();
    }

    $imagePath = $data[0];
    $firstName = $data[1];
    $lastName = $data[2];
    $email = $data[3];
?>
<div class="text-field5"  id="contactCard">
<a href="mailto: <?php echo $email; ?>" style="text-decoration: none;">
    <div>
        <h4>Kontakt</h4>
        <p>
            <table style="width: 100%">
                <tr>
                    <td style="width: 45%">
                        <?php
                            echo "<img src='documents/pics/personPortraits/" . $imagePath . "' alt='Bild' style='height: 10em; border-radius: 5%;' />";
                        ?>
                    </td>
                    <td>
                        <p>
                            <?php
                                echo "Fragen? Nehmen Sie Kontakt mit <b>" . $firstName . " " . $lastName . "</b> auf, indem sie hier klicken oder schreiben Sie eine E-Mail an <br><b>" . $email . "</b>.";
                            ?>
                        </p>
                    </td>
                </tr>
            </table>
        </p>
    </div>
</a>
</div>