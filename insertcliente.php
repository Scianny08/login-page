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
	<title>Inserimento Cliente</title>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
</head>

<body>
    <h1>Inserimento Cliente</h1>

    <form id="modulo" action="insert.php" method="post" accept-charset="UTF-8">
      <fieldset class="glass-card">
        
        <div class="campo">
          <label for="iva">P. IVA</label>
          <input type="text" id="iva" name="iva" class="input" maxlength="11" required>
        </div>

        <div class="campo">
          <label for="denominazione">Denominazione</label>
          <input type="text" id="denominazione" name="denominazione" class="input" required>
        </div>

        <div class="campo">
          <label for="citta">Città</label>
          <input type="text" id="citta" name="citta" class="input" required>
        </div>

        <div class="campo">
          <label for="via">Indirizzo</label>
          <input type="text" id="via" name="via" class="input" required>
        </div>

        <button type="submit" name="invio" class="invia">Invia</button>

        <div class="link">
          <a href="menu.php">Torna al menu</a>
        </div>

      </fieldset>
    </form>
</body>
</html>