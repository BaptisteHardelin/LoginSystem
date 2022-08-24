<?php include_once 'header.php';?>

<?php
require_once './includes/functions.inc.php';
secure();
?>

<h1>Home <?php echo $_SESSION['pseudo'] ?></h1>

<?php include_once 'footer.php';?>