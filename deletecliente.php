<?php
    session_start();

    // Se la sessione del codice fiscale non è impostata, l'utente non è loggato
    if (!isset($_SESSION['cf'])) {
        header("Location: login.html");
        exit();
    }
?>

<html>
	<head>
        <meta charset="UTF-8">
		<title>Eliminazione Cliente</title>
	</head>

    <body>
        <h2>Eliminazione Cliente</h2>

        <form action="delete.php" method="post">
            <label for="pIva">Seleziona il cliente da eliminare</label>
            
            <?php
                include("connessione.inc");
                $cf = $_SESSION['cf'];

                $sql = "SELECT denominazione, iva FROM clienti WHERE cf = '$cf' order by denominazione";
                $risultato = $conn->query($sql);

                // Controlla se la query ha restituito risultati
                if ($risultato->num_rows > 0) {
                    echo "<select id='pIva' name='pIva'>";
                    while ($riga = $risultato->fetch_assoc()) {
                        echo "<option value='{$riga['iva']}'>{$riga['denominazione']}: {$riga['iva']}</option>";
                    }
                    echo "</select>";
                } else {
                    echo "<br> Nessun cliente trovato.";
                }

                $conn->close();
            ?>

            <br> <br>
            <input type="submit" name="invio" value="Invia"/>
        </form>
        
        <a href="menu.php">Torna al menu</a>
    </body>
</html>