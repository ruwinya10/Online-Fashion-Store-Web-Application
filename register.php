<?php
	require_once 'config.php';

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Trendify</title>
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/register.css">
    <link rel="stylesheet" href="src/css/headerfooter.css">
    <script type="text/javascript" src="src/js/register.js"></script>
</head>
<body>

<div class="container">
<?php include "header.php"; ?>
    <div class="register_container">
        <div class="register_form">
            <h1>Create Account</h1>
            <p>Join us for a personalized experience</p>

            <form id="registration" action="enterRegister.php" method="POST" onsubmit="return checkPassword()">

                <div class="input_group">
                    <input type="text" name="fname" id="fname" placeholder="First name" autocomplete="off" required>
                    <input type="text" name="lname" id="lname" placeholder="Last name" autocomplete="off" required>
                </div>
                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                
                <div class="checkbox_container">
                    <input type="checkbox" id="checkBox" onclick="enableButton()">
                    <label for="checkBox">I agree to the terms and conditions</label>
                </div>
                
                <input type="submit" name="submit" id="submit" value="Sign Up" disabled>
            </form>

            <p class="login_prompt">Already have an account? <a href="login.php">Log in</a></p>
        </div>
        
        <div class="register_img">
            <img src="src/images/register.jpeg" alt="Registration Illustration">
        </div>
        
    </div>
    <?php include "footer.php"; ?>
</div>
</body>
</html>

