<?php
session_start();
//Matias Aedo & Matthew Calcagno
 /**
  * Mira si el metodo es POST, mirant si el dni te un valor
  * Començara la conexio a la base de dades, i despres ho envia els valors a la base de dades
  * Si hi ha un error, fara un echo
  */


 /**
  * Si l'usuari ja s'ha iniciat la sessió, es redirigirà a "pàginaUser.view.php"
  */

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../View/paginaUser.view.php");
    exit;
}


if(isset($_POST["user"])){
    $username = $_POST["user"];
    //encriptacio de la contrasenya
    $password = hash("sha512",$_POST['password']);

    
/**
 * En primer lloc, es comprovarà si el nom d’usuari ja existeix a la base de dades.
 * Si existeix, es produirà l'error i es detindrà la connexió '
 */
    try{
        $connection = new PDO("mysql:host=localhost;dbname=practica6","root","");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM users WHERE user = ?";
        $statement = $connection->prepare($query);
        $statement->execute([$username]);
        $res = $statement->fetchColumn();
    }catch(PDOExeption $e){
        echo $e;
    }
    if($res > 0){
        $_SESSION['username_err'] = "Error, usuario ya existe";
        header("location: ../View/register.view.php");

        
    }else{
        /**
         *Si el nom d’usuari no es troba a la base de dades, l’afegirà a la base de dades
         */

        try{
            $query = "INSERT INTO users (user, password) VALUES(?, ?)";
            $connection->prepare($query)->execute([$username, $password]);
            $_SESSION['username'] = $username;
            header("location: ../View/paginaUser.view.php");
            
            
    
        }catch(PDOExeption $e){
            echo $e;
        }
        
    }
 

   
}