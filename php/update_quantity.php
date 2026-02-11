<?php
                include '../db/config.php'; // Include database connection
                
                // Fetch inventory data
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);

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
            
    <script>
        function updateQuantity(productId, change) {
            fetch(`update_quantity.php?id=${productId}&change=${change}`)
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
