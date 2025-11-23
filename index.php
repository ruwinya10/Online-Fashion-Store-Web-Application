<?php

require "backend/db.php";

if (isset($_GET["status"])) {
    echo '<script>
    setTimeout(function() {
        alert("' . $_GET["status"] . '");
    }, 1000); </script>';
}

$q2 = "SELECT * FROM `paymentmethod`";
$rs2 = $conn->query($q2);
$n2 = $rs2->num_rows;
$d2 = $rs2->fetch_assoc();

$q3 = "SELECT * FROM `shipping`";
$rs3 = $conn->query($q3);
$n3 = $rs3->num_rows;
$d3 = $rs3->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title></title>
    <link rel="stylesheet" href="src/css/checkout.css">
    <link rel="stylesheet" href="src/css/headerfooter.css">
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <!--header start-->

    <header>

			<div class="header">

				<div class="logo_box"><img src="src/images/logo3.png" width=150px></div>

					<div class="nav_bar">
						<center>
							<div class="search"><i class="fa fa-search" aria-hidden="true"></i><input type="text" name="search" placeholder="Search Items"></div>
								<a href="home.php">Home</a>
								<a href="women.php">Women</a>
								<a href="men.php">Men</a>
								<a href="kids.php">Kids</a>
								<a href="newArrival.php">New Arrivals</a>
                <a href="index.php">Shipping</a>
						</center>
					</div>

					<div class="user-cart">
					
						<div class="icons">
							<a href="profile.php" style="text-decoration:none";><img src="src/images/user-r.png" width=55px></a>
						</div>
				
						<div class="icons">
							<a href="cart.php" style="text-decoration:none";><img src="src/images/shopcart-r.png" width=60px></a>
						</div>
					
					</div>	
			</div>
		</header>

    <!--header end-->

    <div class="container">


        <div class="row">
            <div class="col">

                <div class="container1">

                    <?php

                    if ($n3 >= 1) {
                    ?>
                        <h3>Shipping Information</h3><br>
                        <p>Name : <?php echo $d3['name']; ?></p><br>
                        <p>Email : <?php echo $d3['email']; ?></p><br>
                        <p>Country : <?php echo $d3['country']; ?></p><br>
                        <p>Mobile : <?php echo $d3['mobile']; ?></p><br>
                        <p>Address : <?php echo $d3['address']; ?></p><br>

                        <a href="shipping.php"><button class="submit_btn">Edit Shipping Details</button></a>
                    <?php
                    } else {
                    ?>
                        <h3>No Shipping Details</h3><br>

                        <a href="shipping.php"><button class="submit_btn">Add Shipping Details</button></a>
                    <?php
                    }

                    ?>

                </div>
            </div>

            <div class="col">

                <div class="container1">

                    <?php

                    if ($n2 >= 1) {
                    ?>
                        <h3>Payment Information</h3><br>
                        <p>card Holder : <?php echo $d2['cardHolder']; ?></p><br>
                        <p>card Number : <?php echo $d2['cardNo']; ?></p><br>
                        <p>expiry Month : <?php echo $d2['expMonth']; ?></p><br>
                        <p>cvv : <?php echo $d2['cvv']; ?></p><br>

                        <a href="payment.php"><button class="submit_btn">Edit Payment Details</button></a>
                    <?php
                    } else {
                    ?>
                        <h3>No Payment Details</h3><br>

                        <a href="payment.php"><button class="submit_btn">Add Payment Details</button></a>
                    <?php
                    }

                    ?>

                </div>
            </div>

        </div>

    </div>

    <footer>
    <div class="footer-links">
      <div class="shop">
        <h4>Shop</h4>
          <ul>
            <li><a href="men.php">Men</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="newArrival.php">New Arrivals</a></li>
          </ul>
      </div>
    
      <div class="quick-links">
        <h4>Quick Links</h4>
          <ul>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="contact.html">Contact us</a></li>
            <li><a href="feedback.html">Feedback</a></li>
          </ul>
      </div>
      
      <div class="online-info">
        <h4>Online Information</h4>
          <ul>
            <li><a href="t&c.html">Terms and Conditions</a></li>
            <li><a href="privacypolicy.html">Privacy Policy</a></li>
            <li><a href="exchangepolicy.html">Return and Exchange</a></li>
          </ul>
      </div>
    
      <div class="social">
        <h4>Find Us On :</h4>
          <a href="https://www.facebook.com"><img src="src/images/facebook_logo.webp" alt="Facebook" width=47px></a>
          <a href="https://www.whatsapp.com"><img src="src/images/whatsapp-r.png" alt="WhatsApp" width=52px></a>
          <a href="https://www.twitter.com"><img src="src/images/twitter_l.webp" alt="Twitter" width=52px></a>
      </div>	
    </div>
    <p>© Copyright 2024</p>
  </footer>

    <script src="src/js/checkout.js"></script>

</body>

</html>