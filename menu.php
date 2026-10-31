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
		
		<a href="insertcliente.php"><button>Inserimento Clienti</button></a> <br> <br>
		<a href="updatecliente.php"><button>Modifica Clienti</button></a> <br> <br>
		<a href="deletecliente.php"><button>Elimina Clienti</button></a> <br> <br>
		<a href="selectcliente.php"><button>Visualizza Clienti</button></a>
	</body>
	
	<br> <br>
	<a href ="logout.php">Log out</a>
</html>