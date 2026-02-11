<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Manage Inventory</h1>

        <!-- Inventory Table -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
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

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['category']}</td>
                            <td>
                                <button class='btn btn-danger btn-sm' onclick='updateQuantity({$row['id']}, -1)'>-</button>
                                <span id='qty-{$row['id']}'>{$row['quantity']}</span>
                                <button class='btn btn-success btn-sm' onclick='updateQuantity({$row['id']}, 1)'>+</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function updateQuantity(productId, change) {
            fetch(`../php/update_quantity.php?id=${productId}&change=${change}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`qty-${productId}`).innerText = data.new_quantity;
                    } else {
                        alert("Failed to update quantity");
                    }
                });
        }
    </script>
    
</body>
</html>
