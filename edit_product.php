<?php
session_start();
include('db_connect.php');

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Check if product_id is provided
if (!isset($_GET['product_id'])) {
    header('Location: view_users.php');
    exit();
}

$product_id = $_GET['product_id'];

// Fetch product details
$product_query = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");
$product = mysqli_fetch_assoc($product_query);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = floatval($_POST['price']);
    $manufactured_machine = mysqli_real_escape_string($conn, $_POST['manufactured_machine']);
    $manufactured_date = mysqli_real_escape_string($conn, $_POST['manufactured_date']);
    $product_quality = mysqli_real_escape_string($conn, $_POST['product_quality']);
    
    $update_query = "UPDATE products SET 
                     product_name = '$product_name', 
                     description = '$description', 
                     price = $price, 
                     manufactured_machine = '$manufactured_machine', 
                     manufactured_date = '$manufactured_date', 
                     product_quality = '$product_quality' 
                     WHERE product_id = $product_id";
    
    mysqli_query($conn, $update_query);
    
    header("Location: user_products.php?user_id=" . $product['user_id']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="adminproduct_management.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        
        <form method="POST">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
            
            <label for="manufactured_machine">Manufactured Machine:</label>
            <input type="text" id="manufactured_machine" name="manufactured_machine" value="<?php echo htmlspecialchars($product['manufactured_machine']); ?>" required>
            
            <label for="manufactured_date">Manufactured Date:</label>
            <input type="date" id="manufactured_date" name="manufactured_date" value="<?php echo $product['manufactured_date']; ?>" required>
            
            <label for="product_quality">Product Quality:</label>
            <input type="text" id="product_quality" name="product_quality" value="<?php echo htmlspecialchars($product['product_quality']); ?>" required>
            
            <button type="submit" class="btn">Update Product</button>
        </form>
        
        <a href="user_products.php?user_id=<?php echo $product['user_id']; ?>" class="btn back-btn">Back to User Products</a>
    </div>
</body>
</html>