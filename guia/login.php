<?php
session_start();
/**
 * Checks to see if there are any GET errors and print them out
 * 
 * For more information and a better understanding, navigate to auth.php for a more clear example
 */
if(isset($_GET["error"])){
    echo $_GET["error"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
    <form action="auth.php" method="POST">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="dni" placeholder="DNI">
        <input type="submit" value="Login">
    </form>
</body>
</html>