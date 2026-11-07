//require interrompe lo script con un errore se il file non si trova
//_once evita di caricare lo stesso file più volte
//include invece mostra un avviso ma prova a proseguire senza connessione
//require_once __DIR__ . '/connessione.inc';

<?php
$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "accounts";

//creazione connessione
$conn = new mysqli($servername, $username, $password, $dbname);