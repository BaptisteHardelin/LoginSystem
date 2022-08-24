<?php

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    require_once './db_handler.inc.php';
    require_once './functions.inc.php';

    if (emptyInputLogin($pseudo, $password)) {
        header("Location: http://localhost/LoginSystem/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $pseudo, $password);

} else {
    header("Location: http://localhost/LoginSystem/login.php");
    exit();
}