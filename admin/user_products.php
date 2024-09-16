<?php
session_start();
include('../db_connect.php');

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit();
}

// Check if user_id is provided
if (!isset($_GET['user_id'])) {
    header('Location: view_users.php');
    exit();
}

$user_id = $_GET['user_id'];

// Fetch user details
$user_query = mysqli_query($conn, "SELECT username FROM users WHERE user_id = $user_id");
$user = mysqli_fetch_assoc($user_query);

// Fetch user's products
$products_query = mysqli_query($conn, "SELECT * FROM products WHERE user_id = $user_id");

// Handle product deletion
if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    mysqli_query($conn, "DELETE FROM products WHERE product_id = $product_id AND user_id = $user_id");
    header("Location: user_products.php?user_id=$user_id");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Products</title>
    <link href="adminproduct_management.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="logo-space">
      <img src="../prodsync-high-resolution-logo-transparent.png" alt="Logo" class="logo"> 
    </div>
        <h2>Products for <?php echo htmlspecialchars($user['username']); ?></h2>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity in Stock</th>
                        <th>Manufactured Machine</th>
                        <th>Manufactured Date</th>
                        <th>Product Quality</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($product = mysqli_fetch_assoc($products_query)) : ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['quantity_in_stock']; ?></td>
                            <td><?php echo htmlspecialchars($product['manufactured_machine']); ?></td>
                            <td><?php echo $product['manufactured_date']; ?></td>
                            <td><?php echo htmlspecialchars($product['product_quality']); ?></td>
                            <td>
                                <a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn">Edit</a>
                                <a href="user_products.php?user_id=<?php echo $user_id; ?>&delete_product=<?php echo $product['product_id']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <a href="view_users.php" class="btn back-btn">Back to Users</a>
    </div>
</body>
</html>