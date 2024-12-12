<?php
include 'db.php';

if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = htmlspecialchars($_GET['token']);
    $new_password = htmlspecialchars($_POST['password']);

    if (!empty($token) && !empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expiration = NULL WHERE reset_token = ? AND token_expiration > NOW()");
        $stmt->execute([$hashed_password, $token]);

        if ($stmt->rowCount()) {
            header("Location: index.php?action=login&reset=success");
        } else {
            $message = "Lien de réinitialisation invalide ou expiré.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <div class="container">
        <h1>Réinitialisation</h1>
        <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>
        <form action="" method="POST">
            <input type="password" name="password" placeholder="Nouveau mot de passe" required>
            <button type="submit">Réinitialiser</button>
        </form>
    </div>
</body>
</html>
