<?php
 require_once 'config.php';
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Trendify</title>
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/login.css">
</head>
<body>
    <div class="login_container">
        <div class="login_image">
            <img src="src/images/login.avif">
        </div>
        <div class="login_form">
            <div class="logo_container">
                <img src="src/images/logo3.png" alt="Logo">
            </div>
            <h1>Welcome Back!</h1>
            <p>Log in to your account to continue</p>
            
            <?php if (isset($_GET['error'])): ?>
                <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <form action="validateLogin.php" method="POST">
                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <div class="checkbox">
                    <input type="checkbox" id="checkBox"> 
                    <label for="checkBox">Remember me</label>
                    <a href="#" class="forgot_link" id="forgotPasswordLink">Forgot Password?</a>
                </div>
                <input type="submit" name="submit" value="Login">
                <p class="signup_prompt">Still don't have an account? <a href="register.php">Sign Up</a></p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="src/js/register.js"></script>
</body>
</html>


