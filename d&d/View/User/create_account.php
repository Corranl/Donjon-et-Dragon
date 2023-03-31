<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bloc3_nvsave;charset=utf8;', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
// $bdd = new PDO('mysql:host=localhost;dbname=bloc3_nvsave;charset=utf8;', 'root', '');
// var_dump($bdd);
if (isset($_POST['envoi'])) {
    if (!empty($_POST['name']) and !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name']);
        $password = sha1($_POST['password']);
        $insertUser = $bdd->prepare('INSERT INTO utilisateur(nom_u,mot_de_passe_u)VALUES(?,?)');
        $insertUser->execute(array($name, $password));
        header('Location: connect.php');
    } else {
        echo "Un ou plusieurs champs semble vide";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create_account.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <h1>La taverne d'édeve</h1>
    </nav>

    <h2>inscription</h2>
    <form class="container" action="" method="POST">
        <div class="formulaire">
            <label for="name">Pseudo</label><br>
            <input type="text" id="name" name="name" autocomplete="off"> <br>
            <!-- <label for="email">Adresse email :</label><br>
            <input type="email" id="email" name="email" autocomplete="off"><br> -->
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" autocomplete="off"><br>
        </div>
        <input type="submit" name="envoi"="">
    </form>
</body>

</html>