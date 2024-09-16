<?php
session_start(); // This initializes the session

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
  <title>Home | Product Management System</title>
  <link  href="home_styles.css" rel="stylesheet" />
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
      <img src="../prodsync-high-resolution-logo-transparent.png" alt="ProdSync Logo">
    </div>
    <ul>
      <li><a class="active" href="home.php">Home</a></li>
      <li><a href="aboutUs.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="help.php">Help</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </nav>

  <!-- Home Page Content -->
  <div class="container">
    <section class="home-intro">
      <h1>Welcome to Our System</h1>
      <p>Welcome to the system, <strong>ProdSync</strong> the comprehensive product management system designed to transform the way you develop, launch, and manage products. We empower teams to seamlessly collaborate across every stage of the product lifecycle—from ideation to market release. With powerful tools for roadmap planning, task tracking, and real-time analytics, we ensure that every product decision is data-driven and aligned with your strategic goals.</p>
    </section>

    <!-- Features Section -->
    <section class="features">
      <div class="feature-item">
        <h2>Seamless Collaboration</h2>
        <p>Empower your team with collaborative tools that bridge the gap between idea generation and product launch.</p>
      </div>
      <div class="feature-item">
        <h2>Data-Driven Decisions</h2>
        <p>Track real-time analytics and ensure all your product decisions are aligned with business goals.</p>
      </div>
      <div class="feature-item">
        <h2>Task Management</h2>
        <p>Stay organized and manage your team's tasks with an intuitive task-tracking system.</p>
      </div>
    </section>

    <!-- Dashboard Button -->
    <div class="dashboard-btn-container">
      <a href="index.php" class="dashboard-btn">Go to User Dashboard</a>
    </div>
  </div>
</body>
</html>
