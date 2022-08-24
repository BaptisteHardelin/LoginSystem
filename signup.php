<?php include_once 'header.php';?>

<h1>Signup</h1>

<form action="includes/signup.inc.php" method="POST">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" placeholder="Pseudo">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="you@exemple.com">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
    </div>
    <div>
        <label for="password">Repeat the password</label>
        <input type="password" name="repeatPassword" placeholder="Repeat the password">
    </div>

    <input type="submit" value="Signup" name="submit">

    <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];

    switch ($error) {
        case 'emptyinput':
            echo '<p class=error>Fill in all fields!</p>';
            break;
        case 'invalidpseudo':
            echo '<p class=error>Choose a proper pseudo! (without a space)</p>';
            break;
        case 'invalidemail':
            echo '<p class=error>Choose a proper email!</p>';
            break;
        case 'passwordsdontmatch':
            echo "<p class=error>Passwords don't match!</p>";
            break;
        case 'usernametaken':
            echo '<p class=error>The username is already taken!</p>';
            break;
        case 'none':
            echo "<p>You have signup!<p>";
            break;
    }

}
?>
</form>



<?php include_once 'footer.php';?>