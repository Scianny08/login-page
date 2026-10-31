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
    <title>Menu Clienti</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
</head>

<body>
    <h1>Menu Clienti</h1>

    <div class="glass-card">
        <fieldset>
            <legend class="menu-legend">Benvenuto/a <?php echo $_SESSION['nome']; ?></legend>

            <div class="menu-container">
                <a href="insertcliente.php" class="invia">Inserimento</a>
                <a href="updatecliente.php" class="invia">Modifica</a>
                <a href="deletecliente.php" class="invia">Elimina</a>
                <a href="selectcliente.php" class="invia">Visualizza</a>
                
                <div class="link"><a href="logout.php">Log out</a></div>
            </div>
        </fieldset>
    </div>
</body>
</html>