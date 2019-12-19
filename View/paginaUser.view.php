<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    //Matias Aedo & Matthew Calcagno
    // Cridem l'arxiu que conectara amb el servidor
    require_once "../Controller/paginaUser.php";
    ?>
</body>
</html>
    <?php echo "<h1>Perfil d'usuari</h1>"; ?>
    <?php echo "Id; ".$user['id']."<br>"; ?>
    <?php echo "Usuari; ".$user['user']."<br>";?>
    <form <?php echo "../Controller/paginaUser.php"; ?> method="post">
   URL de la imagen:
    <input type="text" name="imatge" id="imatge">
    <input type="submit" value="Upload Image" name="submit">
</form>
