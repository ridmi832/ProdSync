<?php 
session_start();
include('db_connect.php');
if (!isset($_SESSION['admin_id'])) {
  header("Location: login.php");
  exit();
}

// Logout functionality
if(isset($_GET['logout'])){
  session_destroy();
  header('location:login.php'); // Redirect to login page after logout
}

// Delete user functionality
if(isset($_GET['delete'])){
  $user_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM users WHERE user_id=$user_id");
  header('location:view_users.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Users</title>
  <link href="admin.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="logo-space">
      <
      <img src="prodsync-high-resolution-logo-transparent.png" alt="Logo" class="logo"> 
    </div>
    <h2 class="page-title">User List</h2>
    
    <?php
    $select = mysqli_query($conn, "SELECT user_id, username, email, full_name FROM users");
    ?>

    <div class="user-display">
      <table class="user-display-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Action</th>              
          </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($select)){
          echo '<tr>';
          echo '<td>' . $row['user_id'] . '</td>';
          echo '<td>' . $row['username'] . '</td>';
          echo '<td>' . $row['full_name'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>
            <a href="admin_edit.php?user_id=' . $row['user_id'] . '" class="btn"><i class="fas fa-edit"></i> Edit</a>
            <a href="view_users.php?delete=' . $row['user_id'] . '" class="btn" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</a>
          </td>';
          echo '</tr>';
        }
        ?>
        </tbody>
      </table>
    </div>
    
    <div class="back-btn-container">
      <a href="admin_dashboard.php" class="go-back-btn">Go Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
