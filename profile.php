<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$uid = $_SESSION['uid'];

// Fetch user data
$query = "SELECT * FROM registered_user WHERE User_ID = '$uid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row      = $result->fetch_assoc();
    $fname    = $row['First_name'];
    $lname    = $row['Last_name'];
    $username = $row['Username'];
    $email    = $row['Email'];
} else {
    echo "User not found!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendify</title>
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link rel="stylesheet" href="src/css/user.css">
    <link rel="stylesheet" href="src/css/headerfooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class="container">
        <?php include "header.php"; ?>
        <header class="header">
            <hr>
            <h1>MY ACCOUNT</h1>
        </header>
        
        <section class="content_row">
            <div class="user_profile">
                <img class="profile_image" src="src/images/user.png" alt="Profile Image" id="profileImage">
                
                <nav class="edit">
                    <h2>Welcome to your profile</h2>
                    <button onclick="return confirm('Are you sure you want to log out?')" class="logout_btn" id="logout_btn">
                        <a href="logout.php">LOG OUT</a>
                    </button>
                </nav>
                
                <nav class="profile_nav">
                    <p class="edit_profile"><i class="fa-regular fa-pen-to-square"></i><a href="editProfile.php">Edit Profile</a></p>
                    <p class="order_history"><i class="fa-solid fa-file-lines"></i><a href="index.php">Billing Information</a></p>
                    <p class="my_orders"><i class="fa-solid fa-file-lines"></i><a href="OrderDetails.html">My Orders</a></p>
                    <p class="order_history"><i class="fa-solid fa-file-lines"></i><a href="OrderHistory.html">Oder History</a></p>
                </nav>
            </div>
            
            <div class="user_details">
                <form id="profile_form" action="deleteAccount.php" method="POST">
                    <label for="uid">User ID</label>
                    <input type="text" name="uid" id="uid" placeholder="User ID" value="<?php echo htmlspecialchars($uid); ?>" readonly required>

                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="First name" value="<?php echo htmlspecialchars($fname); ?>" readonly required>
                    
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Last name" value="<?php echo htmlspecialchars($lname); ?>" readonly required>
                    
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="on" value="<?php echo htmlspecialchars($username); ?>" readonly required>
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="on" value="<?php echo htmlspecialchars($email); ?>" readonly required>
                    
                    <button type="submit" id="delete_btn" onclick="return confirm('Are you sure you want to delete this account?')">Delete Account</button>
                </form>
            </div>
        </section>
        
        <script src="src/js/user.js"></script>
        <?php include "./footer.php"; ?>
    </div>
</body>
</html>
