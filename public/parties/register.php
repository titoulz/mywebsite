<?php
require_once '../../private/db-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $login = filter_var($_POST['login'], FILTER_VALIDATE_EMAIL) ? $_POST['login'] : null;
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($login && $password) {
        $pdo = getConnexion();

        // Check if user already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();

        if ($user) {
            echo "A user with this login already exists.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (pseudo, login, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$pseudo, $login, $password]);
            echo "Utilisateur enregistré.";
        }
    } else {
        echo "Login doit être une adresse email valide.";
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/mywebsite/css/bootstrap.min.css">
    <link rel="stylesheet" href="/mywebsite/css/stylesheet.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
     <style>
        body {
            padding-top: 70px; /* Adjust this value as needed */
        }
    </style>
</head>
<html lang="fr">
<head>
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
                    <a class="nav-link active" href=../../index.php/"#nosinformations">nos informations</a>
                    <a class="nav-link active" href="../../index.php/#contact"> nous Contacter</a>
                    <a class="nav-link active" href="connexion.php"> se connecter</a>
                    <a class="nav-link active" href="public/parties/register.php"> s'enregistrer</a>
                </div>
            </div>
        </div>
    </nav>
</head>
<body>
<form method="post">
    <h2>Enregistrement</h2>
    Pseudo ? <input type="text" name="pseudo" required><br>
    Login ? <input type="email" name="login" required><br>
    Password ? <input type="password" name="password" required><br>
    <button type="submit">Enregistrer</button>
</form>
</body>
</html>