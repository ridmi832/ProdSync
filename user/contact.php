<?php 
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
  <title>Contact Us</title>
  <link href="contact.css" rel="stylesheet">
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
    <li><a href="home.php">Home</a></li>
    <li><a href="aboutUs.php">About</a></li>
    <li><a class="active" href="contact.php">Contact</a></li>
    <li><a href="help.php">Help</a></li>
    <li><a href="../logout.php">Logout</a></li>
  </ul>
</nav>

<div class="container">
  <section class="contact-section">
    <h1>Contact Us</h1>
    <p>If you have any questions, feedback, or need assistance, feel free to contact us using the information below:</p>
    
    <div class="contact-info">
      <section>
        <h2>Website Owners</h2>
        <ul>
          <li><strong>John Doe:</strong> (+94)76 456-7890</li>
          <li><strong>Jane Smith:</strong> (+94)71 567-8901</li>
        </ul>
      </section>
      
      <section>
        <h2>Support Team</h2>
        <ul>
          <li><strong>Admin Support:</strong> (+75) 678-9012</li>
          <li><strong>Technical Support:</strong> (+76) 678-9012</li>
        </ul>
      </section>
      
      <section>
        <h2>Email</h2>
        <p>For general inquiries: <a href="mailto:info@prodsync.com">info@prodsync.com</a></p>
      </section>
    </div>
  </section>
</div>

</body>
</html>