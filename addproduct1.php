<?php

$conn = new mysqli('localhost', 'root', '', 'trendify');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_type = $_POST['product_type'];

    
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['product_image']['name']);
    
   
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); 
    }
    
    
    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
        //insert product
        $sql = "INSERT INTO products (product_name, product_price, product_type, product_image) 
                VALUES ('$product_name', '$product_price', '$product_type', '$product_image')";

        if ($conn->query($sql) === TRUE) {
           //rederect the admin page
            header('Location: admin5.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>
