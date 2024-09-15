<?php
// add_product.php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity_in_stock = $_POST['quantity_in_stock'];
    $manufactured_machine = $_POST['manufactured_machine'];
    $manufactured_date = $_POST['manufactured_date'];
    $product_quality = $_POST['product_quality'];

    $stmt = $conn->prepare("INSERT INTO products (user_id, product_name, description, price, quantity_in_stock, manufactured_machine, manufactured_date, product_quality) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdssss", $user_id, $product_name, $description, $price, $quantity_in_stock, $manufactured_machine, $manufactured_date, $product_quality);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Add Product</h1>
            <nav>
                <a href="index.php" class="icon">Back to Dashboard</a>
            </nav>
        </header>
        <main>
            <form action="add_product.php" method="post">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>
                
                <label for="quantity_in_stock">Quantity in Stock:</label>
                <input type="number" id="quantity_in_stock" name="quantity_in_stock" required>
                
                <label for="manufactured_machine">Manufactured Machine:</label>
                <input type="text" id="manufactured_machine" name="manufactured_machine" required>
                
                <label for="manufactured_date">Manufactured Date:</label>
                <input type="date" id="manufactured_date" name="manufactured_date" required>
                
                <label for="product_quality">Product Quality:</label>
                <select id="product_quality" name="product_quality" required>
                    <option value="good">Good</option>
                    <option value="average">Average</option>
                    <option value="bad">Bad</option>
                </select>
                
                <button type="submit">Add Product</button>
            </form>
        </main>
    </div>
</body>
</html>
