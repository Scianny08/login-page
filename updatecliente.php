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
        <title>Modifica Clienti</title>
    </head>
<body>

    <h2>Modifica Clienti</h2>
    
    <form action="update.php" method="post">
        <table border="1">
            <tr>
                <th>IVA</th>
                <th>Denominazione</th>
                <th>Via</th>
                <th>Città</th>
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

                        echo "<td>";
                        echo "<input type='text' name='iva[]' value='" . htmlspecialchars($riga['iva']) . "'>";
                        echo "<input type='hidden' name='iva_originale[]' value='" . htmlspecialchars($riga['iva']) . "'>";
                        echo "</td>";

                        echo "<td><input type='text' name='denominazione[]' value='" . htmlspecialchars($riga['denominazione']) . "'></td>";
                        echo "<td><input type='text' name='citta[]' value='" . htmlspecialchars($riga['citta']) . "'></td>";
                        echo "<td><input type='text' name='via[]' value='" . htmlspecialchars($riga['via']) . "'></td>";
                        
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nessun cliente trovato.</td></tr>";
                }

                $conn->close();
            ?>

        </table>

        <br>
        <input type="submit" name="invio" value="Invia"/>
    </form>

    <a href="menu.php">Torna al menu</a>
    
</body>
</html>