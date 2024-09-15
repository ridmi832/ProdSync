<?php 
session_start();
include('db_connect.php');
// Logout functionality
if(isset($_GET['logout'])){
  session_destroy();
  header('location:login.php'); // Redirect to login page after logout
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="aboutUs.css" rel="stylesheet">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> -->
</head>
<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
      </label>
      <div class="logo">
      <img src="prodsync-high-resolution-logo-transparent.png" alt="ProdSync Logo"> <!-- Add your logo image here -->
      </div>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a class="active" href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="admin.php?logout=true">Logout</a></li>
      </ul>
</nav>

<div class="container">
    <section>
        <h1>About Us</h1>
        <p>Welcome to the <strong>ProdSync</strong>, your all-in-one solution for product management and innovation. Our mission is to simplify and optimize the product development process, enabling teams to collaborate efficiently and make data-driven decisions at every step of the product lifecycle.</p>
    </section>
    <section>
        <h2>Our Vision</h2>
        <p>We envision a world where product management is seamless, collaborative, and strategic. Our platform is designed to provide teams with the tools they need to innovate faster, manage resources more effectively, and launch products that align with organizational goals.</p>
    </section>
    <section>
        <h2>What We Offer</h2>
        <ul>
            <li><strong>Comprehensive Product Management:</strong> From initial brainstorming to market release, we provide a structured yet flexible system to manage every aspect of product development.</li>
            <li><strong>Roadmap Planning:</strong> Visualize your product's journey and ensure every milestone is met with clarity and precision.</li>
            <li><strong>Task Tracking:</strong> Keep your team on track with task assignments, progress tracking, and real-time updates.</li>
            <li><strong>Real-Time Analytics:</strong> Make informed decisions based on up-to-the-minute data, ensuring that every step you take is aligned with your product strategy.</li>
        </ul>
    </section>
    <section>
        <h2>Why Choose Us?</h2>
        <p>At <strong>ProdSync</strong>, we’re committed to providing a user-friendly platform that enhances collaboration and drives innovation. Our system is built to scale, ensuring that whether you're a startup or an enterprise, you have the tools to succeed.</p>
    </section>
</div>
</body>
</html>
