<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials
    $hardcodedUsername = "admin";
    $hardcodedPassword = "admin1";

    // Check credentials
    if ($username === $hardcodedUsername && $password === $hardcodedPassword) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_page.php');
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
footer {
position: absolute; /* Position the footer at the bottom of the wrapper */
bottom: 0;
left: 0;
width: 100%;
background: #007bff;
color: white;
text-align: center;
padding: 20px 0;
       }
       </style>
<body>
   
    <!-- Navigation -->
    <nav class="text-center">
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="contact.php">Contact</a>
        <a href="admin_login.php">Admin Login</a>
    </nav>
    <main>
    <form method="post">
        <h2>Admin Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
      <!-- Footer -->
      <footer>
        <p>&copy; 2024 Captured Moments. All rights reserved.</p>
</main>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
