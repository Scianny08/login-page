<?php
    session_start();

    // Se la sessione del codice fiscale non è impostata, l'utente non è loggato
    if (!isset($_SESSION['cf'])) {
        header("Location: login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="it">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Eliminazione Cliente</title>
        <link rel="stylesheet" href="assets/style.css">
        <script src="assets/components.js" defer></script>
	</head>

    <body>
        <h1>Elimina Clienti</h1>

        <form action="clienti/delete.php" method="post">
          <div class="glass-card">
            <fieldset>
                <div class="campo">
                  <label for="pIva">Seleziona il cliente da eliminare</label>
                </div>
                
                <?php
                    require_once __DIR__ . "/config/connessione.inc";
                    $cf = $_SESSION['cf'];

                    $sql = "SELECT denominazione, iva FROM clienti WHERE cf = '$cf' order by denominazione";
                    $risultato = $conn->query($sql);

                    // Controlla se la query ha restituito risultati
                    if ($risultato->num_rows > 0) {
                        echo "<div class='campo'><select id='pIva' name='pIva' class='input' style='max-width: 100%; height: auto; padding: 10px;'>";
                        while ($riga = $risultato->fetch_assoc()) {
                            echo "<option value='{$riga['iva']}'>{$riga['denominazione']}: {$riga['iva']}</option>";
                        }
                        echo "</select></div>";
                    } else {
                        echo "<br> Nessun cliente trovato.";
                    }

                    $conn->close();
                ?>

                <button type="submit" name="invio" class="invia">Invia</button>
            </fieldset>
          </div>
        </form>
        
    </body>
</html>