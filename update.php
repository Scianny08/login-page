<?php
    session_start();
    include("connessione.inc");

    if (isset($_POST['invio'])) {
        $cf = $_SESSION['cf'];
        $totale = count($_POST['iva']);

        for ($i = 0; $i < $totale; $i++) {
            
            // Dati nuovi inseriti dall'utente
            $iva_nuova = $conn->real_escape_string($_POST['iva'][$i]);
            $denominazione = $conn->real_escape_string($_POST['denominazione'][$i]);
            $via = $conn->real_escape_string($_POST['via'][$i]);
            $citta = $conn->real_escape_string($_POST['citta'][$i]);
            
            // IVA originale per trovare la riga corrente
            $iva_originale = $conn->real_escape_string($_POST['iva_originale'][$i]);

            // 1. CONTROLLO DUPLICATI
            $sqlCheck = "SELECT * FROM clienti 
                        WHERE iva = '$iva_nuova' AND cf = '$cf' AND iva != '$iva_originale'";
            
            $risCheck = $conn->query($sqlCheck);

            // 2. Se il controllo NON trova duplicati (num_rows è 0), allora eseguiamo l'UPDATE
            if ($risCheck->num_rows == 0) {
                $sqlUpdate = "UPDATE clienti SET 
                                iva = '$iva_nuova',
                                denominazione = '$denominazione', 
                                via = '$via', 
                                citta = '$citta' 
                            WHERE iva = '$iva_originale' AND cf = '$cf'";
                
                $conn->query($sqlUpdate);
            }
        }
    }

    header("Location: updatecliente.php");
    exit();
?>