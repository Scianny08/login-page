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
		<title>Impostazioni Utente</title>
	</head>

<body>
	<h2>Impostazioni Utente</h2>

    <form action="utente/update.php" method="post">
        <fieldset>
            <legend>Modifica dati</legend>
            Username <br> <input type="text" name="username" size="20"/> <br>
            Nuova password <br> <input type="password" name="password" size="20"/> <br>
            Nome <br> <input type="text" name="nome" size="20"/> <br>
            Cognome <br> <input type="text" name="cognome" size="20"/> <br>
            Codice fiscale <br><input type="text" name="cf" size="20"/> <br> <br>
            Password attuale <br> <input type="password" name="password_attuale" size="20"/> <br> <br>

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