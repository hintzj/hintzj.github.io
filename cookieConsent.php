<?php
    echo "<div class='cookie-consent' style='display: none;'>
        <span>
            Diese Website verwendet Cookies, um Ihnen die bestmögliche Funktionalität bieten zu können.
            <a href='impressum.php' style='color: white;'>Mehr Informationen</a>
        </span>
        <br>
        <div class='mt-2 d-flex align-items-center justify-content-center g-2'>
        <br>
        <button class='allow-button accept mr-1'>Alles klar!</button>
        <button class='allow-button necessary'>Nur notwendige!</button>
        </div>

        <script>
            window.addEventListener('load', (event) => {
                startUp();
            });
        </script>

        <script>
            function startUp(){
                console.log('startUp function called');
                if(localStorage.getItem('cookieconsent') == 'true'){
                    document.querySelector('.cookie-consent').style.display = 'none';
                    console.log('cookies are already allowed');
                } else {
                    document.querySelector('.cookie-consent').style.display = 'block';
                }
            }
            //on click of allow button set local storage to true and hide the cookie consent
            document.querySelector('.accept').addEventListener('click', function(){
                console.log('cookies allowed');
                localStorage.setItem('cookieconsent', 'true');
                document.querySelector('.cookie-consent').style.display = 'none';
            });

            //on click of necessary button set local storage to false and hide the cookie consent
            document.querySelector('.necessary').addEventListener('click', function(){
                console.log('cookies not allowed');
                localStorage.setItem('cookieconsent', 'false');
                document.querySelector('.cookie-consent').style.display = 'none';
            });
        </script>
    </div>";
?>