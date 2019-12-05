<?php
session_start();
/**
 * Checks if the browser entering the page is authenticated, incase it is not, then it will redirect back to
 * index.php
 */
if($_SESSION['authenticated'] != true){
    header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- Prints out the session variable name -->
    <h1>Hola <?= $_SESSION['name'] ?></h1>
    <?php
        if(isset($_COOKIE['last_login'])){
            echo "Has iniciado session:  " .  $_COOKIE['last_login'];
            echo $_SESSION['id'];
        }
    ?>

    <a href="remove.php">Borrar cuenta</a>
</body>
</html>