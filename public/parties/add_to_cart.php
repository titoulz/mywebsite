<?php
// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Check if the product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Get product details from the database
    require_once '../../private/db-config.php';
    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    // Debug: Afficher le produit
    var_dump($product);

    // Get user_id from the database using the username
    $stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ?");
    $stmt->execute([$_SESSION['pseudo']]);
    $user = $stmt->fetch();

    if ($user) {
        $user_id = $user['id'];

        // Check if the product is already in the cart
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $product_id]);
        $cartItem = $stmt->fetch();

        if ($cartItem) {
            // If it is, increment the quantity
            $stmt = $pdo->prepare("UPDATE panier SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$user_id, $product_id]);
        } else {
            // If not, add it with quantity 1
            $stmt = $pdo->prepare("INSERT INTO panier (user_id, product_id, quantity) VALUES (?, ?, 1)");
            $stmt->execute([$user_id, $product_id]);
        }
        header('Location: /public/parties/panier.php');


        // Debug: Afficher le panier
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $cart = $stmt->fetchAll();
        var_dump($cart);

    } else {
        echo "User not found.";
        exit;
     }
}
?>