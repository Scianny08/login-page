<?php
    session_start();
    require_once __DIR__ . '/../config/connessione.inc';

    if (isset($_SESSION['cf']) && isset($_POST['invio'])) {
        $cf = $conn->real_escape_string($_SESSION['cf']);

        $sqlDeleteClienti = "DELETE FROM clienti WHERE cf = '$cf'";
        $conn->query($sqlDeleteClienti);

        $sqlDeleteUtente = "DELETE FROM utenti WHERE cf = '$cf'";
        $conn->query($sqlDeleteUtente);

        $conn->close();

        session_unset();
        session_destroy();

        header("Location: ../login.html");
        exit();
    }

    header("Location: ../settings.php");
    exit();
?>