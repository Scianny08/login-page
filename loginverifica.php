<?php
    require_once __DIR__ . "/config/connessione.inc";

    $usnm = mysqli_real_escape_string($conn, $_POST['username']);
    $pswd = mysqli_real_escape_string($conn, $_POST['password']);
    $pswd = md5($pswd);

    $sql = "SELECT * FROM utenti WHERE username='$usnm' and password='$pswd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();

        $row = mysqli_fetch_array($result);

        $nome = $row["nome"];
        $_SESSION['nome'] = $nome;
        
        $cf = $row["cf"];
        $_SESSION['cf'] = $cf;

        header("Location: menu.php");
        exit();
    } else {
        header("Location: login.html");
        exit();
    }

    $conn->close();
?>