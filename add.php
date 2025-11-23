<!DOCTYPE html>
<html>
<head>
  <title>My Form</title>
  <link rel="stylesheet" href="src/css/style3.css">
</head>
<body>

<center>
<div class="card">
  <form method="post" action="insert.php">
    <p>Add Supplier</p>
    <label>Contact Person</label><br>
    <input type="text" name="person"><br>
    <label>Company Name</label><br>
    <input type="text" name="name"><br>
    <label>Contact</label><br>
    <input type="text" name="contact"><br>
    <label>Email</label><br>
    <input type="email" name="email"><br>
    <label>Product Id</label><br>
    <input type="text" name="id"><br>
    <label>Product Name</label><br>
    <input type="text" name="product"><br>
    <label>Contract Start Date</label><br>
    <input type="text" name="start"><br>
    <label>Contract End Date</label><br>
    <input type="text" name="end"><br>

    <input class="btn" type="submit">
  </form>
</div>
</center>  

</body>
</html>