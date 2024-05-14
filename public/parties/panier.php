<?php
session_start();
require_once '../../private/db-config.php';

// Check if $_SESSION['pseudo'] is set
if (!isset($_SESSION['pseudo'])) {
    echo "Please log in.";
    exit;
}

$pdo = getConnexion();

// Check if $_SESSION['pseudo'] corresponds to a valid user_id
$stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ?");
$stmt->execute([$_SESSION['pseudo']]);
$user = $stmt->fetch();

if (!$user) {
    echo "Invalid user.";
    exit;
}


$pdo = getConnexion();
$stmt = $pdo->prepare("SELECT p.product_name, p.product_price, c.quantity FROM panier c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?");
$stmt->execute([$_SESSION['pseudo']]);
$cartItems = $stmt->fetchAll();

// Debug: Afficher les éléments du panier
var_dump($cartItems);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mon Panier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<h2>Mon Panier</h2>
<table class="table">
    <thead>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cartItems as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
            <td><?php echo htmlspecialchars($item['product_price']); ?></td>
            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
