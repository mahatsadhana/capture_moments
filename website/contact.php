<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
     <style>
footer {
position:absolute; /* Position the footer at the bottom of the wrapper */
bottom: 0;
left: 0;
width: 100%;
background: #007bff;
color: white;
text-align: center;
padding: 0px 0;
       }
       </style>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="contact.php">Contact</a>
        <a href="admin_login.php">Admin Login</a>
    </nav>
    <form method="post" action="process_contact.php">
    <div class="contact-section">
        <h1>Get in Touch</h1>
        <p>Have questions or feedback? Drop us a message below!</p>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your message here..." required></textarea><br><br>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
    </form>


      <!-- Footer -->
      <footer>
        <p>&copy; 2024 Captured Moments. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



