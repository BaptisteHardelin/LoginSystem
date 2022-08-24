<?php

use LDAP\Result;

function emptyInputSignup($pseudo, $email, $password, $repeatPassword)
{
    $result = null;

    if (empty($pseudo) || empty($email) || empty($password) || empty($repeatPassword)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;

}

function invalidPseudo($pseudo)
{
    $result = null;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $pseudo)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = null;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function passwordMatch($password, $repeatPassword)
{
    $result = null;

    if ($password !== $repeatPassword) {

        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function pseudoExist($conn, $pseudo, $email)
{
    $result = null;
    $sql = "SELECT * FROM users WHERE user_id = ? OR email = ?";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=stmtfailed");
        exit();
    }

    // "s" is one parameter (for example here the parameters are $pseudo and $email) etc...

    /*
    Character    Description
    i            corresponding variable has type integer
    d            corresponding variable has type double
    s            corresponding variable has type string
    b            corresponding variable is a blob and will be sent in packets

     */
    mysqli_stmt_bind_param($statement, "ss", $pseudo, $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($statement);
        return $row;
    }

    $result = false;
    mysqli_stmt_close($statement);
    return $result;

}

function createUser($conn, $pseudo, $email, $password)
{
    $sql = "INSERT INTO users(pseudo, email, password) VALUES (?, ?, ?)";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: http://localhost/LoginSystem/signup.php?error=stmtfailed");
        exit();
    }

    /* Secure password */
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    mysqli_stmt_bind_param($statement, "sss", $pseudo, $email, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("Location: http://localhost/LoginSystem/signup.php?error=none");
    exit();
}