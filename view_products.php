<?php
// view_products.php

// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php'; // Include your database connection file
$user_id = $_SESSION['user_id'];

// Fetch products
$product_query = $conn->prepare("SELECT * FROM products WHERE user_id = ?");
$product_query->bind_param("i", $user_id);
$product_query->execute();
$products_result = $product_query->get_result();

if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $delete_stmt = $conn->prepare("DELETE FROM products WHERE product_id = ? AND user_id = ?");
    $delete_stmt->bind_param("ii", $product_id, $user_id);
    $delete_stmt->execute();

    header("Location: view_products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>View Products</h1>
            <nav>
                <a href="index.php" class="icon">Back to Dashboard</a>
            </nav>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity in Stock</th>
                        <th>Manufactured Machine</th>
                        <th>Manufactured Date</th>
                        <th>Product Quality</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($product = $products_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                            <td><?php echo htmlspecialchars($product['quantity_in_stock']); ?></td>
                            <td><?php echo htmlspecialchars($product['manufactured_machine']); ?></td>
                            <td><?php echo htmlspecialchars($product['manufactured_date']); ?></td>
                            <td><?php echo htmlspecialchars($product['product_quality']); ?></td>
                            <td><a class="delet-btn"   href="view_products.php?delete=<?php echo $product['product_id']; ?>">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
