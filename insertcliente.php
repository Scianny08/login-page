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
		<title>Inserimento Cliente</title>
	</head>

    <body>
        <h2>Inserimento Cliente</h2>

        <form action="insert.php" method="post" accept-charset="UTF-8">
            P. IVA <br> <input type="text" name="iva" size="20"/> <br>
            Denominazione <br> <input type="text" name="denominazione" size="20"/> <br>
            Città <br> <input type="text" name="citta" size="20"/> <br>
            Indirizzo <br> <input type="text" name="via" size="20"/> <br> <br>
            
            <input type="submit" name="invio" value="Invia"/>
        </form>
        
        <a href="menu.php">Torna al menu</a>
    </body>
</html>