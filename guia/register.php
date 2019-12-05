<?php
session_start();
/**
 * Checks if the method is POST, by seeing if dni has a value
 * It will start a connection with the database, then send the form values to the database
 * Any errors will be echo'ed out.
 */
if(isset($_POST["dni"])){
    $username = $_POST["username"];
    $dni = $_POST["dni"];
    $adreca = $_POST["adreca"];

    try{
        $connection = new PDO("mysql:host=localhost;dbname=pdostatement","root","");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO users (nom, dni, adreca) VALUES(?, ?, ?)";
        $connection->prepare($query)->execute([$username, $dni, $adreca]);

    }catch(PDOExeption $e){
        echo $e;
    }
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
    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input name="username" placeholder="Username" type="text">
    <input name="dni" placeholder="DNI" type="text">
    <input name="adreca" placeholder="Adreça" type="text">
    <button type="submit">Registrar</button>
</form>

</body>
</html>