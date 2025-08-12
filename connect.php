<?php

$servername = "localhost";
$username = "root";
$password = ""; // Adjust if necessary
$database = "inventory_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful!";
}


?>