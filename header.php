<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxurious Navigation Bar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles for the luxurious navigation bar */
        .navbar {
            background-color: #333; /* Dark background */
            padding: 20px 0; /* Increased padding for a more spacious look */
            border-bottom: 2px solid gold; /* Golden border bottom */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }

        .navbar-brand {
            color: gold !important; /* Golden text color for the brand */
            font-weight: bold; /* Bold font weight */
            font-size: 24px; /* Larger font size for a luxurious feel */
        }

        .nav-link {
            color: white !important; /* White text color for links */
            font-weight: bold; /* Bold font weight */
        }

        .nav-link:hover {
            color: gold !important; /* Golden text color on hover */
        }

        .dropdown-menu {
            background-color: #333; /* Dark background for dropdown menu */
        }

        .dropdown-item {
            color: white !important; /* White text color for dropdown items */
            font-weight: bold; /* Bold font weight */
        }

        .dropdown-item:hover {
            background-color: gold; /* Golden background on hover */
            color: #333 !important; /* Dark text color on hover */
        }

        .logout {
            background-color: red; /* Red background color for logout */
            font-weight: bold; /* Bold font weight */
        }

        .logout:hover {
            background-color: #cc0000; /* Darker red on hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <?php if(isset($_SESSION['login_client'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownControlPanel" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Control Panel
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownControlPanel">
                            <a class="dropdown-item" href="enterbike.php">Add bike</a>
                            <a class="dropdown-item" href="deletebike.php">Delete bike</a>
                            <a class="dropdown-item" href="updatebike.php">Update Availability</a>
                            <a class="dropdown-item" href="adchange.php">Change Pass</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsersInfo" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users Info
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownUsersInfo">
                            <a class="dropdown-item" href="client_users.php">View all Users</a>
                            <a class="dropdown-item" href="clientview.php">View Current Bookings</a>
                            <a class="dropdown-item" href="clientall.php">View all Bookings</a>
                        </div>
                    </li>
                    <?php } elseif(isset($_SESSION['login_customer'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBookingDetails" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Booking Details
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownBookingDetails">
                            <a class="dropdown-item" href="mybookings.php">My Bookings</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clientlogin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customerlogin.php">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <?php } ?>
                </ul>
                <?php if(isset($_SESSION['login_client']) || isset($_SESSION['login_customer'])) { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item logout">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
