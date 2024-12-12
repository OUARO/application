<?php
// Configuration des paramètres de connexion à la base de données
$host = 'localhost'; // Nom de l'hôte MySQL (localhost par défaut)
$dbname = 'eonea'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL (laisser vide si aucun mot de passe)

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
