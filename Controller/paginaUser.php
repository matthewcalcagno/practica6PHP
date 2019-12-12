<?php 
session_start();
//intenta conectarse a la base de dades si la troba
try {
	$connexio = new PDO('mysql:host=localhost;dbname=practica6', 'root', '');
  } catch (Exception $e) {
	die("Error al intentar conectar amb el servidor" . $e->getMessage());
  }
  $username = $_SESSION['username']
  
  $resultats = $connexio->prepare("SELECT user FROM users WHERE user = :username");
  //introdueix l'usuari que volem buscar a la consulta
  $resultats->bindValue(":username", $username,PDO::PARAM_STR) ;
?>
