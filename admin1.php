<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendify-User Management</title>
    <link rel="shortcut icon" href="src/images/logo7.png">
    <link rel="stylesheet" href="src/css/admin1.css">
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
            <li class="active">
                <a href="admin1.php">
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
                <h2>User Management</h2>
            </div>
        </div>

        <!-- User Information Table -->
        <div class="content">
            <table>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Password</th>
                    <th>Delete</th>
                </tr>

                <?php
                include 'config.php';

                $sql = "SELECT * FROM registered_user";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["User_ID"] . "</td>
                                <td>" . $row["First_name"] . "</td>
                                <td>" . $row["Last_name"] . "</td>
                                <td>" . $row["Username"] . "</td>
                                <td>" . $row["Email"] . "</td>
                                <td>" . $row["Password"] . "</td>
                                <td><a href='deleteUser.php?id=" . $row['User_ID'] . "' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Empty table</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
