<?php
$conn = new mysqli('localhost', 'root', '', 'trendify');


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    
    $result = $conn->query("SELECT product_image FROM products WHERE product_id = $product_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_image = $row['product_image'];

        
        if (file_exists("uploads/$product_image")) {
            unlink("uploads/$product_image");
        }

        
        $sql = "DELETE FROM products WHERE product_id = $product_id";

        if ($conn->query($sql) === TRUE) {
            echo "Product deleted successfully!";
            header('Location: admin5.php'); 
            exit();
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Product not found!";
    }
} else {
    echo "Invalid product ID!";
}
?>
