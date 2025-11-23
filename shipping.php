<?php

require "backend/db.php";

if (isset($_GET["status"])) {
    echo '<script>
    setTimeout(function() {
        alert("' . $_GET["status"] . '");
    }, 1000); </script>';
}

$q2 = "SELECT * FROM `shipping`";
$rs2 = $conn->query($q2);
$n2 = $rs2->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Information</title>
    <link rel="stylesheet" href="src/css/index.css">
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

        <?php

        if ($n2 >= 1) {
            $d2 = $rs2->fetch_assoc();
        ?>
            <form action="backend/shippingProcess.php" method="post">
                <div class="row">
                    <div class="col">
                        <h3 class="title">Contact Information</h3>

                        <div class="flex">
                            <div class="inputBox">
                                <label for="fname">Name :</label>
                                <input type="hidden" value="<?php echo $d2['shippingId']; ?>" name="shippingId">
                                <input value="<?php echo $d2['name']; ?>" name="name" type="text" id="fname" placeholder="Enter your Full Name" required>
                            </div>
                        </div>

                        <div class="inputBox">
                            <label for="email">Email Address :</label>
                            <input value="<?php echo $d2['email']; ?>" name="email" type="email" id="email" placeholder="Enter your Email Address" required>
                        </div>

                        <div class="inputBox">
                            <label for="contactNumber">Contact Number :</label>
                            <input value="<?php echo $d2['mobile']; ?>" name="mobile" type="tel" id="contactNumber" placeholder="123 456 7890" required>
                        </div>

                        <br>

                        <h3 class="title">Shipping Address</h3>

                        <div class="inputBox">
                            <label for="country">Country :</label>
                            <input value="<?php echo $d2['country']; ?>" name="country" type="text" id="country" placeholder="Enter your Country" required>
                        </div>

                        <div class="inputBox">
                            <label for="address">Address :</label>
                            <input value="<?php echo $d2['address']; ?>" name="address" type="text" id="address" placeholder="Enter your Address" required>
                        </div>

                        <div class="inputBox">
                            <label for="city">City :</label>
                            <input value="<?php echo $d2['city']; ?>" name="city" type="text" id="city" placeholder="Enter your City" required>
                        </div>

                    </div>
                </div>

                <input name="update" type="submit" value="Update Shipping Details" class="submit_btn"><br><br>
                <input style="background-color: red;" name="delete" type="submit" value="Delete Shipping Details" class="submit_btn">
            </form>
        <?php
        } else {
        ?>
            <form action="backend/shippingProcess.php" method="post">
                <div class="row">
                    <div class="col">
                        <h3 class="title">Contact Information</h3>

                        <div class="flex">
                            <div class="inputBox">
                                <label for="fname">Name :</label>
                                <input name="name" type="text" id="fname" placeholder="Enter your Full Name" required>
                            </div>
                        </div>

                        <div class="inputBox">
                            <label for="email">Email Address :</label>
                            <input name="email" type="email" id="email" placeholder="Enter your Email Address" required>
                        </div>

                        <div class="inputBox">
                            <label for="contactNumber">Contact Number :</label>
                            <input name="mobile" type="tel" id="contactNumber" placeholder="123 456 7890" required>
                        </div>

                        <br>

                        <h3 class="title">Shipping Address</h3>

                        <div class="inputBox">
                            <label for="country">Country :</label>
                            <input name="country" type="text" id="country" placeholder="Enter your Country" required>
                        </div>

                        <div class="inputBox">
                            <label for="address">Address :</label>
                            <input name="address" type="text" id="address" placeholder="Enter your Address" required>
                        </div>

                        <div class="inputBox">
                            <label for="city">City :</label>
                            <input name="city" type="text" id="city" placeholder="Enter your City" required>
                        </div>

                    </div>
                </div>

                <input name="submit" type="submit" value="Save Shipping Details" class="submit_btn">
            </form>
        <?php
        }

        ?>


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