<?php
session_start();
//Matias Aedo
/* Login PHP que quan valida l'usuari al servidor deixa la sessio oberta.
   La mijora es fer tota la valicio mitjançant PDO i mantenir la sessio inicia, guardant les dades en una cookie, i capturandoles despres amb la pagina d'usuari.*/
// Comprova si l'usuari a fet login en aquesta sessio
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../View/paginaUser.view.php");
    exit;
}
 
// Cridem l'arxiu que conectara amb el servidor
require_once "../Controller/validacio.php";

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Introdueix les teves dades.</p>
        <?php 
            if(isset($_SESSION["password_err"])){
                echo $_SESSION["password_err"];
            } 
            if(isset($_SESSION["username_err"])){
                echo $_SESSION["username_err"];
            }
            ?>

        <form action=<?php echo "../Controller/validacio.php"; ?> method="post">
            <div class="form-group">
                <label>Nom d'usuari</label>
                <input type="text" name="username" class="form-control" required>
            </div>    
            <div class="form-group ">
                <label>Contrasenya</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="entra">
            </div>
        </form>
    </div>    
</body>
</html>