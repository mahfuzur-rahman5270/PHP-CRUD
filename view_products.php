<?php
require_once 'connect.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

echo "<div class='container mt-5'>";
echo "<h2>Product List</h2>";
echo "<table class='table'>";
echo "<thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Action</th></tr></thead>";
echo "<tbody>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['item'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>
                <a href='update_product.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No products found</td></tr>";
}

echo "</tbody></table>";
echo "</div>";

mysqli_close($conn);
?>