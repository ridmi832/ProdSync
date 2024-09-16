<?php 
session_start(); // This initializes the session

// Check if either user_id or admin_id is set in the session
if (isset($_SESSION['user_id'])) {
    // User is logged in (either as regular user or admin)
    // The page will continue to load here
} else {
    // Neither user_id nor admin_id is set in the session
    header('Location: ../login.php'); // Redirect to login page
    exit(); // Stop executing the rest of the script
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
    <p>If you have any questions, feedback, or need assistance, feel free to contact us using the form below:</p>
    
    <form action="contact_process.php" method="post">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Your full name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" placeholder="Your message" required></textarea>
      </div>
      <input type="submit" value="Send Message" class="btn">
    </form>
  </section>
</div>

</body>
</html>
