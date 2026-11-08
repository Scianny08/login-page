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
		<title>Menu Clienti</title>
	</head>

	<body>
		<h1>Benvenuto/a <?php echo $_SESSION['nome']; ?></h1>
		
		<a href="inseriscicliente.php"><button>Inserimento Clienti</button></a> <br> <br>
		<a href="modificaclienti.php"><button>Modifica Clienti</button></a> <br> <br>
		<a href="eliminacliente.php"><button>Elimina Clienti</button></a> <br> <br>
		<a href="visualizzaclienti.php"><button>Visualizza Clienti</button></a>
	</body>
	
	<br> <br> <br>
	<a href ="settings.php">Impostazioni utente</a>
</html>