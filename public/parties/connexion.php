
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
<head>
    <title>Mon Panier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    body {
        padding-top: 70px; /* Adjust this value as needed */
    }
</style>
<html lang="fr">
<head>
    <title>Connexion</title>
</head>
<nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>>_MYWEBSITE</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#Accueil">Accueil</a>
                <a class="nav-link active" href="../../index.php/#tarifs">Formules et tarifs</a>
                <a class="nav-link active" href="../../index.php/#activités">prestations</a>
                <a class="nav-link active" href="../../index.php/#noslocaux"> Nos locaux et horaires</a>
                <a class="nav-link active" href="../../index.php/#organigramme">Organigramme</a>
                <a class="nav-link active" href="../../index.php/#notreequipe">notre équipe</a>
                <a class="nav-link active" href="../../index.php/#Avis">avis</a>
                <a class="nav-link active" href="../../index.php/#apropos">A propos de Nous</a>
                <a class="nav-link active" href="../../index.php/#notrehistoire">Notre Histoire</a>
                <a class="nav-link active" href=../../index.php/#nosinformations">nos informations</a>
                <a class="nav-link active" href="../../index.php/#contact"> nous Contacter</a>
                <a class="nav-link active" href="connexion.php"> se connecter</a>
                <a class="nav-link active" href="public/parties/register.php"> s'enregistrer</a>
            </div>
        </div>
    </div>
</nav>
<body>
<form method="post">
    <h2>Connexion</h2>
    Login2 ? <input type="email" name="login2" required><br>
    Password2 ? <input type="password" name="password2" required><br>
    <button type="submit">Vérifier</button>
</form>
</body>
</html>