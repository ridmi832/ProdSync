<?php 
session_start();
include('../db_connect.php');
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../login.php");
  exit();
}




// Logout functionality
if(isset($_GET['logout'])){
  session_destroy();
  header('location:../login.php'); // Redirect to login page after logout
}

// Count users query
$user_count_query = "SELECT COUNT(*) as user_count FROM users";
$user_count_result = mysqli_query($conn, $user_count_query);
$user_count = mysqli_fetch_assoc($user_count_result)['user_count'];


if(isset($_POST['add_user'])){
  // Retrieve form data correctly
  $username = $_POST['username'];
  $password = $_POST['password']; 
  $email = $_POST['email'];
  $full_name =$_POST['full_name'];

  // Check for empty fields
  if(empty($username) || empty($password) || empty($email) || empty($full_name)){
    $message[] = 'Please fill out all fields';
  } else {
    // Insertion query
    $insert = "INSERT INTO users (username, password,email,full_name ) VALUES ('$username', '$password', '$email','$full_name')";
    $upload = mysqli_query($conn, $insert);

    // Check if query executed successfully
    if($upload){
      // Get the last inserted ID
      $last_id = mysqli_insert_id($conn);
      $message[] = 'User added successfully! ID: ' . $last_id;
    } else {
      $message[] = 'Failed to add user. Error: ' . mysqli_error($conn);
    }
  }
};

if(isset($_GET['delete'])){
  $user_id=$_GET['delete'];
  mysqli_query($conn,"DELETE FROM users WHERE user_id=$user_id");
  header('location:admin.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link href="admin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="logo-space">
      <img src="../prodsync-high-resolution-logo-transparent.png" alt="Logo" class="logo"> 
    </div>
  <div class="container">
   
    <?php
    // Display messages
    if(isset($message)){
      foreach($message as $msg){
        echo '<span class="message">'.$msg.'</span>';
      }
    }
    ?>
    <div class="admin-user-form-container">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h3>Add new user</h3>
        <input type="text" placeholder="Enter username" name="username" class="box">
        <input type="text" placeholder="Enter password" name="password" class="box">
        <input type="text" placeholder="Enter email" name="email" class="box">
        <input type="text" placeholder="Enter full_name" name="full_name" class="box">
        <input type="submit" name="add_user" class="btn" value="Add user">
        <a href="admin_dashboard.php" class="btn">Go Back to Dashboard</a>
      </form>
    </div>
  </div>
</body>
</html>
