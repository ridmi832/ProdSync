<?php
session_start(); // This initializes the session

// Check if either user_id or admin_id is set in the session
if (isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])) {
    // User is logged in (either as regular user or admin)
    // The page will continue to load here
} else {
    // Neither user_id nor admin_id is set in the session
    header('Location: login.php'); // Redirect to login page
    exit(); // Stop executing the rest of the script
}

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help | Product Management System</title>
    <link href="help.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                <line x1="4" x2="20" y1="12" y2="12" />
                <line x1="4" x2="20" y1="6" y2="6" />
                <line x1="4" x2="20" y1="18" y2="18" />
            </svg>
        </label>
        <div class="logo">
            <img src="prodsync-high-resolution-logo-transparent.png" alt="ProdSync Logo">
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutUs.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a class="active" href="help.php">Help</a></li>
            <li><a href="admin.php?logout=true">Logout</a></li>
        </ul>
    </nav>


    

    <!-- Help Page Content -->
    <div class="container">
        <section class="help-step">
            <h1>Step 1: Getting Started</h1>
            <p>When you open our system, you will see the login page. If you are not a registered user, go to the "Register Page" and enter your details, then click on the "Register" button. If you are already a registered user, enter your username and password to log in to our system. After logging in, you will be directed to the user dashboard.</p>
            <div class="image-container">
                <div class="image-placeholder">
                    <img src="login.jpeg" alt="Login Page">
                </div>
                <div class="image-placeholder">
                    <img src="register.jpeg" alt="Register Page">
                </div>
            </div>
        </section>

        <section class="help-step">
            <h1>Step 2: Adding Products</h1>
            <p>To add products, navigate to the "Add Product" section from your dashboard. Enter the product details in the provided form and click the "Add Product" button. You can view all added products by returning to the dashboard, where you'll see the product table.</p>
            <div class="image-container">
                <div class="image-placeholder">
                    <img src="user_dashboard.jpeg" alt="Dashboard">
                </div>
                <div class="image-placeholder">
                    <img src="add_product_page.jpeg" alt="Add Product Page">
                </div>
            </div>
        </section>

        <section class="help-step">
            <h1>Step 3: View and Delete Products</h1>
            <p>After adding products, you can view all your products in the product table on your dashboard. To delete a product, locate it in the product table and click on the "Delete" button under the "Action" column in the corresponding product row. You can also edit product details by clicking the "Edit" button next to each product.</p>
            <div class="image-container">
                <div class="image-placeholder">
                    <img src="product-table.jpg" alt="Product Table">
                </div>
            </div>
        </section>

        <section class="thank-you">
            <p>Thank you for using "ProdSync".</p>
        </section>
    </div>
</body>
</html>

</html>
