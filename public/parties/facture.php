<?php
session_start();

// Connect to the database
require_once '../../private/db-config.php';
$pdo = getConnexion();

// Check if pseudo is set in the session
if (!isset($_SESSION['pseudo'])) {
    // Handle the case where pseudo is not set, e.g., redirect to login or show a message
    exit('You must be logged in to view your invoice.');
}

$pseudo = $_SESSION['pseudo'];

// Prepare the SQL statement to fetch the cart items
$stmt = $pdo->prepare("SELECT p.product_name, p.product_price, c.quantity FROM panier c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?");

// Execute the SQL statement
$stmt->execute([$pseudo]);

// Fetch all the cart items
$cartItems = $stmt->fetchAll();

// Calculate the total price
$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['product_price'] * $item['quantity'];
}

// Now, you can display the invoice in your HTML
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ma Facture</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .barcode-container {
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f2f2f2;
            border-top: 1px solid black;
        }

        /* Style for the barcode image */
        .barcode-container img {
            max-width: 200px;
            height: auto;

    </style>
</head>
<body>
<h2>Facture pour <?php echo htmlspecialchars($pseudo); ?></h2>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php foreach ($cartItems as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
            <td><?php echo htmlspecialchars($item['product_price']); ?></td>
            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="2">Total</td>
        <td><?php echo htmlspecialchars($totalPrice); ?></td>
    </tr>
    <div class="barcode-container">
        <img src="../../img/pngtree-the-barcode-png-image_8043599.png" alt="Barcode">
    </div>

</table>
</body>
</html>