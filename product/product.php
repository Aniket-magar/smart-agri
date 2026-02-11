<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Products</title>
    <link rel="stylesheet" href="product.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../Assets/logo.jpg" width="150px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex search-bar" role="search">
            <input class="form-control me-2 rounded-pill" type="search" placeholder="Search for products..." aria-label="Search">
            <button class="btn btn-outline-light search-btn rounded-pill" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-globe"></i> Language
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Hindi</a></li>
                        <li><a class="dropdown-item" href="#">Marathi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        <i class="fas fa-truck"></i> Track Order
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Login/login.php">
                        <i class="fas fa-user"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="nav-list">
    <a href="../Homepage/index.php">Home</a>
    <a href="product.php">Products</a>
    <a href="../harvesting/harvesting.php">Harvesting</a>
    <a href="../weather-forecasting/weather-forecasting.php">Weather</a>
    <a href="../guide/guide.php">Guide</a>
    <a href="../about/about.php">About</a>
</div>



<h1>Categories</h1>
    <div class="categories">
        <a href="#" class="category-item">
            <img src="image/offers.jpg" alt="Offers">
            <p>Offers</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/herbisides.jpg" alt="Herbicides">
            <p>Herbicides</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/growth-promoters.jpg" alt="Growth Promoters">
            <p>Growth Promoters</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/fungicides.jpg" alt="Fungicides">
            <p>Fungicides</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/vegetable-and-fruit-seeds.jpg" alt="Vegetable & Fruit Seeds">
            <p>Vegetable & Fruit Seeds</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/farm-machinery.jpg" alt="Farm Machinery">
            <p>Farm Machinery</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/nutrients.jpg" alt="Nutrients">
            <p>Nutrients</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/flower-seeds.jpg" alt="Flower Seeds">
            <p>Flower Seeds</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/insecticides.jpg" alt="Insecticides">
            <p>Insecticides</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/organic-farming.jpg" alt="Organic Farming">
            <p>Organic Farming</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/animal-husbandry.jpg" alt="Animal Husbandry">
            <p>Animal Husbandry</p>
        </a>
        <a href="#" class="category-item">
            <img src="image/new-arrivals.jpg" alt="New Arrivals">
            <p>New Arrivals</p>
        </a>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            margin: 20px 0;
        }
        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: black;
        }
        .category-item img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .category-item p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

<div class="container my-5">
    <h1 class="text-center mb-5">Agricultural Products</h1>

    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'agristuff');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch products from the database
    $query = "SELECT * FROM products";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[$row['category']][] = $row;
        }

        // Loop through categories
        foreach ($categories as $category => $products) {
            echo "<h2>" . htmlspecialchars($category) . "</h2>";
            echo '<div class="row mb-4">';

            // Loop through products in each category
            foreach ($products as $product) {
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <a href="../product-description/pdp.php?id=' . htmlspecialchars($product['id']) . '" class="text-decoration-none text-dark">
                            <img src="../php/upload/' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>
                                <p class="card-text">₹ ' . htmlspecialchars($product['price']) . '</p>
                            </div>
                        </a>
                        <div class="card-footer bg-white border-0">
                            <form method="post" action="../Cart/add_to_cart.php">
                                <input type="hidden" name="product_id" value="' . htmlspecialchars($product['id']) . '">
                                <input type="hidden" name="product_name" value="' . htmlspecialchars($product['name']) . '">
                                <input type="hidden" name="product_price" value="' . htmlspecialchars($product['price']) . '">
                                <input type="hidden" name="product_image" value="' . htmlspecialchars($product['image']) . '">
                                <button type="submit" class="btn btn-primary w-100 mt-2">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>';
            }
            

            echo '</div>';
        }
    } else {
        echo "<p class='text-center'>No products found.</p>";
    }

    $conn->close();
    ?>
</div>
<footer class="bg-dark text-light text-center py-4">
    <p>&copy; 2025 Agriculture Store. All rights reserved.</p>
</footer>

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
