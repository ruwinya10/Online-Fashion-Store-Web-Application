<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendify-Supplier Management</title>
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="src/css/style1.css">
    <link rel="stylesheet" href="src/css/style2.css">
    
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <img src="src/images/logo.jpeg" alt="trendify" width="150px" height="150px">
        <ul class="menu">
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-box" aria-hidden="true"></i>
                    <span>Product Management</span>
                </a>
            </li>
            <li class="active">
                <a href="admin3.php">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <span>Supplier Management</span>
                </a>
            </li>
            <li class="logout">
                <a href="logout.php">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main">
        <div class="header">
            <div class="title">
                <span>Dashboard</span>
            </div>
        </div>

        <!-- Supplier Management Table -->
        <div class="content">
            <h1>Supplier Management</h1>
            <table>
              <tr>
                <th>Supplier Id</th>
                <th>Contact Person</th>
                <th>Company Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Contract Start Date</th>
                <th>Contract End Date</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

                <?php
                include 'config.php';

                $sql = "SELECT * FROM supplier";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Supplier_id"] . "</td>";
                        echo "<td>" . $row["Contact_person"] . "</td>";
                        echo "<td>" . $row["Company_name"] . "</td>";
                        echo "<td>" . $row["Contact"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["Product_id"] . "</td>";
                        echo "<td>" . $row["Product_name"] . "</td>";
                        echo "<td>" . $row["Contract_start_date"] . "</td>";
                        echo "<td>" . $row["Contract_end_date"] . "</td>";
                        echo "<td><a href='editSupplier.php?id=".$row['Supplier_id']."'>Edit</a></td>";
                        echo "<td><a href='deleteSupplier.php?id=".$row['Supplier_id']."' onclick='return confirmDelete()'>Delete</a></td>";
                        echo "</tr>";
                    }

                    echo "<table>";

                    echo "<br>";
  
                    echo "<a href='add.php'><button>Add Supplier</button></a>";
                } 
                else {
                       echo "<tr><td colspan='6'>Empty table</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
