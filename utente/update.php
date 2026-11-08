<?php
    session_start();
    require_once __DIR__ . '/../config/connessione.inc';

    if (isset($_POST['invio']) && isset($_POST['password_attuale'])) {
        $cfOriginale = $conn->real_escape_string($_SESSION['cf']);
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $passwordAttuale = $conn->real_escape_string($_POST['password_attuale']);
        $nome = $conn->real_escape_string($_POST['nome']);
        $cognome = $conn->real_escape_string($_POST['cognome']);
        $cfNuovo = $conn->real_escape_string($_POST['cf']);

        $sqlPassword = "SELECT * FROM utenti
                        WHERE cf = '$cfOriginale' AND password = '$passwordAttuale'";
        $risPassword = $conn->query($sqlPassword);

        if ($risPassword->num_rows > 0) {
            $sqlCheck = "SELECT * FROM utenti
                        WHERE (username = '$username' OR cf = '$cfNuovo')
                        AND cf != '$cfOriginale'";
            $risCheck = $conn->query($sqlCheck);

            if ($risCheck->num_rows == 0) {
                $sqlUpdate = "UPDATE utenti SET
                                username = '$username',
                                password = '$password',
                                nome = '$nome',
                                cognome = '$cognome',
                                cf = '$cfNuovo'
                            WHERE cf = '$cfOriginale'";
                $conn->query($sqlUpdate);

                $_SESSION['cf'] = $cfNuovo;
                $_SESSION['nome'] = $_POST['nome'];
            }
        }

        $conn->close();
    }

    header("Location: ../settings.php");
    exit();
?>