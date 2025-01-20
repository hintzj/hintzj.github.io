<!-- This is the header of the website. It is included in all pages of the website. -->
<!-- The header is the same on all pages, so it is easier to maintain it in one file. -->

<?php
    echo "<header>
        <div class='logo-container'>
            <a href='/'><img src='documents/pics/logo1.png' alt='Website Logo' class='logo'></a>
        </div>
        <h1 class='site-name'>WSV Lampertheim</h1>
        <button class='menu-toggle' id='menu-toggle'>☰</button>
        <nav id='navbar' class='navbar'>
            <ul class='nav-links'>
                <li><a href='#'>Startseite</a></li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle'>Abteilungen</a>
                    <ul class='dropdown-menu'>
                        <li><a href='#'>Bla</a></li>
                        <li><a href='#'>Bla</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle'>Unser Verein</a>
                    <ul class='dropdown-menu'>
                        <li><a href='#'>News</a></li>
                        <li><a href='#'>Archiv</a></li>
                        <li><a href='#'>Termine</a></li>
                        <li><a href='#'>Vorstand</a></li>
                        <li><a href='#'>Sponsoren</a></li>
                        <li><a href='#'>Förderverein</a></li>
                        <li><a href='#'>Mitglied werden</a></li>
                        <li><a href='#'>Links</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle'>Vereinsjugend</a>
                    <ul class='dropdown-menu'>
                        <li><a href='#'>Jugendvorstand</a></li>
                        <li><a href='#'>Jugendnews</a></li>
                    </ul>
                </li>
                <li><a href='#'>Kontakt</a></li>
                <li><a href='#'>Vereinscloud</a></li>
            </ul>

            <script src='script.js'></script>
        </nav>
    </header>
    ";

    include 'cookieConsent.php';
?>