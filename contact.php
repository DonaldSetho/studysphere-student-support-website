<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf = $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact | StudySphere</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>

<body>

  <!-- Header -->
  <header>
    <div class="logo">
      <a href="index.html">
        <img src="images/logo.png" alt="StudySphere Logo">
        <h1>StudySphere</h1>
      </a>
    </div>

    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="resources.html">Resources</a></li>
        <li><a href="interactive.html">Interactive Learning</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
      </ul>
    </nav>
  </header>

  <!-- Contact Hero Section -->
  <section class="contact-hero">
    <h2>Get in Touch</h2>
    <p>Your feedback helps us improve StudySphere!</p>
  </section>

  <!-- Contact Form Section -->
  <section class="contact-section">
    <div class="container">
      <form id="contactForm" action="php/contact_process.php" method="POST" novalidate>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf); ?>">

        <label>Full Name:</label>
        <input type="text" name="name" required maxlength="100">

        <label>Email Address:</label>
        <input type="email" name="email" required maxlength="254">

        <label>Subject:</label>
        <input type="text" name="subject" required maxlength="150">

        <label>Message:</label>
        <textarea name="message" rows="6" required maxlength="3000"></textarea>

        <!-- Honeypot (spam protection) -->
        <div class="hp" aria-hidden="true">
          <label>Leave this empty: <input type="text" name="website"></label>
        </div>

        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 StudySphere | All Rights Reserved</p>
    <p>Contact: info@studysphere.co.za</p>
    <div class="social-icons">
      <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
    </div>
  </footer>

</body>

</html>