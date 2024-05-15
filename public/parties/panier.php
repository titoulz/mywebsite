<?php
session_start();

// Connect to the database
require_once '../../private/db-config.php';
$pdo = getConnexion();
$totalCart = 0;
// Check if pseudo is set in the session
if (!isset($_SESSION['pseudo'])) {
    // Handle the case where pseudo is not set, e.g., redirect to login or show a message
    exit('You must be logged in to view your cart.');
}

$pseudo = $_SESSION['pseudo'];

// Fetch user_id from the database using the pseudo
$stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ?");
$stmt->execute([$pseudo]);
$user = $stmt->fetch();

if ($user) {
    $user_id = $user['id'];

// Prepare the SQL statement
    $stmt = $pdo->prepare("SELECT p.product_name, p.product_price, c.quantity, (p.product_price * c.quantity) as total FROM panier c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?");
    // Execute the SQL statement
    $stmt->execute([$user_id]);

    // Fetch all the cart items
    $cartItems = $stmt->fetchAll();

    // Now, you can loop through $cartItems in your HTML to display them
} else {
    exit('User not found.');
}
?>

<!DOCTYPE html>
<html lang="fr">
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
<nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>>_MYWEBSITE</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <style>
            body {
                padding-top: 70px; /* Adjust this value as needed */
            }
        </style>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../../index.php/#tarifs#Accueil">Accueil</a>
                <a class="nav-link active" href="../../index.php/#tarifs">Formules et tarifs</a>
                <a class="nav-link active" href="../../index.php/#tarifs#activités">prestations</a>
                <a class="nav-link active" href="../../index.php/#tarifs#noslocaux"> Nos locaux et horaires</a>
                <a class="nav-link active" href="../../index.php/#tarifs#organigramme">Organigramme</a>
                <a class="nav-link active" href="../../index.php/#tarifs#notreequipe">notre équipe</a>
                <a class="nav-link active" href="../../index.php/#tarifs#Avis">avis</a>
                <a class="nav-link active" href="../../index.php/#tarifs#apropos">A propos de Nous</a>
                <a class="nav-link active" href="../../index.php/#tarifs#notrehistoire">Notre Histoire</a>
                <a class="nav-link active" href="../../index.php/#tarifs#nosinformations">nos informations</a>
                <a class="nav-link active" href="../../index.php/#tarifs#contact"> nous Contacter</a>
                <a class="nav-link active" href="public/parties/connexion.php"> se connecter</a>
                <a class="nav-link active" href="../parties/register.php"> s'enregistrer</a>
                <a class="nav-link active" href="public/parties/panier.php"> Mon panier</a>
            </div>
        </div>
    </div>
</nav>

<body>
<h2>Mon Panier</h2>
<a href="facture.php">Voir ma facture</a>
<table class="table">
    <thead>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th> <!-- New Action column -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cartItems as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
            <td><?php echo htmlspecialchars($item['product_price']); ?></td>
            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
            <td><?php echo htmlspecialchars($item['total']); ?></td>
            <td>
                <form action="remove_from_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['product_id']); ?>">
                    <input type="submit" value="Remove">
                </form>
            </td> <!-- New Remove button -->
        </tr>
        <?php
        $totalCart += $item['total']; // Add item total to total cart
    endforeach; ?>
    <tr>
        <td colspan="4">Total Cart</td>
        <td><?php echo htmlspecialchars($totalCart); ?></td> <!-- Display the total cart -->
    </tr>
    </tbody>
</table>
</body>
</html>
