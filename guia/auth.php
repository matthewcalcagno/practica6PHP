<?php
session_start();

/**
 * Grabs the 2 form values
 */
$name = $_POST['nom'];
$dni = $_POST['dni'];

/**
 * Establishes a database connection and will check if the 2 values exist in the database.
 * If the fetched columns return 0, that means that it didn't find anything
 * If the fetched columns return anything more than 0, that means that it did find something and it should
 * authenticate
 * 
 * If there is an error(for example user doesn't exist) it will redirect with a get parameter of the error
 */
try{
    $connection = new PDO("mysql:host=localhost;dbname=pdostatement","root","");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM users WHERE nom = ? AND dni = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$name, $dni]);
    $res = $statement->fetchColumn();

    if ($res > 0){
    $_SESSION['name'] = $name;  
    $_SESSION['authenticated'] = true; 
    $_SESSION['id'] = $res['id'];

    setcookie("last_login", date("d-m-Y h:i:sa"),time() + (86400 * 30), "/");
    header("Location: page.php");     
    } 
    else{

        header("Location: login.php?error=No%20user%20found"); 
    }
}catch(PDOException $e){
    echo $e;
}

?>