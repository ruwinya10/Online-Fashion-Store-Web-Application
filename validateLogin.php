<?php
 require_once 'config.php';
 session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the user from the database
    $sql = "SELECT * FROM registered_user WHERE Username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Check if the password matches
        if ($password === $user['Password']) {

            $_SESSION['uid'] = $user['User_ID'];  // Store user ID in session
            $_SESSION['username'] = $user['Username'];  // Optionally store the username
            
            header("Location: home.php"); // Redirect to home page on successful login
            exit();
        } else {
            header("Location: login.php?error=Invalid username or password!");
            exit();
        }
    } else {
        header("Location: login.php?error=No user found with that username!");
        exit();
    }
}

$conn->close();
?>