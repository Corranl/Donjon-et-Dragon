<?php
$host = 'localhost'; // L'adresse du serveur MySQL
$user = 'root'; // Le nom d'utilisateur de la base de données
$password = ''; // Le mot de passe de la base de données
$dbname = 'bloc3_nvsave'; // Le nom de la base de données

// Création de la connexion
$conn = mysqli_connect($host, $user, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>