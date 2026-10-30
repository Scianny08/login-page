<?php
    session_start();
?>

<html>
    <head>
        <title>Visualizza Clienti</title>
    </head>
<body>

    <h2>Visualizza Clienti</h2>
    
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
                    echo "<td>" . $riga['iva'] . "</td>";
                    echo "<td>" . $riga['denominazione'] . "</td>";
                    echo "<td>" . $riga['via'] . "</td>";
                    echo "<td>" . $riga['citta'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nessun cliente trovato.</td></tr>";
            }

            $conn->close();
        ?>
        
    </table>
    
</body>
</html>