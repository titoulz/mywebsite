<?php
require_once '../../private/db-config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['commentaire'], $_POST['note']) && strlen($_POST['commentaire']) <= 150) {
        $pdo = getConnexion();
        $stmt = $pdo->prepare("INSERT INTO commentaires (user_id, commentaire, note) VALUES (?, ?, ?)");

        // Simulate a user_id of 1
        $fake_user_id = 1;

        $stmt->execute([$fake_user_id, $_POST['commentaire'], $_POST['note']]);
        header('Location: ../../index.php/#avis');
    } else {
        echo "Please ensure your comment is no more than 150 characters.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un commentaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>
<body>
<h2>Ajouter un commentaire</h2>
<form method="POST" action="ajout_commentaire.php">
    <label for="commentaire">Commentaire:</label><br>
    <textarea id="commentaire" name="commentaire" maxlength="150" required></textarea><br>
    <label for="note">Note:</label><br>
    <input type="number" id="note" name="note" min="0" max="5" required><br>
    <input type="submit" value="Submit">
</form>