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
                            <a href='kanurennsport.php'><i class='fa fa-trophy' aria-hidden='true'></i> Wettkampfsport</a>
                            <a href='fitnesssport.php'><i class='fa fa-heartbeat' aria-hidden='true'></i> Fitnesssport</a>
                            <a href='motorboot.php'><i class='fa fa-ship' aria-hidden='true'></i> Motorboot</a>
                            <a href='kinderturnen.php'><i class='fa fa-grav' aria-hidden='true'></i> Kinderturnen</a>
                            <a href='kindeswohl.php'><i class='fa fa-child' aria-hidden='true'></i> Kindeswohl</a>
                            <a href='kultur.php'><i class='fa fa-users' aria-hidden='true'></i> Kultur</a>
                        </div>
                    </div>
                    <!-- dropdown für Unser verein-->
                    <div class='dropdown-uVn'>
                        <button class='dropbtn-uVn'>Unser Verein
                            <i class='fa fa-caret-down'></i>
                        </button>
                        <div class='dropdown-content-uVn'>
                            <a href='news.php'><i class='fa fa-newspaper-o' aria-hidden='true'></i> News</a>
                            <a href='archiv.php'><i class='fa fa-archive' aria-hidden='true'></i> Archiv</a>
                            <a href='termine.php'><i class='fa fa-calendar-o' aria-hidden='true'></i> Termine</a>
                            <a href='vorstand.php'><i class='fa fa-sitemap' aria-hidden='true'></i> Vorstand</a>
                            <a href='sponsors.php'><i class='fa fa-money' aria-hidden='true'></i> Sponsoren und Förderung</a>
                            <a href='links.php'><i class='fa fa-link' aria-hidden='true'></i> Nützliche Links</a>
                            <a href='login.php'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>
                        </div>
                    </div>
                    <!-- dropdown für Vereinsjugend-->
                    <div class='dropdown-jgn'>
                        <button class='dropbtn-jgn'>Vereinsjugend
                            <i class='fa fa-caret-down'></i>
                        </button>
                        <div class='dropdown-content-jgn'>
                            <a href='jugendvorstand.php'><i class='fa fa-sitemap' aria-hidden='true'></i> Jugendvorstand</a>
                            <a href='jugendnews.php'><i class='fa fa-newspaper-o' aria-hidden='true'></i> Jugendnews</a>
                        </div>
                    </div>
                   <!-- dropdown for etc -->
                   <div class='dropdown-etc'>
                        <button class='dropbtn-etc'>
                            <i class='fa fa-bars-'></i>
                        </button>
                        <div class='dropdown-content-etc'>
                            <a href='kontakt.php'><i class='fa fa-address-card' aria-hidden='true'></i></a>
                            <a href='https://www.facebook.com/wsvla' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-facebook'></i></a>
                            <a href='https://www.instagram.com/wsv_lampertheim_1929/' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-instagram'></i></a>
                            <a href='https://sportinn.eu/WSV-Lampertheim' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
                            <a href='https://www.kanu.de/Vereine-53574.html' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-link' aria-hidden='true'></i></a>
                            <a href='' class='socialbtn'><i class='fa fa-search' aria-hidden='true'></i></a>
                            <!-- ^^^^ Search button -> Matteos AUfgabe den irgendwie zu machen -->
                            <a> <button class='themebtn' id='mode-switch'><i id='themeIcon' class='fa fa-moon-o' aria-hidden='true'></i></button></a>
                        </div>
                    </div>
                    <script> 
                    var modeSwitch = document.getElementById('mode-switch'); 
                    var toggeled = false;                
                    modeSwitch.addEventListener('click', function() {
                        if(toggeled){
                        document.getElementById('colors').href = 'WhMoColors.css';
                        document.getElementyById('themeIcon').class = 'fa fa-moon-o';
                        toggeled = false;
                        }else{
                            document.getElementById('colors').href = 'DaMoColors.css';
                            document.getElementyById('themeIcon').class = 'fa fa-sun-o';
                            toggeled = true;
                        }
                    });
                    </script>
                    
            </div>
            </nav>
        </div>
    </header>";
?>