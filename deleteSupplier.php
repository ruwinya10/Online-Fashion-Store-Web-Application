<?php

require 'config.php';

if (isset($_GET['id'])) {
    $supplier_id = $_GET['id'];

    $sql = "DELETE FROM supplier WHERE Supplier_id = '$supplier_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
        header("Location: admin3.php"); 
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No supplier ID provided!";
}

$conn->close();
?>
