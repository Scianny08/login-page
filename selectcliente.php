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
        <title>Visualizza Clienti</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    </head>
<body>

    <h1>Visualizza Clienti</h1>
    
    <div class="glass-card" style="width: fit-content; min-width: 70%;">
      <fieldset>
        <table>
            <tr>
                <th">IVA</th>
                <th">Denominazione</th>
                <th">Città</th>
                <th">Via</th>
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

                        echo "<td>". htmlspecialchars($riga['iva']) ."</td>";
                        echo "<td>". htmlspecialchars($riga['denominazione']) ."</td>";
                        echo "<td>". htmlspecialchars($riga['citta']) ."</td>";
                        echo "<td>". htmlspecialchars($riga['via']) ."</td>";
                        
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nessun cliente trovato.</td></tr>";
                }

                $conn->close();
            ?>
        </table>
      </fieldset>
    </div>
    
    <div class="link">
      <a href="menu.php">Torna al menu</a>
    </div>

</body>
</html>