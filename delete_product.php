<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: view_products.php");
    } else {
        echo "<div class='alert alert-danger'>Error deleting product: " . mysqli_error($conn) . "</div>";
    }
}

mysqli_close($conn);
?>