<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeHub Navigation</title>
    <style>
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            /* position: sticky; */
            top: 0;
            z-index: 1000;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .brand {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            text-decoration: none;
        }

        .brand span {
            color: #e74c3c;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #e74c3c;
        }

        .logout {
            color: #e74c3c;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header>
        <?php if (isset($_SESSION['login_client'])) { ?>
            <div style="height: 30px;  text-align: center; color:rgb(255, 255, 255); background-color:rgb(0, 0, 0); ">
               Hello Admin !

            </div>
        <?php } ?>
        <div class="container">
            <a href="index.php" class="brand">Bike<span>Hub</span>.com</a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['login_client'])) { ?>
                        <li><a href="admin_dashboard.php">Admin-DashBoard</a></li>
                        <li><a href="#">Welcome <?php echo $_SESSION['login_client']; ?></a></li>
                        <!-- <li><a href="enterbike.php">Add Bike</a></li>
                        <li><a href="deletebike.php">Delete Bike</a></li>
                        <li><a href="updatebike.php">Update Availability</a></li>
                        <li><a href="adchange.php">Change Pass</a></li>
                        <li><a href="client_users.php">View Users</a></li>
                        <li><a href="clientview.php">Current Bookings</a></li>
                        <li><a href="clientall.php">All Bookings</a></li> -->
                    <?php } elseif (isset($_SESSION['login_customer'])) { ?>
                        <li><a href="#">Welcome <?php echo $_SESSION['login_customer']; ?></a></li>
                        <li><a href="mybookings.php">My Bookings</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    <?php } else { ?>
                        <li><a href="clientlogin.php">Admin</a></li>
                        <li><a href="customerlogin.php">Customer</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    <?php } ?>
                    <?php if (isset($_SESSION['login_client']) || isset($_SESSION['login_customer'])) { ?>
                        <li><a href="logout.php" class="logout">Logout</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

    </header>
</body>

</html>