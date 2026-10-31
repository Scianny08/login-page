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
        <title>Visualizza Clienti</title>
    </head>
<body>

    <h2>Visualizza Clienti</h2>
    
    <table border="1">
        <tr>
            <th>IVA</th>
            <th>Denominazione</th>
            <th>Città</th>
            <th>Via</th>
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

                    echo "<td>". $riga['iva'] ."</td>";
                    echo "<td>". $riga['denominazione'] ."</td>";
                    echo "<td>". $riga['citta'] ."</td>";
                    echo "<td>". $riga['via'] ."</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nessun cliente trovato.</td></tr>";
            }

            $conn->close();
        ?>
    </table>
    
    <a href="menu.php">Torna al menu</a>

</body>
</html>