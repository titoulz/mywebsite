<?php
session_start();
require_once '../../private/db-config.php';

if (!isset($_SESSION['pseudo'])) {
    echo "Please log in to view your cart.";
    exit;
}

$pdo = getConnexion();
$stmt = $pdo->prepare("SELECT p.designation, p.prix, c.quantity FROM panier c JOIN products p ON c.product_id = p.idproduit WHERE c.user_id = ?");
$stmt->execute([$_SESSION['pseudo']]);
$cartItems = $stmt->fetchAll();

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
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php foreach ($cartItems as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['designation']); ?></td>
            <td><?php echo htmlspecialchars($item['prix']); ?></td>
            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>