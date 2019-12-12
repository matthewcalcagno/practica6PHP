<?php
session_start();
//Matias Aedo
    // perfil d'usuari que es mostrara sempre i quan la sessio esta activa
    // rescata les dades de la cookie
    echo "<h1>Perfil d'usuari</h1>";
    echo "Usuari; ".$_SESSION['username']."<br>";
    echo "Data; "."<br>";
    
?>