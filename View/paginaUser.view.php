<?php
//Matias Aedo
    // perfil d'usuari que es mostrara sempre i quan la sessio esta activa
    // rescata les dades de la cookie
    echo "<h1>Perfil d'usuari</h1>";
    echo "Usuari; ".$_COOKIE["userName"]."<br>";
    echo "Data; ".$_COOKIE["data"]."<br>";
    
?>