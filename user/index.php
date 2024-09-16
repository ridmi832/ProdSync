<?php
// index.php - Dashboard page

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="index_new.css">
</head>
<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>

      </label>
      <div class="logo">
      <img src="../prodsync-high-resolution-logo-transparent.png" alt="ProdSync Logo"> 
      </div>
      <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="aboutUs.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="admin.php?logout=true">Logout</a></li>
      </ul>
    </nav>
    
    <div class="main-container">
        <header class="welcome-header">
            <div>
           <h1> Hi <?php echo $_SESSION['username']; ?>! Welcome to ProdSync</h1>
            </div>
        </header>
        <main class="background-section">
            <!-- Main content goes here -->
            <div class="button container">
            <a href="add_product.php" class="custom-button">Add Product</a>
            <a href="view_products.php" class="custom-button">View Products</a>
            <a href="../logout.php" class="custom-button">Logout</a>
            </div>
        </main>
    </div>
</body>
</html>

