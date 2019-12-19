<?php 
session_start();
/*
  Agafa desde el servidor les dades del usuari, permeteix que l'usuari pugi cambiar el seu fons, es guardara l'ultim fons.
  La nova imatge es carrega quan l'usuari recarrega la pagina.
  */
//intenta conectarse a la base de dades si la troba
try {
	$connexio = new PDO('mysql:host=localhost;dbname=practica6', 'root', '');
  } catch (Exception $e) {
	die("Error al intentar conectar amb el servidor" . $e->getMessage());
  }
  //de la sessio agafa el nom de l'usuari per buscar-lo a la BDD
  $username = $_SESSION['username'];
  $resultats = $connexio->prepare("SELECT id, user FROM users WHERE user = :username");
  //introdueix l'usuari que volem buscar a la consulta
  $resultats->bindValue(":username", $username,PDO::PARAM_STR) ;
  $resultats->execute();
  $user = $resultats->fetch(PDO::FETCH_ASSOC);
  $idUser = (int)$user['id'];


  //sentencia que comprova si hi ha algun background disponible per l'usuari
  $resultats = $connexio->prepare("SELECT link_bg FROM background_user WHERE id_user = :idUser ORDER BY id_bg DESC LIMIT 1");
  $resultats->bindValue(":idUser", $idUser,PDO::PARAM_INT) ;
  $resultats->execute();
  $back = $resultats->fetch(PDO::FETCH_ASSOC);
  $link_bg = $back['link_bg'];
  echo $link_bg;

  //si es fa un POST agafara el link i el pujara a la base de dades
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // introduim el link a la seva taula corresponent
    $imatgeDFons = $_POST["imatge"];
    $resultats = $connexio->prepare("INSERT INTO background_user(id_user,link_bg) VALUES(:idUser,:link)");
    $resultats->bindValue(":idUser", $idUser,PDO::PARAM_INT) ;
    $resultats->bindValue(":link", $imatgeDFons,PDO::PARAM_STR) ;
    $resultats->execute();
    //fem una consulta per saber el id del background que hem afegit
    $resultats = $connexio->prepare("SELECT id_bg FROM background_user WHERE id_user = :idUser ORDER BY id_bg DESC LIMIT 1");
    $resultats->bindValue(":idUser", $idUser,PDO::PARAM_INT) ;
    $resultats->execute();
    $id_bg = $resultats->fetch(PDO::FETCH_ASSOC);
    //introduim l'id de background al usuari
    $idBg = (int)$id_bg['id_bg'];
    // actualizem la taula users per afegirli l'id corresponent 
    $resultats = $connexio->prepare("UPDATE users SET id_background = :id_bg WHERE id = :idUser");
    $resultats->bindValue(":id_bg", $idBg);
    $resultats->bindValue(":idUser", $idUser) ;
    $resultats->execute();
  }
?>
