<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="src/css/dashboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="src/images/logo7.png">
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
              integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
              crossorigin="anonymous" 
              referrerpolicy="no-referrer" />
         
    </head>

    <body>
        <div class="sidebar">
            <div class="logo"></div>
            <img src="src/images/logo.jpeg" alt = "trendify" width = "150px" height="150px">
                <ul class="menu">
                    <li class="active">
                        <a href="">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin1.php">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin5.php">
                            <i class="fa fa-box" aria-hidden="true"></i>
                            <span>Product Management</span>
                            
                        </a>
                    </li>
                    <li>
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
            <span>Primary</span>
            <h2>Dashboard</h2>
        </div>
    </div>

    <!-- Combined Overview (Sales, Orders, Customers, Inventory) -->
    <div class="dashboard-section overview">
        <div class="card sales">
            <h3>Total Sales</h3>
            <p>$15,245</p>
        </div>
        <div class="card orders">
            <h3>Total Orders</h3>
            <p>234 Orders</p>
        </div>
        <div class="card customers">
            <h3>Total Customers</h3>
            <p>1,257</p>
        </div>
        <div class="card inventory-item">
            <h3>Items in Stock</h3>
            <p>1,590</p>
        </div>
        <div class="card low-stock">
            <h3>Low Stock Items</h3>
            <p>25</p>
        </div>
    </div>

    <!-- Top Selling Products -->
    <div class="dashboard-section">
        <h3>Top Selling Products</h3><br>
        <ul class="top-products">
            <li>Women Items - 120 sales</li>
            <li>Men Items - 98 sales</li>
            <li>Kids Items - 89 sales</li>
        </ul>
    </div>
</div>

    </body>
</html>