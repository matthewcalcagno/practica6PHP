<?php
session_start();
/**
 * Checks if the method is POST, by seeing if dni has a value
 * It will start a connection with the database, then send the form values to the database
 * Any errors will be echo'ed out.
 */


 /**
  * If user is already logged in then the user will be redirectedt to 'paginaUser.view.php'
  */
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../View/paginaUser.view.php");
    exit;
}


if(isset($_POST["user"])){
    $username = $_POST["user"];
    $password = $_POST["password"];

    
/**
 * This will first check to see if the username already exists in the database.
 * If it exists, it will echo out the error and stop the connection
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
        echo "Usuario ya existe";
        session_destroy();
        die();
    }else{
        /**
         * If the username is not in the database, then it will add it to the database
         */

        try{
            $query = "INSERT INTO users (user, password) VALUES(?, ?)";
            $connection->prepare($query)->execute([$username, $password]);
            echo "Registerd!";
            $_SESSION['username'] = $username;
            
    
        }catch(PDOExeption $e){
            echo $e;
        }
        
    }
 

   
}