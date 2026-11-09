<?php
    session_start();
    require_once __DIR__ . '/config/connessione.inc';

    // Se la sessione del codice fiscale non è impostata, l'utente non è loggato
    if (!isset($_SESSION['cf'])) {
        header("Location: login.html");
        exit();
    } else {
		$cf = $conn->real_escape_string($_SESSION['cf']);
		$risUtente = $conn->query("SELECT username, nome, cognome, cf FROM utenti WHERE cf = '$cf'");
		$utente = $risUtente->fetch_assoc();
		$conn->close();
	}
    
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Impostazioni Utente</title>
	<link rel="stylesheet" href="assets/style.css">
	<script src="assets/components.js" defer></script>
</head>

<body>
	<h1>Impostazioni Utente</h1>

	<div class="glass-card">

		<form id="modulo" action="utente/update.php" method="post" accept-charset="UTF-8">
			<fieldset>
				<legend class="menu-legend">Modifica dati</legend>

				<div class="campo">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="input" value="<?php echo htmlspecialchars($utente['username'], ENT_QUOTES, 'UTF-8'); ?>">
				</div>

				<div class="campo">
					<label for="password">Nuova password</label>
					<input type="password" id="password" name="password" class="input" autocomplete="new-password">
				</div>

				<div class="campo">
					<label for="nome">Nome</label>
					<input type="text" id="nome" name="nome" class="input" value="<?php echo htmlspecialchars($utente['nome'], ENT_QUOTES, 'UTF-8'); ?>">
				</div>

				<div class="campo">
					<label for="cognome">Cognome</label>
					<input type="text" id="cognome" name="cognome" class="input" value="<?php echo htmlspecialchars($utente['cognome'], ENT_QUOTES, 'UTF-8'); ?>">
				</div>

				<div class="campo">
					<label for="cf">Codice fiscale</label>
					<input type="text" id="cf" name="cf" class="input" maxlength="16" value="<?php echo htmlspecialchars($utente['cf'], ENT_QUOTES, 'UTF-8'); ?>">
				</div>

                <div class="campo">
					<label for="password_attuale">Password attuale</label>
					<input type="password" id="password_attuale" name="password_attuale" class="input" autocomplete="current-password">
				</div>
                
				<button type="submit" name="invio" class="invia">Invia</button>
			</fieldset>
		</form>

		<fieldset class="fieldset-account">
			<legend class="menu-legend">Account</legend>

			<div class="menu-container">
				<form action="logout.php" method="post">
					<button type="submit" name="invio" class="invia">Esci</button>
				</form>

				<form action="utente/delete.php" method="post"
				      onsubmit="return confirm('Sei sicuro di voler eliminare il tuo utente? L\'operazione non è reversibile e tutti i clienti registrati verranno eliminati.');">
					<button type="submit" name="invio" class="invia">Elimina utente</button>
				</form>
			</div>
		</fieldset>

	</div>

</body>
</html>