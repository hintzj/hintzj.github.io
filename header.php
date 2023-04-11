<!-- This is the header of the website. It is included in all pages of the website. -->
<!-- The header is the same on all pages, so it is easier to maintain it in one file. -->

<?php
    echo "<header>
        <div class='header'>
            <img src='pics/logo1.png'>
            <h1>Wassersportverein Lampertheim 1929 e.V.</h1>
            <nav>
            <div class='navbar'>                   
                    <a href='index.php'>Startseite</a>
    <!--dropdown für die Abteilungen-->
                        <div class='dropdown-abt'>
                                <button class='dropbtn-abt'>Abteilungen
                                    <i class='fa fa-caret-down'></i>
                                </button>
                                <div class='dropdown-content-abt'>
                                    <a href='kanurennsport.php'>Wettkampfsport</a>
                                    <a href='fitnesssport.php'>Fitnesssport</a>
                                    <a href='kinderturnen.php'>Kinderturnen</a>
                                    <a href='kindeswohl.php'>Kindeswohl</a>
                                </div>
                        </div>
    <!-- dropdown für Unser verein-->
                        <div class='dropdown-uVn'>
                                <button class='dropbtn-uVn'>Unser Verein
                                    <i class='fa fa-caret-down'></i>
                                </button>
                                <div class='dropdown-content-uVn'>
                                    <a href='archiv.php'>Archiv</a>
                                    <a href='termine.php'>Termine</a>
                                    <a href='vorstand.php'>Vorstand</a>
                                    <a href='sponsors.php'>Sponsoren und Förderung</a>
                                    <a href='links.php'>Nützliche Links</a>
                                </div>
                        </div>
    <!-- dropdown für Vereinsjugend-->
                        <div class='dropdown-jgn'>
                                <button class='dropbtn-jgn'>Vereinsjugend
                                    <i class='fa fa-caret-down'></i>
                                </button>
                                <div class='dropdown-content-jgn'>
                                    <a href='jugendvorstand.php'>Jugendvorstand</a>
                                    <a href='jugendnews.php'>Jugendnews</a>
                                </div>
                        </div>
                        <a href='https://www.facebook.com/wsvla' class='socialbtn'><i class='fa fa-facebook'></i></a>
                        <a href='https://www.instagram.com/wsv_lampertheim_1929/' class='socialbtn'><i class='fa fa-instagram'></i></a>
                        
            </div>
            </nav>
        </div>
    </header>";