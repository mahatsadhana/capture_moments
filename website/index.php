<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captured Moments</title>
    <!-- Include Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #fff, #f0f8ff);
           
        }
        header {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img1.jpg') no-repeat center center/cover;
    color: white;
    text-align: center;
    padding: 100px 20px;
}

        header h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.4rem;
            max-width: 600px;
            margin: 0 auto;
        }

        nav {
            background-color: #007bff;
            color: white;
            padding: 15px 0;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        #services {
            padding: 60px 20px;
            text-align: center;
        }

        #services h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #333;
        }

        .service-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            transition: transform 0.3s ease;
        }

        .service-box:hover {
            transform: translateY(-10px);
        }

        .service-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-content {
            padding: 20px;
        }

        .service-content h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #007bff;
        }

        .service-content p {
            font-size: 1rem;
            color: #555;
        }

        #call-to-action {
            background: #ffffff;
            color: #333;
            text-align: center;
            padding: 50px 20px;
            border-top: 1px solid #ddd;
        }

        #call-to-action h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        #call-to-action p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        #call-to-action .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        #call-to-action .cta-button:hover {
            background: #0056b3;
            color: white;
        }

        footer {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to Captured Moments</h1>
        <p>Your one-stop destination for professional photography services. Let us help you capture memories that last forever.</p>
    </header>

    <!-- Navigation -->
    <nav class="text-center">
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="contact.php">Contact</a>
        <a href="admin_login.php">Admin Login</a>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Services Section -->
        <section id="services">
            <h2>Our Services</h2>
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Service 1 -->
                    <div class="col-md-4">
                        <div class="service-box">
                            <img src="Bride - DR_ AARUSHI MADAN in Kunal Vagela.jpg" alt="Wedding Photography">
                            <div class="service-content">
                                <h3>Wedding Photography</h3>
                                <p>Capture the magic of your special day with beautiful, timeless photographs.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service 2 -->
                    <div class="col-md-4">
                        <div class="service-box">
                            <img src="Your Ultimate Guide To Wedding Lighting.jpg" alt="Event Photography">
                            <div class="service-content">
                                <h3>Event Photography</h3>
                                <p>Professional coverage for birthdays, corporate events, and more.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service 3 -->
                    <div class="col-md-4">
                        <div class="service-box">
                            <img src="download (1).jpg" alt="Animal Photography">
                            <div class="service-content">
                                <h3>Animal Photography</h3>
                                <p>Adorable and majestic shots of pets and wildlife.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- Service 4 -->
                    <div class="col-md-4">
                        <div class="service-box">
                            <img src="download.jpg" alt="Nature Photography">
                            <div class="service-content">
                                <h3>Nature Photography</h3>
                                <p>Breathtaking landscapes and serene natural scenes.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service 5 -->
                    <div class="col-md-4">
                        <div class="service-box">
                            <img src="download (2).jpg" alt="Mountain Photography">
                            <div class="service-content">
                                <h3>Mountain Photography</h3>
                                <p>Stunning shots of towering peaks and rugged landscapes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section id="call-to-action">
            <h2>Book Your Session Today!</h2>
            <p>Don't miss out on capturing your special moments. Contact us now to book a session or learn more about our services.</p>
            <a href="contact.php" class="cta-button">Get in Touch</a>
        </section>
    </main>

    
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Captured Moments. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
