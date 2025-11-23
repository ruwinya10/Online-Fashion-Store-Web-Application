<?php
include 'config.php';
session_start(); // Start session to get user ID

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    echo "User not logged in";
    exit();
}

$user_id = $_SESSION['uid']; // Get the logged-in user ID

$data = json_decode(file_get_contents("php://input"), true);

$productID = $data['productID'];
$size = $data['size'];
$quantity = $data['quantity'];

// Use prepared statements to avoid SQL injection
$stmt = $conn->prepare("SELECT product_name, product_image, product_price FROM products WHERE product_id = ?");
$stmt->bind_param("i", $productID);
$stmt->execute();
$productResult = $stmt->get_result();

if ($productResult->num_rows > 0) {
    $product = $productResult->fetch_assoc();

    $productName = $product['product_name'];
    $productImage = $product['product_image'];
    $unitPrice = $product['product_price'];
    $totalPrice = $unitPrice * $quantity;

    // Check if the product already exists in the cart for this user with the same size
    $checkStmt = $conn->prepare("SELECT * FROM cart WHERE User_ID = ? AND product_id = ? AND size = ?");
    $checkStmt->bind_param("iis", $user_id, $productID, $size);
    $checkStmt->execute();
    $existingItem = $checkStmt->get_result();

    if ($existingItem->num_rows > 0) {
        // Update the quantity and total price
        $existing = $existingItem->fetch_assoc();
        $newQuantity = $existing['quantity'] + $quantity;
        $newTotalPrice = $newQuantity * $unitPrice;

        $updateStmt = $conn->prepare("UPDATE cart SET quantity = ?, total_price = ? WHERE cart_id = ?");
        $updateStmt->bind_param("idi", $newQuantity, $newTotalPrice, $existing['cart_id']);
        $updateStmt->execute();
        $updateStmt->close();

        echo "Product quantity updated in cart";
        
    } else {
        // Use a prepared statement for the INSERT query
        $insertStmt = $conn->prepare("INSERT INTO cart (User_ID, product_id, product_name, product_image, unit_price, size, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param("iissdsid", $user_id, $productID, $productName, $productImage, $unitPrice, $size, $quantity, $totalPrice);

        if ($insertStmt->execute()) {
            echo "Product added to cart";
        } else {
            echo "Error: " . $conn->error;
        }

        $insertStmt->close();
    }

    $checkStmt->close();
} else {
    echo "Product not found";
}

$stmt->close();
$conn->close();
?>
