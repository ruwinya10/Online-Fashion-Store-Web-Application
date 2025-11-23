<?php
include 'config.php';
session_start();

if (!isset($_SESSION['uid'])) {
    echo "error";
    exit();
}

$userID = $_SESSION['uid']; // Use the session's user ID

if (isset($_GET['id'])) {
    $cartID = $_GET['id'];

    // Prepare the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ? AND User_ID = ?");
    $stmt->bind_param("ii", $cartID, $userID); // Ensure User_ID is passed

    if ($stmt->execute()) {
        echo "Product removed from cart";
    } else {
        echo "Error removing product from cart";
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
