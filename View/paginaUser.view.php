<?php
session_start();
//Matias Aedo

    // Cridem l'arxiu que conectara amb el servidor
    require_once "../Controller/paginaUser.php";

    echo "<h1>Perfil d'usuari</h1>";
    echo "Id; ".$user[id]."<br>";
    echo "Usuari; ".$user[user]."<br>";
    echo "Data; "."<br>";

?>