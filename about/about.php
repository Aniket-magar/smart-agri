<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seasons, Crops, and Farming Tools</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- <link rel="stylesheet" href="about.css"> -->
    <!-- Custom CSS -->
    <style>
        /* Navbar Styles */
        .navbar {
            background: linear-gradient(90deg, #4caf50, #00897b); /* Gradient background */
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }

        .navbar-brand img {
            border-radius: 5px;
        }

        .navbar-toggler-icon {
            background-color: #fff;
            border-radius: 50%;
        }

        .nav-link {
            font-size: 16px;
            font-weight: bold;
            padding: 10px 15px;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .search-bar input {
            width: 200px;
            padding: 5px 10px;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-bar button {
            background-color: #00897b;
            color: #fff;
            border: none;
            margin-left: -5px;
            padding: 8px 12px;
        }

        .search-bar button:hover {
            background-color: #4caf50;
        }

        .dropdown-menu {
            background: #ffffff;
            border: 1px solid #ddd;
        }

        .dropdown-menu a:hover {
            background: #f1f1f1;
            color: #333;
        }

        .navbar-nav .nav-item:not(:last-child) {
            margin-right: 15px;
        }


        /*navbar*/
        .navbar {
    background: linear-gradient(90deg, #4caf50, #00897b); /* Gradient background */
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.navbar-brand img {
    border-radius: 5px;
}

.navbar-toggler-icon {
    background-color: #fff;
    border-radius: 50%;
}

.nav-link {
    font-size: 16px;
    font-weight: bold;
    padding: 10px 15px;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.nav-link:hover {
    color: #ffffff;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

/* Search Bar */
.search-bar {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

.search-bar input {
    width: 200px;
    padding: 5px 10px;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.search-bar button {
    background-color: #00897b;
    color: #fff;
    border: none;
    margin-left: -5px;
    padding: 8px 12px;
}

.search-bar button:hover {
    background-color: #4caf50;
}

/* Navigation List */
.nav-list {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    padding: 0.5px 0;
    background-color: #013220; /* Dark green background */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.nav-list a {
    text-decoration: none;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    padding: 6px 12px;
    border-radius: 3px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-list a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: scale(1.05);
}

/* Responsive Navbar */
@media (max-width: 768px) {
    .nav-list {
        flex-direction: column;
        gap: 10px;
    }

    .nav-list a {
        width: 90%;
        text-align: center;
    }
}
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="../Assets/logo.jpg" width="150px" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Search Bar -->
            <form class="d-flex search-bar" role="search">
                <input class="form-control me-2 rounded-pill" type="search" placeholder="Search for products..." aria-label="Search">
                <button class="btn btn-outline-light search-btn rounded-pill" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Language Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-globe"></i> Language
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Hindi</a></li>
                            <li><a class="dropdown-item" href="#">Marathi</a></li>
                        </ul>
                    </li>

                    <!-- Track Order -->
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            <i class="fas fa-truck"></i> Track Order
                        </a>
                    </li>

                    <!-- User Login -->
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../Login/login.php">
                            <i class="fas fa-user"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Additional Content -->
<!-- Navigation List -->
<div class="nav-list">
    <a href="../HomePage/index.php">Home</a>
    <a href="../product/product.php">Products</a>
    <a href="../harvesting/harvesting.php">Harvesting</a>
    <a href="../weather-forecasting/weather-forecasting.php">Weather</a>
    <a href="../guide/guide.php">Guide</a>
    <a href="about.php">About</a>
</div>

<!-- Add this CSS to your styles -->


<div class="container">
    <h1>About Our Weather Forecast System</h1>
    <p>Our Weather Forecast for Agriculture system is designed to help farmers make **informed agricultural decisions** based on real-time weather data.</p>

    <h2>🌟 Key Features:</h2>
    <ul>
        <li>🌦 Real-time Weather Updates</li>
        <li>🚜 Smart Agriculture Recommendations</li>
        <li>📊 Visual Weather Insights (Charts & Graphs)</li>
        <li>🌍 Easy-to-Use & Responsive Interface</li>
    </ul>

    <h2>🎯 Our Mission:</h2>
    <p>We aim to empower farmers with **accurate weather forecasts** and **data-driven insights** to improve productivity and **reduce climate risks**.</p>

    <a href="../homepage/index.php" class="back-link">⬅ Back to Home</a>
</div>

<!-- Bottom Navbar -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Contact Us Section -->
            <div class="col-md-2">
                <h5>Contact Us</h5>
                <ul>
                    <li><a href="tel:+1234567890">Phone: +1 234 567 890</a></li>
                    <li><a href="mailto:info@agristuff.com">Email: info@agristuff.com</a></li>
                    <li><a href="#">Address: 123 Farm Street, Agri City</a></li>
                </ul>
            </div>
            <!-- About Section -->
            <div class="col-md-2">
                <h5>About</h5>
                <ul>
                    <li><a href="about.asp">Company Info</a></li>
                    <li><a href="terms.asp">Terms & Conditions</a></li>
                    <li><a href="privacy.asp">Privacy Policy</a></li>
                </ul>
            </div>
            <!-- Social Media Links -->
            <div class="col-md-2">
                <h5>Follow Us</h5>
                <ul class="social-media-links">
                    <li><a href="https://www.facebook.com/agristuff" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="https://twitter.com/agristuff" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="https://www.instagram.com/agristuff" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="https://www.linkedin.com/company/agristuff" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
            <!-- Newsletter Signup -->
            <div class="col-md-2">
                <h5>Newsletter</h5>
                <p>Subscribe to our newsletter for the latest updates and offers!</p>
                <form action="#" method="POST">
                    <input type="email" class="form-control" placeholder="Your email" required>
                    <button type="submit" class="btn btn-primary mt-2">Subscribe</button>
                </form>
            </div>
            <!-- Feedback Section -->
            <div class="col-md-2">
                <h5>Feedback</h5>
                <ul>
                    <li><a href="feedback.asp">Give Feedback</a></li>
                    <li><a href="survey.asp">Survey</a></li>
                </ul>
            </div>
            <!-- Help Section -->
            <div class="col-md-2">
                <h5>Help</h5>
                <ul>
                    <li><a href="faq.asp">FAQs</a></li>
                    <li><a href="support.asp">Customer Support</a></li>
                    <li><a href="contact.asp">Contact Support</a></li>
                </ul>
            </div>
            <!-- Tell a Friend Section -->
            <div class="col-md-2">
                <h5>Tell a Friend</h5>
                <ul>
                    <li><a href="refer.asp">Refer a Friend</a></li>
                    <li><a href="share.asp">Share with Friends</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 AgriStuff. All rights reserved.</p>
    </div>
</footer>

<style>
    .footer {
        background-color: #013220; /* Dark green background */
        color: #fff;
        padding: 40px 0;
    }

    .footer h5 {
        font-size: 1.2rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .footer ul {
        list-style: none;
        padding: 0;
    }

    .footer ul li {
        margin-bottom: 10px;
    }

    .footer ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer ul li a:hover {
        color: #4caf50; /* Highlight color on hover */
    }

    .social-media-links i {
        margin-right: 10px;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 30px;
        font-size: 0.9rem;
        color: #aaa;
    }

    .footer-bottom p {
        margin: 0;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        .footer .row {
            text-align: center;
        }

        .footer .col-md-2 {
            margin-bottom: 20px;
        }

        .footer-bottom {
            font-size: 1rem;
        }
    }
</style>


<!-- Add Font Awesome for social icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>

<!-- Additional Styles for Footer -->
</body>
</html>
