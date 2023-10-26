<!-- This is the header of the website. It is included in all pages of the website. -->
<!-- The header is the same on all pages, so it is easier to maintain it in one file. -->

<?php
    echo "<header>
        <div class='header'>
            <a href='index.php'>
                <img src='documents/pics/logo1.png'>
            </a>
            <div>
            <h1>&nbsp;&nbsp;Wassersportverein Lampertheim 1929 e.V.</h1>
            </div>
            <nav>
            <div class='navbar'>                   
                    <a href='index.php'>Startseite</a>
        	        <!--dropdown für die Abteilungen-->
                    <div class='dropdown-abt'>
                        <button class='dropbtn-abt'>
                            Abteilungen <i class='fa fa-caret-down'></i>
                        </button>
                        <div class='dropdown-content-abt'>";
                        try{
                            $conn = connect();
                            if ($conn == false) {
                                throw new Exception("DB Connection failed");
                            }
                            $sql = "SELECT * FROM abteilungen";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                                echo "<a href='" . strtolower($row['abteilungName']) . ".php'><i class='" . $row['iconName'] . "' aria-hidden='true'></i> ".$row['abteilungName']."</a>";
                            }
                            $conn->close();
                        } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                
    echo                "</div>
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
                            <a href='sponsors.php'><i class='fa fa-money' aria-hidden='true'></i> Sponsoren</a>
                            <a href='foerderverein.php'><i class='fa fa-heart' aria-hidden='true'></i> Förderverein</a>
                            <a href='newMember.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Mitglied werden</a>
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
                    
                    <a href='kontakt.php'>Kontakt</a>

                    <a href='https://cloud.wsv-lampertheim.de'><i class='fa fa-cloud' aria-hidden='true'></i> Vereinscloud</a>

                    <!-- dropdown for etc -->
                    <div class='dropdown-etc'>
                        <button class='dropbtn-etc'>
                        <i class='fa fa-bars' aria-hidden='true'></i>
                        </button>
                        <div class='dropdown-content-etc'>
                            <a href='kontakt.php'><i class='fa fa-address-card' aria-hidden='true'></i></a>
                            <a href='https://www.facebook.com/wsvla' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-facebook'></i></a>
                            <a href='https://www.instagram.com/wsv_lampertheim_1929/' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-instagram'></i></a>
                            <a href='https://chat.whatsapp.com/IeHYUxnAh47HMNSKh4twUG' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-whatsapp'></i></a>
                            <a href='https://sportinn.eu/WSV-Lampertheim' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
                            <a href='https://www.kanu.de/Vereine-53574.html' class='socialbtn' target='_blank' rel='noopener noreferrer'><i class='fa fa-link' aria-hidden='true'></i></a>
                            <!-- ^^^^ Search button -> Matteos AUfgabe den irgendwie zu machen -->
                            <a> <button class='themebtn' id='mode-switch'><i id='themeIcon' class='fa fa-moon-o' aria-hidden='true'></i></button></a>
                        </div>
                    </div>
                    <!--
                    <div class='search'>
                        <form action='search.php' method='post'>
                            <input type='text' name='search' placeholder='Suche' class='searchBtn'>
                            <button type='submit' name='submit-search' class='searchBtn'><i class='fa fa-search'></i></button>
                        </form>
                    </div>
                    -->
                    <script> 
                        var modeSwitch = document.getElementById('mode-switch');
                        if (localStorage.getItem('theme') == '') {
                            localStorage.setItem('theme', 'light');
                        }
                        if (localStorage.getItem('theme') == 'light') {
                            document.getElementById('colors').href = 'design/css/WhMoColors.css';
                            document.getElementById('themeIcon').className = 'fa fa-moon-o';
                        }
                        
                        if (localStorage.getItem('theme') == 'dark') {
                            document.getElementById('colors').href = 'design/css/DaMoColors.css';
                            document.getElementById('themeIcon').className = 'fa fa-sun-o';
                        }
                        
                        modeSwitch.addEventListener('click', function() {
                            if (localStorage.getItem('theme') == 'dark') {
                                localStorage.setItem('theme', 'light');

                                document.getElementById('colors').href = 'design/css/WhMoColors.css';
                                document.getElementById('themeIcon').className = 'fa fa-moon-o';
                            } else {
                                localStorage.setItem('theme', 'dark');
                                
                                document.getElementById('colors').href = 'design/css/DaMoColors.css';
                                document.getElementById('themeIcon').className = 'fa fa-sun-o';
                            }
                        });
                    </script>
                    
            </div>
            </nav>
        </div>
    </header>";

    include 'cookieConsent.php';
?>