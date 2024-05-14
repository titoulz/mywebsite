<?php
session_start();

// Check if the cart exists in the session, if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Get product details from the database
    require_once '../../private/db-config.php';
    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    // Check if the product is already in the cart
    if (!isset($_SESSION['cart'][$product_id])) {
        // If not, add it with quantity 1
        $_SESSION['cart'][$product_id] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1
        ];
    } else {
        // If it is, increment the quantity
        $_SESSION['cart'][$product_id]['quantity']++;
    }

    // Redirect back to the index page
    header('Location: index.php');
    exit;
}
?>
