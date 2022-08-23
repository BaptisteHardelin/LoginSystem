<?php include_once 'header.php';?>

<h1>Singup</h1>

<form action="" method="POST">
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

    <input type="submit" value="Singup">
</form>

<?php include_once 'footer.php';?>