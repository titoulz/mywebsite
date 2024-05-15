<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['pseudo'])) {
    echo "You must be logged in to remove items from the cart.";
    exit;
}

// Check if the product ID is provided
if (!isset($_POST['product_id'])) {
    echo "Product ID is required.";
    exit;
}

$product_id = $_POST['product_id'];

// Connect to the database
require_once '../../private/db-config.php';
$pdo = getConnexion();

// Get user_id from the database using the username
$stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ?");
$stmt->execute([$_SESSION['pseudo']]);
$user = $stmt->fetch();

if ($user) {
    $user_id = $user['id'];

    // Remove the product from the cart
    $stmt = $pdo->prepare("DELETE FROM panier WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$user_id, $product_id]);

    // Redirect back to the cart page
    header('Location: panier.php');
} else {
    echo "User not found.";
    exit;
}
?>