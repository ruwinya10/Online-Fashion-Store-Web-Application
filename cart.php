<?php 
	session_start();
	include 'config.php';
	
	// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$user_id = $_SESSION['uid']; // Retrieve the user ID from the session

// Retrieve cart items for the current user
    $result = $conn->query("SELECT * FROM cart WHERE User_ID = $user_id");

// Check if the cart is empty
	$cart_empty = ($result->num_rows === 0); // If there are no rows, the cart is empty

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>My Cart - Trendify</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/css/headerfooter.css">
        <link rel="shortcut icon" href="src/images/logo7.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="src/css/cart.css">
        <link rel="stylesheet" href="src/css/headerfooter.css">
    </head>

    <body>

    <?php include "header.php"; ?>

    <hr>
    <center><h1 class="heading">SHOPPING CART</h1></center>

    <?php if ($cart_empty): ?>
    <!-- Display message and image when the cart is empty -->
    <div class="empty-cart-container" style="text-align:center;">
        <img src="src/images/empty.jpeg" alt="Empty Cart" style="width:200px;">
        <p class="empty-cart-message" style="font-size:25px; margin-top:20px;">Your cart is empty.</p>
    </div>
    <?php else: ?>

    <!-- Display cart table if the cart has items -->
    <table id="cart-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>

        <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr data-id='{$row['cart_id']}'>
                        <td><img src='uploads/{$row['product_image']}' width='80'></td>
                        <td>{$row['product_name']}</td>
                        <td>$ {$row['unit_price']}</td>
                        <td>
                            <select class='edit-size'>
                                <option " . ($row['size'] == 'S' ? 'selected' : '') . ">S</option>
                                <option " . ($row['size'] == 'M' ? 'selected' : '') . ">M</option>
                                <option " . ($row['size'] == 'L' ? 'selected' : '') . ">L</option>
                                <option " . ($row['size'] == 'XL' ? 'selected' : '') . ">XL</option>
                                <option " . ($row['size'] == 'XXL' ? 'selected' : '') . ">XXL</option>
                            </select>
                        </td>
                        <td><input type='number' class='edit-quantity' value='{$row['quantity']}' min='1'></td>
                        <td>$ <span class='total-price'>{$row['total_price']}</span></td>
                        <td><button class='save-btn'>Save</button></td>
                        <td><button class='remove-btn'>Remove</button></td>
                      </tr>";
            }
            ?>

        </tbody>
    </table>

	<br><br>
		
		<div class="cart-summary">
			<p>Subtotal: <span id="subtotal">$0.00</span></p>
			<button id="checkout">PROCEED TO CHECKOUT</button>
		</div>

        <?php endif; ?>

	    <br><br><br>

		<?php include "footer.php"; ?>

        <script src="src/js/cart.js"></script>

    </body>

</html>