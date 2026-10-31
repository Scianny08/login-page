<?php
    session_start();      // Avvia la sessione esistente
    session_unset();      // Libera tutte le variabili di sessione
    session_destroy();    // Distrugge completamente la sessione

    // Reindirizza l'utente alla pagina di login
    header("Location: login.html"); 
    exit();
?>