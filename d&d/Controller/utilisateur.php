<?php
session_start();
$user = 'root';
$pass = '';
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bloc3_nvsave;', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION['nom_u'])) {
        if ($_SESSION['role_u'] == 2) {
    ?>
    <p>Vous êtes un utilisateurs </p>
    <?php
        } elseif ($_SESSION['role_u'] == 1) {
    ?>
    <p>Vous êtes un administrateur </p>
    <?php
        }
    }

    ?>
</body>

</html>