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
    <title>Modifica Clienti</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
</head>
<body>

    <h1>Modifica Clienti</h1>
    
    <form action="update.php" method="post">
      <div class="glass-card" style="width: fit-content; min-width: 80%;">
        <fieldset>
            <table style="width: 100%; border-collapse: collapse; text-align: center;">
                <tr>
                    <th style="padding: 10px;">IVA</th>
                    <th style="padding: 10px;">Denominazione</th>
                    <th style="padding: 10px;">Via</th>
                    <th style="padding: 10px;">Città</th>
                </tr>

                <?php
                    include("connessione.inc");
                    $cf = $_SESSION['cf'];

                    $sql = "SELECT * FROM clienti WHERE cf = '$cf' order by denominazione";
                    $risultato = $conn->query($sql);

                    // Controlla se la query ha restituito risultati
                    if ($risultato->num_rows > 0) {
                        while ($riga = $risultato->fetch_assoc()) {
                            echo "<tr>";

                            echo "<td style='padding: 10px;'>";
                            echo "<input type='text' name='iva[]' class='input' value='" . htmlspecialchars($riga['iva']) . "'>";
                            echo "<input type='hidden' name='iva_originale[]' value='" . htmlspecialchars($riga['iva']) . "'>";
                            echo "</td>";

                            echo "<td style='padding: 10px;'><input type='text' name='denominazione[]' class='input' value='" . htmlspecialchars($riga['denominazione']) . "'></td>";
                            echo "<td style='padding: 10px;'><input type='text' name='via[]' class='input' value='" . htmlspecialchars($riga['via']) . "'></td>";
                            echo "<td style='padding: 10px;'><input type='text' name='citta[]' class='input' value='" . htmlspecialchars($riga['citta']) . "'></td>";
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nessun cliente trovato.</td></tr>";
                    }

                    $conn->close();
                ?>

            </table>

            <button type="submit" name="invio" class="invia">Invia</button>
        </fieldset>
      </div>
    </form>

    <div class="link">
      <a href="menu.php">Torna al menu</a>
    </div>
    
</body>
</html>