<?php
	session_start();
?>

<html>
	<head>
		<title>Menu Clienti</title>
	</head>

	<body>
		<h1>Benvenuto/a <?php echo $_SESSION['nome']; ?></h1>

		<a href="insertcliente.html"><button>Inserimento Clienti</button></a> <br> <br>
		<a href="updatecliente.html"><button>Modifica Clienti</button></a> <br> <br>
		<a href="deletecliente.html"><button>Elimina Clienti</button></a> <br> <br>
		<a href="select.php"><button>Visualizza Clienti</button></a>
	</body>
	
</html>