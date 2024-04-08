<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Blood Donation Network</title>
  <style>
    body {
      background-color: #fff;
      color: #333;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh; /* Ensure body covers the full viewport height */
      position: relative; /* Set body position to relative */
    }
    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 20px;
      display: flex; /* Make the container a flexbox for side-by-side sections */
    }
    .header {
      background-color: #006400;
      color: white;
      padding: 10px 0;
      text-align: center;
      display: flex;
      justify-content: flex-end; 
    }
    .header h1 {
      margin: 0;
    }
    .navigation {
      margin-top: 10px;
    }
    .navigation a {
      color: white;
      margin-left: 10px;
      text-decoration: none;
    }
    .sidebar {
      flex: 1; 
      padding: 20px;
      background-color: #AF1831; 
      color: white; 
    }
    .sidebar h3 {
      color: white; 
      font-size: 20px;
      margin-bottom: 10px;
    }
    .sidebar p {
      margin-bottom: 10px;
      color: white; 
    }
    .contact-info p {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
      color: white;
    }
    .contact-info p i {
      color: #AF1831;
      margin-right: 5px;
    }
    .main-content {
      flex: 2;
      padding: 20px;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #AF1831;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #850D1C;
    }
    footer {
      background-color: #006400;
      color: white;
      text-align: center;
      padding: 10px 0;
      width: 100%; 
      position: absolute; 
      bottom: 0; 
    }
  </style>
</head>
<body>
  <header class="header">

    <!-- Navigation Links -->
    <div class="navigation">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="#how-it-works">How it Works</a>
        <a href="#register">Register As Donor</a>
        <a href="#contact">Contact Us</a>
    </div>
  </header>

  <div class="container">
    <div class="sidebar">
      <h3 style="background-color: #AF1831;">Convey Your Ideas to Us</h3>
      <p>Your support is vital to our life-saving mission. Whether you have questions about donating blood or want to partner with us, we're here to help.</p>
      <div class="contact-info">
        <p><i class="fa fa-phone"></i> +255 749888291</p>
        <p><i class="fa fa-envelope"></i> info@blooddonationnetwork.co.tz</p>
        <p><i class="fa fa-map-marker"></i> 123 Aggrey Street, Dar es Salaam, Tanzania</p>
      </div>
    </div>

    <div class="main-content">
      <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Blood Donation Network. All Rights Reserved.</p>
  </footer>
</body>
</html>
