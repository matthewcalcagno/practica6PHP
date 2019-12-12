<?php
session_start();
//Matias Aedo & Matthew Calcagno
/* */
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
    <title>Registre</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Registre</h2>
        <p>Introdueix les teves dades.</p>
        <form action=<?php echo "../Controller/Register.php"; ?> method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Numb d'usuari</label>
                <input type="text" name="user" class="form-control" value="<?php echo $username; ?>" required>
             <!-- Si troba un error a valicio.php el posara en la variable que toca per despres printarla -->   
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contrasenya</label>
                <input type="password" name="password" class="form-control" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Repeteix la contrasenya</label>
                <input type="password" name="password-Verify" class="form-control" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="entra">
            </div>
        </form>
    </div>    
</body>
</html>