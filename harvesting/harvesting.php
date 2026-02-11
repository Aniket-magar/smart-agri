<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harvesting Machines</title>
    <link rel="stylesheet" href="harvesting.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../Assets/logo.jpg" width="150px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <form class="d-flex search-bar" role="search">
            <input class="form-control me-2 rounded-pill" type="search" placeholder="Search for products...">
            <button class="btn btn-outline-light search-btn rounded-pill" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-globe"></i> Language
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Hindi</a></li>
                        <li><a class="dropdown-item" href="#">Marathi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#"><i class="fas fa-truck"></i> Track Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Login/login.php"><i class="fas fa-user"></i> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navigation List -->
<div class="nav-list">
    <a href="../HomePage/index.php">Home</a>
    <a href="../Product/product.php">Products</a>
    <a href="harvesting.php">Harvesting</a>
    <a href="../weather-forecasting/weather-forecasting.php">Weather</a>
    <a href="../guide/guide.php">Guide</a>
    <a href="../about/about.php">About</a>
</div>

<?php
include '../db/config.php';
?>

<div class="container">
    <h2 class="text-center mt-4">Available Harvesting Machines</h2>

    <?php
    // Fetch unique categories from the 'machines' table
    $categoryQuery = "SELECT DISTINCT category FROM machines";
    $categoryResult = mysqli_query($conn, $categoryQuery);

    while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
        $category = $categoryRow['category'];

        echo "<h3 class='mt-4'>" . htmlspecialchars($category) . "</h3>"; // Category Title

        // Fetch machines for this category
        $machineQuery = "SELECT * FROM machines WHERE category = '$category'";
        $machineResult = mysqli_query($conn, $machineQuery);

        echo "<div class='row'>";
        while ($row = mysqli_fetch_assoc($machineResult)) {
            echo "<div class='col-md-4'>
                    <div class='card mb-4'>
                        <img src='../php/upload/" . htmlspecialchars($row['image']) . "' class='card-img-top' 
                             alt='" . htmlspecialchars($row['name']) . "' style='height: 200px; object-fit: cover;'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>
                            <p><strong>Status:</strong> " . ($row['available'] ? "<span class='text-success'>Available</span>" : "<span class='text-danger'>Busy</span>") . "</p>
                            <p><strong>Contact:</strong> " . htmlspecialchars($row['contact']) . "</p>";

            if ($row['available']) {
                echo "<a href='book-machine.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-success'>Book Now</a>";
            } else {
                echo "<a href='tel:" . htmlspecialchars($row['contact']) . "' class='btn btn-info'>Contact</a>";
            }

            echo "      </div>
                    </div>
                </div>";
        }
        echo "</div>"; // Close row
    }
    ?>

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

<!-- Add Font Awesome for social icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>

<!-- Additional Styles for Footer -->
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

</body>
</html>
