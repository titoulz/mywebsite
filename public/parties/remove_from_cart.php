<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Connect to the database
require_once '../../private/db-config.php';
$pdo = getConnexion();

// Check if product_id is set in the POST request
if (!isset($_POST['product_id'])) {
    exit('No product id provided.');
}

$product_id = $_POST['product_id'];
$pseudo = $_SESSION['pseudo'];

// Fetch user_id from the database using the pseudo
$stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ?");
$stmt->execute([$_SESSION['pseudo']]);
$user = $stmt->fetch();

if ($user) {
    $user_id = $user['id'];

    // Prepare the SQL statement to remove the item from the cart
    $stmt = $pdo->prepare("DELETE FROM panier WHERE product_id = ? AND user_id = ?");
    $stmt->execute([$product_id, $user_id]);

    // Redirect back to the panier.php page
    header('Location: panier.php');
    exit;
} else {
    exit('User not found.');
}