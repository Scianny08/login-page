<?php
    session_start();
    include("connessione.inc");

    $iva = $conn->real_escape_string($_POST["iva"]);
    $denominazione = $conn->real_escape_string($_POST["denominazione"]);
    $via = $conn->real_escape_string($_POST["via"]);
    $citta = $conn->real_escape_string($_POST["citta"]);
    $cf = $_SESSION['cf'];

    $sql = "SELECT * FROM clienti WHERE iva='$iva'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $query = "INSERT INTO clienti (iva, denominazione, via, citta, cf) 
                VALUES ('$iva', '$denominazione', '$via', '$citta', '$cf')";
        $conn->query($query);
        
        header('Location: menu.php');
        exit();
    } else {
        header('Location: insertcliente.html');
        exit();
    }
    
    $conn->close();
?>