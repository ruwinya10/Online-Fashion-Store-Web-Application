<<?php
require_once 'config.php';
session_start();

// Check if the user ID is provided via POST
if (isset($_POST['uid']) && is_numeric($_POST['uid'])) {
    $uid = $_POST['uid']; // Get the user ID from the form


    // SQL query to delete the user
    $sql = "DELETE FROM registered_user WHERE User_ID = $uid";

    // Execute the query and check for errors
    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='logout.php'; </script>";
    } else {
        // Display the error if the query fails
        echo "<script> alert('Error deleting record: " . mysqli_error($conn) . "'); 
        window.location.href='profile.php'; </script>";
    }
} else {
    echo "<script> alert('Invalid user ID'); 
    window.location.href='profile.php'; </script>";
} 

// Close the database connection
mysqli_close($conn);
?> 