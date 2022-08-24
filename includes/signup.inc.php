<?php

if (isset($_POST['submit'])) {

    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    require_once 'db_handler.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($pseudo, $email, $password, $repeatPassword) !== false) {
        header("Location: http://localhost/LoginSystem/signup.php?error=emptyinput");
        exit();
    }

    if (invalidPseudo($pseudo) !== false) {
        header("Location: http://localhost/LoginSystem/signup.php?error=invalidpseudo");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("Location: http://localhost/LoginSystem/signup.php?error=invalidemail");
        exit();
    }

    // TODO
    /* We can check if the password is 8 length and if they are numbers on it */

    if (passwordMatch($password, $repeatPassword) !== false) {
        header("Location: http://localhost/LoginSystem/signup.php?error=passwordsdontmatch");
        exit();
    }

    if (pseudoExist($conn, $pseudo, $email) !== false) {
        header("Location: http://localhost/LoginSystem/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $pseudo, $email, $password);
} else {
    header("Location: http://localhost/LoginSystem/signup.php");
    exit();
}