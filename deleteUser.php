<?php
require_once 'config.php';

// Check if 'id' is provided in the URL and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $uid = $_GET['id'];

    // SQL query to delete the user
    $sql = "DELETE FROM registered_user WHERE User_ID = $uid";

    // Execute the query and check for errors
    if (mysqli_query($conn, $sql)) { 
        echo "<script> window.location.href='admin1.php'; 
        </script>";
    } else {
        // Display the error if the query fails
        echo "<script> alert('Error deleting record: " . mysqli_error($conn) . "'); 
        window.location.href='admin1.php'; </script>";
    }
} else {
    echo "<script> alert('Invalid user ID'); 
    window.location.href='admin1.php'; </script>";
} 

// Close the database connection
mysqli_close($conn);
?> 