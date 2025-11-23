<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendify-Product Management</title>
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link rel="stylesheet" href="src/css/admin4.css">
    <link rel="stylesheet" href="src/css/display.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />
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
            <li class="active">
                <a href="admin5.php">
                    <i class="fa fa-box" aria-hidden="true"></i>
                    <span>Product Management</span>
                </a>
            </li>
            <li>
                <a href="#">
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
                <h2>Product Management</h2>
            </div>
        </div>

        
        <div class="content">
            <table>
                <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Type</th>
                <th>Product Image</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>

                <?php
                include 'config.php';

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>$" . number_format($row['product_price'], 2) . "</td>
                        <td>{$row['product_type']}</td>
                        <td><img src='uploads/{$row['product_image']}' alt='{$row['product_name']}' width='100'></td>
                        <td><a href='edit.php?id={$row['product_id']}'>Edit</a></td>
                        <td><a href='delete.php?id={$row['product_id']}' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a></td>
                      </tr>";
                    }
                    echo "<table>";
                    echo "<a href='addproduct1.html'><button>Add products</button></a>";
                } else {
                    echo "<tr><td colspan='6'>Empty table</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
