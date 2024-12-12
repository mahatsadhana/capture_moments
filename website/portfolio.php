

<?php
require 'db_config.php';

// Fetch all portfolio items from the database
$stmt = $conn->query("SELECT * FROM portfolio");
$portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portfolio</title>
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
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="gallery.php">Gallery</a>
                <a href="portfolio.php" class="active">Portfolio</a>
                <a href="contact.php">Contact</a>
                <a href="admin_login.php">Admin Login</a>
            </div>
        </div>
    </nav>

    <!-- Portfolio Grid -->
    <div class="portfolio-grid">
        <?php foreach ($portfolios as $portfolio): ?>
            <div class="portfolio-item">
                <!-- Image Section -->
                <!-- <div class="portfolio-image" style="background-image: url('<?php echo htmlspecialchars($portfolio['image_url']); ?>');"></div> -->
                
                <!-- Details Section -->
                <div class="portfolio-details">
                    <h3><?php echo htmlspecialchars($portfolio['title']); ?></h3>
                    <p><?php echo htmlspecialchars($portfolio['description']); ?></p>
                    <a href="portfolio_item.php?id=<?php echo $portfolio['id']; ?>" class="btn">View Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
      <!-- Footer -->
      <footer>
        <p>&copy; 2024 Captured Moments. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>






