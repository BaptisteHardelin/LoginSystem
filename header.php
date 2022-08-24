<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>

<body>


    <?php
if (isset($_SESSION['pseudo'])) {

    echo '<a href="index.php">Home</a>';
    echo '<a href="includes/logout.inc.php">Logout</a>';

} else {
    echo '<a href="signup.php">Signup</a>';
    echo '<a href="login.php">Login</a>';
}
?>