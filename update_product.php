<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products SET item = '$item', price = '$price', quantity = '$quantity' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Product updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <form action="update_product.php?id=<?php echo $product['id']; ?>" method="post">
            <div class="mb-3">
                <label for="item" class="form-label">Product Name:</label>
                <input type="text" name="item" class="form-control" value="<?php echo $product['item']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="<?php echo $product['quantity']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>