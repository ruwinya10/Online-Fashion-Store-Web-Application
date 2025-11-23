<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="src/css/women.css" type="text/css">
    <link rel="stylesheet" href="src/css/headerfooter.css">
    <link rel="shortcut icon" href="src/images/logo7.png">
    <title>New Arrivals' Collection - Trendify</title>
</head>
<body>
<?php include "header.php"; ?>

<!-- Display the "Hello, username!" message -->
<?php
        require 'config.php';
        SESSION_start();
        if(isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<div class='welcome-message'>Hello, $username!</div>";
        } else {
            echo "<div class='welcome-message'>Hello, Guest!</div>";
        }
    ?>

<div class = hello>
    <br>
    <h1>NEW ARRIVALS</h1>
    <div class="pro-container">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'trendify');
        $result = $conn->query("SELECT * FROM products WHERE product_type='New Arrivals'");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='pro'>
                    <img src='uploads/{$row['product_image']}' alt='{$row['product_name']}'>
                    <h5>{$row['product_name']}</h5>
                    <h4>$" . number_format($row['product_price'], 2) . "</h4>
                    <select class='size' data-id='{$row['product_id']}'>
                        <option value=''>Select Size</option>
                        <option value='S'>S</option>
                        <option value='M'>M</option>
                        <option value='L'>L</option>
                        <option value='XL'>XL</option>
                        <option value='XXL'>XXL</option>
                    </select>
                    <input type='number' class='quantity' data-id='{$row['product_id']}' value='1' min='1'>
                    <button class='cart-btn' data-id='{$row['product_id']}'>Add To Cart</button>
                  </div>";
        }
        ?>
    </div>
    </div>
    <?php include "footer.php"; ?>
    <script src="src/js/women.js"></script>
</body>
</html>
