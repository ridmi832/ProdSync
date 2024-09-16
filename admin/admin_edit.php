<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('../db_connect.php');
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../login.php");
  exit();
}

$user_id = $_GET['user_id'] ?? null;

if(isset($_POST['update_user'])){
  // Retrieve form data correctly
  $username = $_POST['username'];
  $password = $_POST['password']; 
  $email = $_POST['email'];
  $full_name =$_POST['full_name'];

  // Check for empty fields
  if(empty($username) || empty($password) || empty($email) || empty($full_name)){
    $message[] = 'Please fill out all fields';
  } else {
    // Update query
    $update = "UPDATE users SET username='$username', password='$password', email='$email',full_name='$full_name' WHERE user_id=$user_id";
    $upload = mysqli_query($conn, $update);

    // Check if query executed successfully
    if($upload){
      $message[] = 'User updated successfully!';
    } else {
      $message[] = 'Failed to update user. Error: ' . mysqli_error($conn);
    }
  }
}

// Fetch user data for pre-filling the form
$select = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");
$row = mysqli_fetch_assoc($select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Edit</title>
  <link href="admin.css" rel="stylesheet">
</head>
<body>
  
  <?php
  // Display messages
  if(isset($message)){
    foreach($message as $msg){
      echo '<span class="message">'.$msg.'</span>';
    }
  }
  ?>
  <div class="container">
    <div class="logo-space">
      <img src="../prodsync-high-resolution-logo-transparent.png" alt="Logo" class="logo"> 
    </div>
    <div class="admin-user-form-container centered">
      <?php if ($row): ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?user_id=' . $user_id; ?>" method="post">
          <h3>Update the user</h3>
          <input type="text" placeholder="Enter username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" class="box">
          <input type="text" placeholder="Enter password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" class="box">
          <input type="text" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" class="box">
          <input type="text" placeholder="Enter full_name" name="full_name" value="<?php echo htmlspecialchars($row['full_name']); ?>" class="box">
          <input type="submit" name="update_user" class="btn" value="Update user">
          <a href="admin_dashboard.php" class="btn">Go Back to Dashboard</a>
        </form>
      <?php else: ?>
        <p>User not found.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
