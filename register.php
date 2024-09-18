<?php
// register.php

include 'db_connect.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username =$_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $full_name =$_POST['full_name'];


    // Check if username or email already exists
   $check_stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $existing_user = $check_stmt->get_result()->fetch_assoc();

    if ($existing_user) {
        $error = "Username or email already exists.";
    } else {
        
        // Insert new user into the database
        $insert_stmt = $conn->prepare("INSERT INTO users (username, password, email, full_name) VALUES (?, ?, ?, ?)");
        $insert_stmt->bind_param("ssss", $username, $password, $email, $full_name);
        $insert_stmt->execute();

        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } 

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login_register.css">
</head>
<body>
    <div class="container">
        <header>
        <div class="logo">
                <img src="prodsync-high-resolution-logo-transparent.png" alt="ProdSync Logo"> 
            </div>
            <h1>Register</h1>
        </header>
        <main>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="register.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
                
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </main>
    </div>
</body>
</html>