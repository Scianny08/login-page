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
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
        <script src="components.js" defer></script>
	</head>

    <body>
        <h1>Elimina Clienti</h1>

        <form action="delete.php" method="post">
          <div class="glass-card">
            <fieldset>
                <div class="campo">
                  <label for="pIva">Seleziona il cliente da eliminare</label>
                </div>
                
                <?php
                    include("connessione.inc");
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