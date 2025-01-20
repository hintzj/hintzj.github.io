<?php
    require_once 'functions.php';
?>
<div class="text-field5">
<a href="mailto: test@test.com" style="text-decoration: none;">
    <div>
        Kontakt
        <br>
        <p>
            <table style="width: 100%">
                <tr>
                    <td style="width: 45%">
                        <?php
                            $var = $_SERVER['REQUEST_URI'];
                            echo "<img src='" . getContactImage($var) . "' alt='Bild'>";
                        ?>
                    </td>
                    <td>
                        <p>
                            Interesse? Nehmen Sie Kontakt mit uns auf, indem sie hier klicken!
                        </p>
                    </td>
                </tr>
            </table>
        </p>
    </div>
</a>
</div>