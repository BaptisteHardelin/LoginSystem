<?php

if (isset($_POST['submit'])) {

    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    require_once 'db_handler.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($pseudo, $email, $password, $repeatPassword)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=invalidemail");
        exit();
    }

    // TODO
    /* We can check if the password is 8 length and if they are numbers on it */
    if (goodSecurePassword($password)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=notsecurepassword");
        exit();
    }

    if (passwordMatch($password, $repeatPassword)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=passwordsdontmatch");
        exit();
    }

    if (pseudoExists($conn, $pseudo, $email)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $pseudo, $email, $password);
    header("Location: http://localhost/LoginSystem/login.php");
} else {
    header("Location: http://localhost/LoginSystem/signup.php");
    exit();
}