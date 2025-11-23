<?php
$conn = new mysqli('localhost', 'root', '', 'trendify');

// Check if ID is set
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details
    $result = $conn->query("SELECT * FROM products WHERE product_id = $product_id");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_type = $_POST['product_type'];

    // Handle the file upload if a new image is uploaded
    if (!empty($_FILES['product_image']['name'])) {
        $product_image = $_FILES['product_image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['product_image']['name']);
        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
    } else {
        // If no new image is uploaded, keep the old one
        $product_image = $product['product_image'];
    }

    // Update the product details
    $sql = "UPDATE products SET product_name = '$product_name', product_price = '$product_price', product_type = '$product_type', product_image = '$product_image' WHERE product_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully!";
        header('Location: admin5.php'); // Redirect back to admin page after update
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/edit.css">
    <link rel="shortcut icon" href="src/images/logo7.png">
    <title>Edit Product</title>
</head>
<body>

<form action="edit.php?id=<?php echo $product_id; ?>" method="POST" enctype="multipart/form-data">
<h1>Edit Product</h1>
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required><br>

    <label for="product_price">Product Price:</label><br>
    <input type="number" id="product_price" name="product_price" step="0.01" value="<?php echo $product['product_price']; ?>" required><br>

    <label for="product_type">Product Type:</label><br>
    <select id="product_type" name="product_type" required>
        <option value="Women" <?php echo ($product['product_type'] == 'Women') ? 'selected' : ''; ?>>Women</option>
        <option value="Men" <?php echo ($product['product_type'] == 'Men') ? 'selected' : ''; ?>>Men</option>
        <option value="Kids" <?php echo ($product['product_type'] == 'Kids') ? 'selected' : ''; ?>>Kids</option>
        <option value="New Arrivals" <?php echo ($product['product_type'] == 'New Arrivals') ? 'selected' : ''; ?>>New Arrivals</option>
    </select><br>

    <label for="product_image">Product Image:</label><br>
    <input type="file" id="product_image" name="product_image"><br>
    <img src="uploads/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>" width="100"><br><br>

    <button type="submit">Update Product</button>
</form>

</body>
</html>
