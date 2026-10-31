<?php
    session_start();
    include("connessione.inc");

    if (isset($_POST['invio']) && isset($_POST['pIva'])) {
        $ivaDaEliminare = $conn->real_escape_string($_POST['pIva']);
        $cf = $_SESSION['cf'];

        $sqlDelete = "DELETE FROM clienti WHERE iva = '$ivaDaEliminare' AND cf = '$cf'";
        $conn->query($sqlDelete);
        
        $conn->close();
    }

    header("Location: deletecliente.php");
    exit();
?>