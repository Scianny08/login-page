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
    } else {
        echo "<script>
                alert('Utente già registrato con questo codice fiscale.');
                window.location.href = 'insert.html';
              </script>";
    }
    
    $conn->close();
?>