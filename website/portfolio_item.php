
<?php
require 'db_config.php'; // Include your database connection file

// Get the portfolio item ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch portfolio item from the database
$stmt = $conn->prepare("SELECT * FROM portfolio WHERE id = ?");
$stmt->execute([$id]);
$portfolio_item = $stmt->fetch(PDO::FETCH_ASSOC);

// If no item is found, show a 404-like message
if (!$portfolio_item) {
    echo "<h1>Portfolio item not found</h1>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style> 

/* General Reset */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 90%;
    display: flex;
    justify-content: center; /* Centers horizontally */
    align-items: center; /* Centers vertically */
    background-color: #f4f4f9;
    color: #333;
    padding-top: 60px; /* Adjust based on the height of your navbar */
}

/* Style for the navigation bar */
nav {
    background-color: #007bff; /* Blue background color */
    text-align: center;       /* Center-align text */
    padding: 10px 0;          /* Add some padding for height */
    width: 100%;              /* Ensure the bar spans full width */
    position: fixed;          /* Fix it to the top of the page */
    top: 0;                   /* Align it to the top */
    z-index: 1000;           /* Keep it on top of other content */
    height: 50px; /* Set a fixed height for the navbar */
}

/* Style for the list */
nav ul {
    margin: 0;
    padding: 0;
    list-style-type: none;    /* Remove bullet points */
}

/* Style for list items */
nav ul li {
    display: inline-block;    /* Arrange items horizontally */
    margin: 0 15px;           /* Add spacing between items */
}

/* Style for links */
nav ul li a {
    color: white;             /* White text color */
    text-decoration: none;    /* Remove underline */
    font-size: 18px;          /* Increase font size */
    font-weight: bold;        /* Make text bold */
    transition: color 0.3s;   /* Smooth hover transition */
}

/* Hover effect */
nav ul li a:hover {
    color: #ffd700;           /* Change color to gold on hover */
}


/* Parent Container for Flexbox Layout */
.parent-container {
    display: flex;
    flex-wrap: wrap; /* Wrap cards to the next line if needed */
    justify-content: center; /* Center-align cards */
    gap: 30px; /* Add consistent spacing between cards */
    padding: 20px; /* Add padding around the entire grid */
}

/* Individual Card Styling */
.details-container {
    width: 200px; /* Fixed width for all cards */
    background: #fff;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Ensure proper spacing within the card */
}

/* Ensure All Cards are Equal Height */
.details-container {
    min-height: 350px; /* Set a minimum height to align cards */
    max-height: 450px; /* Optional: Prevent excessively tall cards */
}

/* Image Styling */
.details-image img {
    width: 90%;
    height: 200px; /* Fixed height for uniformity */
    object-fit: cover; /* Keeps aspect ratio while cropping */
    border-radius: 10px; /* Rounded corners */
    margin-bottom: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Depth effect */
}

/* Card Content Styling */
.details-content h1 {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    text-align: center;
}

.details-content .category {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
    text-align: center;
}

.details-content .description {
    font-size: 13px;
    color: #777;
    line-height: 1.4;
    margin-bottom: 20px;
    text-align: center;
}

/* Back Button */
.back-btn {
    display: inline-block;
    padding: 12px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    margin-top: auto; /* Push the button to the bottom */
    margin-bottom: 15px; /* Add spacing below */
    transition: background-color 0.3s ease;
    align-self: center; /* Center the button horizontally */
}

.back-btn:hover {
    background-color: #28a745; /* Hover color: green */ 
} 

/* Wrapper to ensure footer stays at the bottom */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Full height of the viewport */
    margin: 0; /* Remove any default margin */
}

/* Main content wrapper */
.parent-container {
    flex: 1; /* Push the footer to the bottom */
    padding: 30px; /* Add spacing around content */
}

/* Footer Styling */
footer {
    background: #007bff;
    color: white;
    text-align: center;
    padding: 0px 0;
    margin-top: auto; /* Push the footer to the very bottom */
    width: 100%; /* Ensure footer spans full width */
    box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow for visual separation */
}
</style>

<body>
 <!-- Navigation Bar -->
 <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="admin_login.php">Admin Login</a></li>
    </ul>
</nav>
<div class="parent-container">
    <!-- Card 1 -->
    <div class="details-container">
        <div class="details-image">
            <img src="portfolioimg1.jpeg" alt="Sonam Bhushal">
        </div>
        <div class="details-content">
            <h1>Sonam Bhushal</h1>
            <p class="category"><strong>Category:</strong> Wedding Photography</p>
            <p class="description">"Capturing your forever moments with love and elegance."</p>
            <a href="portfolio.php" class="back-btn">Back to Portfolio</a>
        </div>
    </div>

   <!-- Card 3  -->
    <div class="details-container">
        <div class="details-image">
            <img src="portfolioimg2.jpeg" alt="Surakshya Pantha">
        </div>
        <div class="details-content">
            <h1>Surakshya Pantha</h1>
            <p class="category"><strong>Category:</strong> Event Photography</p>
            <p class="description">"Turning every celebration into timeless memories."</p>
            <a href="portfolio.php" class="back-btn">Back to Portfolio</a>
        </div>
    </div>

   <!-- Card 3  -->
   <div class="details-container">
        <div class="details-image">
            <img src="portfolio3.jpeg" alt="Amar Bhushal">
        </div>
        <div class="details-content">
            <h2>Amar Bhushal</h2>
            <p class="category"><strong>Category:</strong>Animal Photography</p>
            <p class="description">"Highlighting the beauty and spirit of our furry friends.</p>
            <a href="portfolio.php" class="back-btn">Back to Portfolio</a>
        </div>
        </div>

   <!-- Card 4  -->
   <div class="details-container">  
        <div class="details-image">
            <img src="portfolioimg4.jpeg" alt="Sandhya Thapa">
        </div>
        <div class="details-content">
            <h2>Sandhya Thapa</h2>
            <p class="category"><strong>Category:</strong>Nature Photography</p>
            <p class="description">"Unveiling the serene beauty of the natural world."</p>
            <a href="portfolio.php" class="back-btn">Back to Portfolio</a>
        </div>
        </div>

   <!-- Card 5  -->
   <div class="details-container">
        <div class="details-image">
            <img src="portfolioimg5 (2).jpeg" alt="Akasha Mager">
        </div>
        <div class="details-content">
            <h2>Akasha Mager</h2>
            <p class="category"><strong>Category:</strong> Mountain Photography</p>
            <p class="description">"Chasing the majestic allure of the peaks."</p>
            <a href="portfolio.php" class="back-btn">Back to Portfolio</a>
        </div>
        </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Captured Moments. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 

