<?php include_once 'header.php';?>

<h1>Login</h1>

<form action="includes/login.inc.php" method="POST">
    <div>
        <label for="pseudo">Email</label>
        <input type="email" name="pseudo" placeholder="Pseudo or Email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
    </div>

    <input type="submit" value="Login" name="submit">

    <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];

    switch ($error) {
        case 'emptyinput':
            echo '<p class=error>Fill in all fields!</p>';
            break;
        case 'wronglogin':
            echo '<p class=error>Incorrect login information</p>';
            break;
    }

}
?>
</form>

<a href="signup.php">Don't have an account ?</a>

<?php include_once 'footer.php';?>