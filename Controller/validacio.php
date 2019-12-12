<?php 
session_start();
//Matias Aedo
/* Arxiu PHP que validara les dades que li pasem al servidor, una vegada validat redigira l'usuari a la
	seva pagina personal i activara la sessio. Quan l'usuari inicia sessio, creara una cookie amb dades de l'usuari, per depres
	ser capturades per la pagina del usuari.*/
 
//intenta conectarse a la base de dades si la troba
try {
	$connexio = new PDO('mysql:host=localhost;dbname=practica6', 'root', '');
  } catch (Exception $e) {
	die("Error al intentar conectar amb el servidor" . $e->getMessage());
  }
//if que s'actica quan envian el login
  if($_SERVER["REQUEST_METHOD"] == "POST"){
	try {
			//recupero les dades
			$username = trim($_POST["username"]);
			$contra = $_POST["password"];
			//prepara sql amb la consulta que desitjem
			$resultats = $connexio->prepare("SELECT user FROM users WHERE user = :username");
			//introdueix l'usuari que volem buscar a la consulta
			$resultats->bindValue(":username", $username,PDO::PARAM_STR) ;
			//executa la consulta
			$resultats->execute();
			$data=$resultats->fetch(PDO::FETCH_OBJ);
			//si ha trobat l'usuari continuara amb la comprobacio de la contrasenya 
			if($data){
				//repetim la consulta anterior pero aquesta vegada en retornada el ID i la contasneya ha de coincidir
				$resultats = $connexio->prepare("SELECT id FROM users WHERE (user = :username AND password = :passwo)");
				$resultats->bindValue(":username", $username,PDO::PARAM_STR) ;
				$resultats->bindValue(":passwo", $contra,PDO::PARAM_STR) ;
				//executa la consulta
				$resultats->execute();
				$data2=$resultats->fetch(PDO::FETCH_OBJ);
				//si la contrasenya es valida guardara l'informacio de la sessio i rediccionara a l'usuari
				// també creara una cookie per utilitzarla a la pagina d'usuari
				if($data2){
						$_SESSION["loggedin"] = true;
						$_SESSION["id"] = $data2;
						$_SESSION["username"] = $username; 
						setcookie("userName",$username,time()+99999);
						setcookie("data",date(DateTime::ISO8601),time()+99999);
						header("location: ../View/paginaUser.view.php");
				}else{
					$password_err = "Contrasenya incorrecta";
				}
			}else{// si no troba l'usuari guarden l'error que printara
				$username_err = "Usuari no trobat";
			}	
	} catch(PDOException $e){ //
		// mostrarem els errors
		echo "Error: " . $e->getMessage();
	}
  }
?>
