<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Product</h2>
        <form action="add_product.php" method="post">
            <div class="mb-3">
                <label for="item" class="form-label">Product Name:</label>
                <input type="text" name="item" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</body>
</html>




<?php
if (isset($_POST['submit'])) {
    require_once 'connect.php';

    // Get form data
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Insert data into products table
    $sql = "INSERT INTO products (item, price, quantity) VALUES ('$item', '$price', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Product added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }

    mysqli_close($conn);
}
?>