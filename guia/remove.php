<?php
session_start();
/**
 * Checks if the browser entering the page is authenticated, incase it is not, then it will redirect back to
 * index.php
 */
if($_SESSION['authenticated'] != true){
    header("Location: index.php"); 
}


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
    $query = "DELETE FROM users WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$_SESSION['id']]);
 
    session_destroy();
    header("Location: index.php");     
    
}catch(PDOException $e){
    echo $e;
}

?>

>=