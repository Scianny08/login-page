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
		<title>Impostazioni Utente</title>
		<link rel="stylesheet" href="assets/style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
		<script src="assets/components.js" defer></script>
	</head>

<body>
	<h1>Impostazioni Utente</h1>

    <form action="utente/update.php" method="post">
        <fieldset class="glass-card">
            <legend>Modifica dati</legend>
            Username <br> <input type="text" name="username" size="20"/> <br>
            Nuova password <br> <input type="password" name="password" size="20"/> <br>
            Password attuale <br> <input type="password" name="password_attuale" size="20"/> <br>
            Nome <br> <input type="text" name="nome" size="20"/> <br>
            Cognome <br> <input type="text" name="cognome" size="20"/> <br>
            Codice fiscale <br><input type="text" name="cf" size="20"/> <br> <br>

            <input type="submit" name="invio" value="Invia"/>
        </fieldset>
	</form>

	<form action="logout.php" method="post">
		<input type="submit" name="invio" value="Esci"/>
	</form>
	
    <form action="utente/delete.php" method="post">
		<input type="submit" name="invio" value="Elimina utente"/>
	</form>

</body>
</html>