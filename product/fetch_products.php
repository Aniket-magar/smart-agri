<?php
$conn = new mysqli('localhost', 'root', '', 'agristuff');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = isset($_GET['category']) ? $_GET['category'] : '';

$query = "SELECT * FROM products WHERE category = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>" . htmlspecialchars($category) . "</h2>";
    echo '<div class="row mb-4">';

    while ($product = $result->fetch_assoc()) {
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
                    <button class="btn btn-primary w-100 mt-2">Add to Cart</button>
                </div>
            </div>
        </div>';
    }

    echo '</div>';
} else {
    echo "<p class='text-center'>No products found for this category.</p>";
}

$stmt->close();
$conn->close();
?>
