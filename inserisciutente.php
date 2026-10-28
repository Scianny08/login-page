<?php
    include("connessione.inc");

    $user = $_POST["username"];
    $pw = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $cf = $_POST["cf"];
    
    $sql = "SELECT * FROM utenti WHERE cf='$cf'";
    $resultCf = $conn->query($sql);

    $sql = "SELECT * FROM utenti WHERE username='$user'";
    $resultUser = $conn->query($sql);

    if ($resultCf->num_rows == 0 && $resultUser->num_rows == 0) {
        $query = "INSERT INTO utenti(username, password, nome, cognome, cf) 
                VALUES ('$user', '$pw', '$nome', '$cognome', '$cf')";
        $conn->query($query);
        
        header('Location: login.html');
        exit();
    } else {
        echo "<script>
                alert('Utente già registrato.');
                window.location.href = 'insert.html';
              </script>";
        exit();
    }
    
    $conn->close();
?>