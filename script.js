// Schließen des Dropdown-Menüs bei Klick auf den Body
document.body.addEventListener('click', function(event) {
    if (event.target.closest('.dropdown') === null) {
        //check if a dropdown is open
        let open = false;
        document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
            if (menu.style.display === 'block') {
                open = true;
            }
        });
        if (open) {
            //close all dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                menu.style.display = 'none';
                console.log('closed');
            });
        }
    }
});


// Menü-Button für mobile Ansicht
document.getElementById('menu-toggle').addEventListener('click', function() {
    const navbar = document.getElementById('navbar');
    navbar.style.display = navbar.style.display === 'flex' ? 'none' : 'flex';
    stopPropagation();
});


// Dropdown-Toggle für mobile Ansicht
document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
    toggle.addEventListener('click', function(event) {
        const navbar = document.getElementById('navbar');
        if (navbar.style.display === 'flex') {
            event.preventDefault(); // Verhindert das Standardverhalten des Links
            const dropdownMenu = this.nextElementSibling;
            
            // Alle anderen Dropdown-Menüs schließen
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                if (menu !== dropdownMenu) {
                    menu.style.display = 'none';
                }
            });
            
            // Aktuelles Dropdown-Menü öffnen/schließen
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        }
    });
});