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

if (isset($_POST['envoi'])) {
    if (!empty($_POST['nom_u']) and !empty($_POST['mot_de_passe_u'])) {
        $utilisateur_pseudo = htmlspecialchars($_POST['nom_u']);
        $utilisateur_mdp = sha1($_POST['mot_de_passe_u']);

        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE nom_u = ? AND mot_de_passe_u = ?');
        $recupUser->execute(array($utilisateur_pseudo, $utilisateur_mdp));

        if ($recupUser->rowCount() > 0) {
            $user = $recupUser->fetch();
            $_SESSION['nom_u'] = $utilisateur_pseudo;
            $_SESSION['mot_de_passe_u'] = $utilisateur_mdp;
            $_SESSION['role_u'] = $user['role_u'];
            $_SESSION['id_u'] = $user['name_u'];
            header('Location: test.php');
        } else {
            $erreur = "Votre mot de passe ou pseudo est incorrecte.. Veuillez réessayer.";
        }
    } else {
        $erreur = "Veuillez compléter tous les champs..";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connect.css">
    <link href="https://fonts.cdnfonts.com/css/carolingia" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <nav>
        <h1>La taverne d'édeve</h1>
    </nav>
    <form class="container" action="" method="POST">
        <div class="formulaire">
            <input type="text" name="nom_u" placeholder="Nom d'utilisateur">
            <input type="password" name="mot_de_passe_u" placeholder="Mot de passe">
        </div>
        <input type="submit" value="Se connecter" name="envoi">
        <button type="button" onclick="window.location.href='create_account.php'">Créer un compte</button>
        <a href="">Mot de passe oublié ?</a>
    </form>
    <?php
    if (isset($erreur)) {
        echo "<p>$erreur</p>";
    }
    ?>


</body>

</html>