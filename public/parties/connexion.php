
<?php
require_once '../../private/db-config.php';

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login2 = filter_var($_POST['login2'], FILTER_VALIDATE_EMAIL) ? $_POST['login2'] : null;
    $password2 = $_POST['password2'];

    if ($login2) {
        $pdo = getConnexion();
        $stmt = $pdo->prepare("SELECT pseudo, password_hash FROM users WHERE login = ?");
        $stmt->execute([$login2]);
        $user = $stmt->fetch();

        if ($user && password_verify($password2, $user['password_hash'])) {
            $_SESSION['pseudo'] = $user['pseudo']; // Store pseudo in session
            header('Location: ../../index.php'); // Redirect to index.php
            exit;
        } else {
            echo "Password non valide";
        }
    } else {
        echo "Login2 doit être une adresse email valide.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
</head>
<body>
<form method="post">
    <h2>Connexion</h2>
    Login2 ? <input type="email" name="login2" required><br>
    Password2 ? <input type="password" name="password2" required><br>
    <button type="submit">Vérifier</button>
</form>
</body>
</html>