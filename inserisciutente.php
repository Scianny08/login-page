<?php
    include("connessione.inc");

    $user = $_POST["username"];
    $pw = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $cf = $_POST["cf"];
    
    
    $sql = "SELECT * FROM utenti WHERE cf='$cf'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $query = "INSERT INTO utenti(username, password, nome, cognome, cf) 
                VALUES ('$user', '$pw', '$nome', '$cognome', '$cf')";
        $conn->query($query);
        
        header('Location: login.html');
        exit();
    } else {
        header('Location: insert.html');
        exit();
    }
    
    $conn->close();
?>