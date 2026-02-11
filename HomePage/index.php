<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriStuff</title>
<!-- Bootstrap JS (Latest version) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

                <!-- User Profile or Login -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['fullname']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../profile/profile.php"><i class="fas fa-user-circle"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="../orders/orders.php"><i class="fas fa-box"></i> My Orders</a></li>
                            <li><a class="dropdown-item" href="../cart/cart.php"><i class="fas fa-shopping-cart"></i> My Cart</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="../login/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../Login/login.php">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


    <!-- Additional Content -->
<!-- Navigation List -->
<div class="nav-list">
    <a href="index.php">Home</a>
    <a href="../product/product.php">Products</a>
    <a href="../harvesting/harvesting.php">Harvesting</a>
    <a href="../weather-forecasting/weather-forecasting.php">Weather</a>
    <a href="../guide/guide.php">Guide</a>
    <a href="../about/about.php">About</a>
</div>

<!-- Add this CSS to your styles -->
<style>
    .nav-list {
        display: flex;
        justify-content: center; /* Centers the links */
        align-items: center; /* Vertically aligns content */
        gap: 15px; /* Reduces spacing between links */
        padding: 0.5px 0; /* Reduces height of the navbar */
        background-color: #013220; /* Dark green background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    }

    .nav-list a {
        text-decoration: none; /* Removes underline */
        color: #ffffff; /* White text color */
        font-size: 15px; /* Adjusted font size */
        font-weight: 500; /* Medium text weight */
        padding: 6px 12px; /* Adds clickable area around links */
        border-radius: 3px; /* Slight rounding for hover effect */
        transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth hover effects */
    }

    .nav-list a:hover {
        background-color: rgba(255, 255, 255, 0.1); /* Slight highlight on hover */
        transform: scale(1.05); /* Slight zoom effect */
    }

    /* Responsive Design for Smaller Screens */
    @media (max-width: 768px) {
        .nav-list {
            flex-direction: column; /* Stack links vertically */
            gap: 10px; /* Adjust spacing for smaller screens */
        }

        .nav-list a {
            width: 90%; /* Stretch links for better touch interaction */
            text-align: center; /* Center-align text */
        }
    }
    .nav-list {
        display: flex;
        justify-content: center; /* Centers the links */
        align-items: center; /* Vertically aligns content */
        gap: 15px; /* Reduces spacing between links */
        padding: 0.5px 0; /* Reduces height of the navbar */
        background-color: #013220; /* Dark green background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    }

    .nav-list a {
        text-decoration: none; /* Removes underline */
        color: #ffffff; /* White text color */
        font-size: 15px; /* Adjusted font size */
        font-weight: 500; /* Medium text weight */
        padding: 6px 12px; /* Adds clickable area around links */
        border-radius: 3px; /* Slight rounding for hover effect */
        transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth hover effects */
    }

    .nav-list a:hover {
        background-color: rgba(255, 255, 255, 0.1); /* Slight highlight on hover */
        transform: scale(1.05); /* Slight zoom effect */
    }

    /* Responsive Design for Smaller Screens */
    @media (max-width: 768px) {
        .nav-list {
            flex-direction: column; /* Stack links vertically */
            gap: 10px; /* Adjust spacing for smaller screens */
        }

        .nav-list a {
            width: 90%; /* Stretch links for better touch interaction */
            text-align: center; /* Center-align text */
        }
    }

</style>


    <!-- Carousel -->
    <!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" style="max-height: 400px; overflow: hidden;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 400px; background-color: #000;">
            <img src="../Assets/farm.jpg" class="d-block w-100" alt="..." style="object-fit: cover; height: 100%;">
            <div class="carousel-caption d-none d-md-block">
                <h5>welcome to our Agricultural website</h5>
                <p>"The ultimate goal of farming is not the growing of crops, but the cultivation and perfection of human beings."</p>
            </div>
        </div>
        <div class="carousel-item" style="height: 400px;">
            <img src="../Assets/login-form-backgrd-img (2).jpg" class="d-block w-100" alt="..." style="object-fit: cover; height: 100%;">
            <div class="carousel-caption d-none d-md-block">
                <h5>welcome to our Agricultural website</h5>
                <p>"Farming is a profession of hope."</p>
            </div>
        </div>
        <div class="carousel-item" style="height: 400px;">
            <img src="../Assets/farm2.jpg" class="d-block w-100" alt="..." style="object-fit: cover; height: 100%;">
            <div class="carousel-caption d-none d-md-block">
                <h5>welcome to our Agricultural website</h5>
                <p>"The land is where our roots are. The children must be taught to feel and live in harmony with the Earth." </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Additional Styles for Carousel -->
<style>
    /* Adjusting the height and making the images more attractive */
    .carousel-inner .carousel-item {
        height: 400px; /* Reduced height */
    }

    .carousel-item img {
        object-fit: cover; /* Makes sure the image covers the area */
        height: 100%; /* Ensures the image covers the entire item */
        border-radius: 8px; /* Adding rounded corners to the images */
    }

    /* Style for carousel controls */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5); /* Darker color for controls */
        border-radius: 50%;
    }

    .carousel-caption h5 {
        font-size: 2rem;
        font-weight: bold;
        color: #ffffff;
    }

    .carousel-caption p {
        font-size: 1rem;
        color: #ffffff;
        background-color: rgba(0, 0, 0, 0.6); /* Slight background behind text */
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>










<!-- /*features*/ -->

<!-- Features Section -->
<section id="features" class="container mt-5">
    <h2 class="text-center mb-4">Our Website Features</h2>
    <div class="row">
        <!-- Feature 1: Products -->
        <div class="col-md-3">
            <div class="card shadow">
                <img src="../Assets/products-img.jpg" class="card-img-top" alt="Products">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Explore our wide range of agricultural products designed for your farming needs.</p>
                    <a href="../product/product.php" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Feature 2: Machinery -->
        <div class="col-md-3">
            <div class="card shadow">
                <img src="../assets/harvesting.jpg" class="card-img-top" alt="Machinery">
                <div class="card-body">
                    <h5 class="card-title">Machinery</h5>
                    <p class="card-text">Find high-quality machinery for all your farming operations from trusted brands.</p>
                    <a href="../harvesting/harvesting.php" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Feature 3: Weather Forecasting -->
        <div class="col-md-3">
            <div class="card shadow">
                <img src="../assets/weather-forecasting.jpg" class="card-img-top" alt="Weather Forecasting">
                <div class="card-body">
                    <h5 class="card-title">Weather Forecasting</h5>
                    <p class="card-text">Stay updated with accurate weather forecasts to plan your farming activities efficiently.</p>
                    <a href="../weather-forecasting/weather-forecasting.php" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Feature 4: Tools -->
        <div class="col-md-3">
            <div class="card shadow">
                <img src="../assets/tools.jpg" class="card-img-top" alt="Tools">
                <div class="card-body">
                    <h5 class="card-title">Tools</h5>
                    <p class="card-text">Browse a collection of essential tools to make your farming tasks easier and more efficient.</p>
                    <a href="../guide/guide.php" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #features .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #features .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    #features .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    #features .card-body {
        text-align: center;
    }

    #features .btn-success {
        background-color: #28a745;
        color: white;
        transition: background-color 0.3s ease;
    }

    #features .btn-success:hover {
        background-color: #218838;
    }
</style>













    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .product-list {
            padding: 20px;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 15px;
            text-align: center;
        }

        .product-card .product-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .product-card .product-description {
            font-size: 14px;
            color: #666;
            margin: 10px 0;
            height: 50px; /* Limit description height */
            overflow: hidden;
        }

        .product-card .product-price {
            font-size: 16px;
            color: #28a745;
            font-weight: bold;
        }

        .product-card .btn {
            margin-top: 10px;
            background-color: #28a745;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .product-card .btn:hover {
            background-color: #218838;
        }
    </style>


<!-- Brands Section -->
<div class="container my-5">
    <div class="p-4 border rounded shadow-lg bg-light">
        <h2 class="text-center mb-4">Our Brands</h2>
        <div class="row text-center justify-content-center">
            <!-- Brand Items -->
            <div class="col custom-col mb-4" id="brand-container">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/tapas-brand.jpg" alt="Brand 1" class="brand-logo">
                    <p class="brand-name mt-2">TAPAS</p>
                </div>
            </div>
            <div class="col custom-col mb-4">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/syngentaLogo.jpg" alt="Brand 2" class="brand-logo">
                    <p class="brand-name mt-2">SYNGENTA</p>
                </div>
            </div>
            <div class="col custom-col mb-4">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/seminisLogo.jpg" alt="Brand 3" class="brand-logo">
                    <p class="brand-name mt-2">SEMINIS</p>
                </div>
            </div>
            <div class="col custom-col mb-4">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/namdhariSeedsLogo.jpg" alt="Brand 4" class="brand-logo">
                    <p class="brand-name mt-2">NAMDHARI SEEDS</p>
                </div>
            </div>
            <div class="col custom-col mb-4">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/janathaAgroProductsLogo.jpg" alt="Brand 5" class="brand-logo">
                    <p class="brand-name mt-2">JANATHA AGRO PRODUCTS</p>
                </div>
            </div>
            <div class="col custom-col mb-4">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/dhanukaLogo.jpg" alt="Brand 6" class="brand-logo">
                    <p class="brand-name mt-2">DHANUKA</p>
                </div>
            </div>
            <div class="col custom-col mb-4">
                <div class="brand-box p-3 border rounded d-flex flex-column align-items-center">
                    <img src="../assets/bayerLogo.jpg" alt="Brand 7" class="brand-logo">
                    <p class="brand-name mt-2">BAYER</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Outer box styling */
    .p-4 {
        background-color: #f8f9fa;
    }

    /* Brand box container */
    .brand-box {
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 160px; /* Fixed width */
        height: 180px; /* Fixed height */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .brand-box:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    /* Adjust columns for 7 items in one row */
    .custom-col {
        flex: 0 0 auto;
        width: calc(100% / 7);
        max-width: calc(100% / 7);
        display: flex;
        justify-content: center;
    }

    /* Responsive design */
    @media (max-width: 992px) {
        .custom-col {
            width: 33.33%;
            max-width: 33.33%;
        }
    }

    @media (max-width: 768px) {
        .custom-col {
            width: 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 576px) {
        .custom-col {
            width: 100%;
            max-width: 100%;
        }
    }

    /* Brand logo styling */
    .brand-logo {
        width: 100px;
        height: 60px;
        object-fit: contain; /* Keeps logos properly aligned */
    }

    .brand-name {
        font-size: 0.9rem;
        font-weight: bold;
        text-align: center;
    }
</style>


<div class="container product-list">
    <h2 class="text-center mb-4">Our Products</h2>
    <div class="row g-4">
        <!-- Product 1 -->
        <div class="col-md-4">
            <div class="product-card">
                <img src="../php/upload/insecticides.jpg" alt="Product 1">
                <div class="card-body">
                    <h5 class="product-title">Product Name 1</h5>
                    <p class="product-description">This is a short description of the product. Highlight its key features and benefits.</p>
                    <p class="product-price">00</p>
                    <a href="#" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="col-md-4">
            <div class="product-card">
                <img src="../php/upload/insecticides.jpg" alt="Product 2">
                <div class="card-body">
                    <h5 class="product-title">Product Name 2</h5>
                    <p class="product-description">This is a short description of the product. Highlight its key features and benefits.</p>
                    <p class="product-price">00</p>
                    <a href="#" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="col-md-4">
            <div class="product-card">
                <img src="../php/upload/insecticides.jpg" alt="Product 3">
                <div class="card-body">
                    <h5 class="product-title">Product Name 3</h5>
                    <p class="product-description">This is a short description of the product. Highlight its key features and benefits.</p>
                    <p class="product-price">00</p>
                    <a href="#" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>







<!-- Notice Bar -->
<div class="notice-bar">
    <p class="notice-text">
        <strong>Important Notice:</strong> Our website will be under maintenance on <strong>January 15th, 2025</strong> from 12:00 AM to 4:00 AM. Please plan accordingly. 
        <button class="btn-close-notice">&times;</button>
    </p>
</div>

<!-- Additional Styles -->
<style>
    .notice-bar {
        background-color: #ffcc00; /* Bright yellow for attention */
        color: #333; /* Dark text for contrast */
        text-align: center;
        padding: 10px 15px;
        font-size: 16px;
        font-weight: bold;
        position: relative; /* To make the close button positioning work */
        z-index: 1000; /* Ensure it stays on top */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    }

    .notice-bar .notice-text {
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-close-notice {
        background: none;
        border: none;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-left: 10px;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .btn-close-notice:hover {
        color: #000;
    }
</style>

<!-- Dismiss Notice Script -->
<script>
    const closeNoticeButton = document.querySelector('.btn-close-notice');
    const noticeBar = document.querySelector('.notice-bar');
    
    closeNoticeButton.addEventListener('click', () => {
        noticeBar.style.display = 'none'; // Hides the notice bar
    });
</script>













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
