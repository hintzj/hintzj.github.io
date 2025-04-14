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
                <li><a href='/'>Startseite</a></li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle'>Abteilungen</a>
                    <ul class='dropdown-menu'>";
                        $conn = connect();
                        if ($conn == false) {
                            throw new Exception("DB Connection failed");
                        }
                        $sql = "SELECT * FROM abteilungen WHERE abteilungsPage != ''";
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) {
                            echo "<li><a href='" . strtolower($row['abteilungsPage']) . "'>" . $row['abteilungName'] . "</a></li>";
                        }

    echo            "</ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle'>Unser Verein</a>
                    <ul class='dropdown-menu'>
                        <li><a href='news.php'>News</a></li>
                        <li><a href='archiv.php'>Archiv</a></li>
                        <li><a href='termine.php'>Termine</a></li>
                        <li><a href='vorstand.php'>Vorstand</a></li>
                        <li><a href='sponsors.php'>Sponsoren</a></li>
                        <li><a href='foerderverein.php'>Förderverein</a></li>
                        <li><a href='links.php'>Links</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle'>Vereinsjugend</a>
                    <ul class='dropdown-menu'>
                        <li><a href='jugendvorstand.php'>Jugendvorstand</a></li>
                        <li><a href='jugendnews.php'>Jugendnews</a></li>
                    </ul>
                </li>
                <li><a href='kontakt.php'>Kontakt</a></li>
                <li><a href='cloud.hin.tz'>Vereinscloud</a></li>
            </ul>

            <script src='script.js'></script>
        </nav>
    </header>
    ";

    include 'cookieConsent.php';
?>