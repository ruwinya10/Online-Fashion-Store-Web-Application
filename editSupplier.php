<?php

require 'config.php';

if (isset($_GET['id'])) {
    $supplier_id = $_GET['id'];

    $sql = "SELECT * FROM supplier WHERE Supplier_id = '$supplier_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "No record found with ID: $supplier_id";
        exit;
    }
}

if (isset($_POST['update'])) {
    $supPerson = $_POST['person'];
    $supCompany = $_POST['name'];
    $supContact = $_POST['contact'];
    $supEmail = $_POST['email'];
    $supPid = $_POST['id'];
    $supProduct = $_POST['product'];
    $supStart = $_POST['start'];
    $supEnd = $_POST['end'];

    $sql = "UPDATE supplier 
            SET Contact_person = '$supPerson', 
                Company_name = '$supCompany', 
                Contact = '$supContact', 
                Email = '$supEmail', 
                Product_id ='$supPid',
                Product_name = '$supProduct', 
                Contract_start_date = '$supStart', 
                Contract_end_date = '$supEnd'
            WHERE Supplier_id = '$supplier_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
        header("Location: admin3.php"); 
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="src/css/style3.css">
</head>
<body>

<center>
    <div class="card">
        <form method="post">
            <p>Edit Supplier</p>
            <label>Contact Person</label><br>
            <input type="text" name="person" value="<?php echo $row['Contact_person']; ?>"><br>

            <label>Company Name</label><br>
            <input type="text" name="name" value="<?php echo $row['Company_name']; ?>"><br>

            <label>Contact</label><br>
            <input type="text" name="contact" value="<?php echo $row['Contact']; ?>"><br>

            <label>Email</label><br>
            <input type="email" name="email" value="<?php echo $row['Email']; ?>"><br>

            <label>Product Id</label><br>
            <input type="text" name="id" value="<?php echo $row['Product_id']; ?>"><br>

            <label>Product Name</label><br>
            <input type="text" name="product" value="<?php echo $row['Product_name']; ?>"><br>

            <label>Contract Start Date</label><br>
            <input type="text" name="start" value="<?php echo $row['Contract_start_date']; ?>"><br>

            <label>Contract End Date</label><br>
            <input type="text" name="end" value="<?php echo $row['Contract_end_date']; ?>"><br>

            <input class="btn" type="submit" name="update" value="Update">
        </form>
    </div>
</center>

</body>
</html>
