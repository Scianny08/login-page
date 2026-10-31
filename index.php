<?php
    session_start();
    $loggato = isset($_SESSION['cf']);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
        <script src="components.js" defer></script>
    </head>

<body>
    <h1>Benvenuto</h1>

    <div class="glass-card">
        <fieldset>
            <p>Gestisci i tuoi clienti in modo semplice!</p>

            <?php if ($loggato): ?>
                <a class="invia" href="menu.php">Vai al menu</a>
            <?php else: ?>
                <a class="invia" href="login.html">Accedi</a>
                <a class="invia" href="signup.html">Registrati</a>
            <?php endif; ?>
        </fieldset>
    </div>

</body>
</html>