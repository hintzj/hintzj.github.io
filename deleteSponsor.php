<?php
    require_once 'functions.php';
    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit();
    }
    if (isset($_GET['id'])) {
        $sponsorId = $_GET['id'];
        
        // Überprüfen, ob der Sponsor existiert
        if (sponsorExists($sponsorId)) {
            // Logo des Sponsors abrufen
            $logoFileName = getSponsorLogo($sponsorId);
            
            // Sponsor löschen
            if (deleteSponsor($sponsorId)) {
                // Logo-Datei löschen, falls vorhanden
                if ($logoFileName) {
                    deleteSponsorLogo($logoFileName);
                }
                header("Location: adminSponsor.php");
                exit();
            } else {
                echo "<script>alert('Fehler beim Löschen des Sponsors.');</script>";
            }
        } else {
            echo "<script>alert('Sponsor nicht gefunden.');</script>";
        }
    } else {
        echo "<script>alert('Ungültige Anfrage.');</script>";
    }
?>