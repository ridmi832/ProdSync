e e<?php
// login.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include ('db_connect.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // SQL query to fetch user details
  $stmt = $conn->prepare("SELECT admin_id, password FROM admins WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  


  if ($result->num_rows == 1) {
      $admin = $result->fetch_assoc();
      if ($password== $admin['password']) {
           session_regenerate_id(true); // Protect against session fixation attacks
          $_SESSION['admin_id'] = $admin['admin_id'];  // Store admin ID in session
          $_SESSION['username'] = $username;
          header("Location: admin/admin_dashboard.php");
          exit();
      } else {
          $error_message = "Incorrect password.";
      }
  } else {
      $error_message = "No admin found with that username.";
  }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="newstylesheet.css">
</head>
<body>
    <div class="container">
        <header>
        <div class="logo">
                <img src="prodsync-high-resolution-logo-transparent.png" alt="ProdSync Logo"> <!-- Add your logo image here -->
            </div>
            <h1>Admin Login</h1>
        </header>
        <main>
            <?php if (isset($error_message)): ?>
                <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Login</button>
            </form>
            
        </main>
    </div>
</body>
</html>
