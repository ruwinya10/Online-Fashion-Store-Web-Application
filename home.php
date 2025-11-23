<!DOCTYPE html>
<html lang="en">

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Trendify</title>
		
		<link rel="stylesheet" href="src/css/headerfooter.css">
		<link rel="stylesheet" href="src/css/home.css">
		<link rel="stylesheet" href="src/css/women.css">
		<link rel="shortcut icon" href="src/images/logo7.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

    
		<!-- Display the "Hello, username!" message -->
		<?php
			require 'config.php';
			SESSION_start();

			if(isset($_SESSION["username"])) {
				$username = $_SESSION["username"];
				echo "<div class='welcome-message'>Hello, $username!</div>";
			} 
			else {
				echo "<div class='welcome-message'>Hello, Guest!</div>";
			}
		?>
		
		<!-- slider start -->

		<div class="sliderbox">
			<img src="" width="1700" height="450" id="slider">
		</div>

		<!-- slider end -->
		
		<br><br>
		<!--collection-desc-boxes start-->
		
		<div class="collection-desc-boxes">
		
			<br><br><br>
			
			<div class="category-heading">
				<div class="line"></div>
				<div class="category-text">SHOP BY CATEGORY</div>
				<div class="line"></div>
			</div>
			
				<!--Women's box-->
		
				<div class="collection-box" style="background-image: url(src/images/women.jpg) ;" width=350px height=350px>
					<div class="collection-box-overlay">
						<center>
							<a href="women.php"><button class="collection-view-button">View Collection</button></a>
						</center>
					</div>
					<div class="collection-box-name"><p><b>WOMEN'S COLLECTION</b></p></div>
				</div>
			
			
				<!--Men's box-->
			
				<div class="collection-box" style="background-image: url(src/images/men1.jpg);">
					<div class="collection-box-overlay">
						<center>
							<a href="men.php"><button class="collection-view-button">View Collection</button></a>
						</center>
					</div>
					<div class="collection-box-name"><p><b>MEN'S COLLECTION</b></p></div>
				</div>
			
			
				<!--Kids' box-->
			
				<div class="collection-box" style="background-image: url(src/images/kids5.jpg);">
					<div class="collection-box-overlay">
						<center>
							<a href="kids.php"><button class="collection-view-button">View Collection</button></a>
						</center>
					</div>
					<div class="collection-box-name"><p><b>KIDS' COLLECTION</b></p></div>		
				</div>
			
			
				<!--New arrivals box-->
			
				<div class="collection-box" style="background-image: url(src/images/new10.jpg);">
					<div class="collection-box-overlay">
						<center>
							<a href="newArrival.php"><button class="collection-view-button">View Collection</button></a>
						</center>
					</div>
					<div class="collection-box-name"><p><b>NEW ARRIVALS COLLECTION</b></p></div>
				</div>
			
		
				<!--description-->
				<div>
					<center>
							<p class="desc">Elevate yout style with must-have trends from Trendify -
							your ultimate destination for online shopping.</p>
					
							<a href="newArrival.php"><button class="shop-now">SHOP NOW</button></a>
						</center>
				</div>
			
		</div>
		
		<!--collection-desc-boxes end-->
		</div>	
		
		<?php include "footer.php"; ?>
		
		<script type="text/javascript" src="src/js/home.js"></script>
	
	</body>

</html>