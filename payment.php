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
        <h1 class="title">Payment Method</h1><br><br>

        <div class="row">
            <div class="col">

                <?php

                if ($n2 >= 1) {
                    $d2 = $rs2->fetch_assoc();
                ?>
                    <form id="paymentForm" action="backend/paymentMethodProcess.php" method="post">

                        <div class="inputBox">
                            <label for="city">Card Accepted:</label>
                            <img src="src/images/images.png" alt="images" width="250px" height="75px">
                        </div>

                        <div class="inputBox">
                            <label for="cardName">Name On Card :</label>
                            <input type="hidden" name="methodId" value="<?php echo $d2['methodId']; ?>"/>
                            <input value="<?php echo $d2['cardHolder']; ?>" name="cardHolder" type="text" placeholder="Enter name on card" required>
                        </div>

                        <div class="inputBox">
                            <label for="cardNum">Credit Card Number :</label>
                            <input value="<?php echo $d2['cardNo']; ?>" name="cardNo" type="text" id="cardNum" placeholder="1111-2222-3333-4444" maxlength="19" required>
                        </div>

                        <div class="inputBox">
                            <label for="expMonth">Exp Month :</label>
                            <input value="<?php echo $d2['expMonth']; ?>" name="expDate" type="month" name="" id="">
                            </select>
                        </div>

                        <div class="flex">
                            <div class="inputBox">
                                <label for="cvv">CVV :</label>
                                <input value="<?php echo $d2['cvv']; ?>" name="cvv" type="number" id="cvv" placeholder="123" required>
                            </div>
                        </div>

                        <button name="update" type="submit" class="submit_btn">Update Card Details</button><br><br>
                        <button style="background-color: red;" name="delete" type="submit" class="submit_btn">Delete Card Details</button>
                    </form>
                <?php
                } else {
                ?>
                    <form id="paymentForm" action="backend/paymentMethodProcess.php" method="post">

                        <div class="inputBox">
                            <label for="city">Card Accepted:</label>
                            <img src="src/images/images.png" alt="images" width="250px" height="75px">
                        </div>

                        <div class="inputBox">
                            <label for="cardName">Name On Card :</label>
                            <input name="cardHolder" type="text" id="cardName" placeholder="Enter name on card" required>
                        </div>

                        <div class="inputBox">
                            <label for="cardNum">Credit Card Number :</label>
                            <input name="cardNo" type="text" id="cardNum" placeholder="1111-2222-3333-4444" maxlength="19" required>
                        </div>

                        <div class="inputBox">
                            <label for="expMonth">Exp Month :</label>
                            <input name="expDate" type="month" name="" id="">
                            </select>
                        </div>

                        <div class="flex">
                            <div class="inputBox">
                                <label for="cvv">CVV :</label>
                                <input name="cvv" type="number" id="cvv" placeholder="123" required>
                            </div>
                        </div>

                        <button name="submit" type="submit" class="submit_btn">Save Card Details</button>
                    </form>
                <?php
                }

                ?>

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
</body>

</html>