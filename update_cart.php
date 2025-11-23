<?php
include 'config.php';
session_start();

if (!isset($_SESSION['uid'])) {
    echo "error";
    exit();
}

$userID = $_SESSION['uid']; // Use the session's user ID
$data = json_decode(file_get_contents("php://input"), true);

$cartID = $data['cartID'];
$size = $data['size'];
$quantity = $data['quantity'];

// Fetch the product's unit price from the cart table
$productResult = $conn->prepare("SELECT unit_price FROM cart WHERE cart_id = ? AND User_ID = ?");
$productResult->bind_param("ii", $cartID, $userID); // Ensure User_ID is passed
$productResult->execute();
$product = $productResult->get_result()->fetch_assoc();

$unitPrice = $product['unit_price'];
$totalPrice = $unitPrice * $quantity;

// Use a prepared statement to update the cart
$stmt = $conn->prepare("UPDATE cart SET size = ?, quantity = ?, total_price = ? WHERE cart_id = ? AND User_ID = ?");
$stmt->bind_param("sidii", $size, $quantity, $totalPrice, $cartID, $userID); // Include User_ID check

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
