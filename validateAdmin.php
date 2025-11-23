<?php
 require_once 'config.php';
 session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the user from the database
    $sql = "SELECT * FROM admin WHERE Username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Check if the password matches
        if ($password === $admin['Password']) {

            $_SESSION['id'] = $admin['Admin_ID'];  // Store Admin ID in session
            $_SESSION['username'] = $admin['Username'];  // Optionally store the username

            $dashboardUrl = "admin" . $admin['Admin_ID'] . ".php";
            
            header("Location: $dashboardUrl"); // Redirect to admin page on successful login
            exit();
        } else {
            header("Location: adminLogin.php?error=Invalid username or password!");
            exit();
        }
    } else {
        header("Location: adminLogin.php?error=No user found with that username!");
        exit();
    }
}

$conn->close();
?>