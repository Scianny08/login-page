<?php
    include("connessione.inc");

    $user = $_POST["username"];
    $pw = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $cf = $_POST["cf"];

    $query = "INSERT INTO utenti(username, password, nome, cognome, cf) 
                VALUES ('$user', '$pw', '$nome', '$cognome', '$cf')";

    $conn->query($query);
    $conn->close();
    header('Location: login.html');
?>