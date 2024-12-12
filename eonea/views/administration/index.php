<?php
session_start();
include 'db.php';

$action = $_GET['action'] ?? 'login'; // Action par défaut : Connexion
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'register') {
        // Inscription
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        if (!empty($username) && !empty($email) && !empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

            try {
                $stmt->execute([$username, $email, $hashed_password]);
                $message = "Inscription réussie ! Connectez-vous.";
                $action = 'login';
            } catch (PDOException $e) {
                $message = "Erreur : Nom d'utilisateur ou email déjà utilisé.";
            }
        } else {
            $message = "Veuillez remplir tous les champs.";
        }
    } elseif ($action === 'login') {
        // Connexion
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        if (!empty($email) && !empty($password)) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: application/eonea/views/eonea/sommission.php");
                exit;
            } else {
                $message = "Identifiants incorrects.";
            }
        } else {
            $message = "Veuillez remplir tous les champs.";
        }
    } elseif ($action === 'reset') {
        // Réinitialisation de mot de passe
        $email = htmlspecialchars(trim($_POST['email']));

        if (!empty($email)) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $reset_token = bin2hex(random_bytes(16));
                $token_expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

                $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, token_expiration = ? WHERE email = ?");
                $stmt->execute([$reset_token, $token_expiration, $email]);

                $reset_link = "http://localhost/reset_password.php?token=$reset_token";
                mail($email, "Réinitialisation de mot de passe", "Cliquez sur ce lien pour réinitialiser votre mot de passe : $reset_link");

                $message = "Un lien de réinitialisation a été envoyé à votre adresse email.";
            } else {
                $message = "Aucun compte associé à cet email.";
            }
        } else {
            $message = "Veuillez entrer votre email.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inscription, Connexion & Réinitialisation</title>
</head>
<body>
    <div class="container">
        <h1><?= ucfirst($action) ?></h1>
        <?php if ($message): ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>
        <form action="?action=<?= $action ?>" method="POST">
            <?php if ($action === 'register'): ?>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">S'inscrire</button>
                <p>Déjà inscrit ? <a href="?action=login">Connectez-vous</a></p>
            <?php elseif ($action === 'login'): ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
                <p>Pas encore inscrit ? <a href="?action=register">Inscrivez-vous</a></p>
                <p>Mot de passe oublié ? <a href="?action=reset">Réinitialisez-le</a></p>
            <?php elseif ($action === 'reset'): ?>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">Réinitialiser</button>
                <p>Retour à <a href="?action=login">Connexion</a></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
