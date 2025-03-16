<?php
session_start();
if (!isset($_SESSION['login_client'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .logout {
            background: #dc3545;
            border-radius: 5px;
            text-align: center;
        }
        .logout:hover {
            background: #c82333;
        }
        .content-area {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <p class="text-center">Welcome, <?php echo $_SESSION['login_client']; ?></p>
        <a href="#" onclick="loadPage('dashboard.php')">📊 Dashboard</a>
        <a href="enterbike.php">🏍️ Add Bike</a>
        <a href="deletebike.php">❌ Delete Bike</a>
        <a href="updatebike.php">🔄 Update Availability</a>
        <a href="adchange.php">🔑 Change Password</a>
        <a href="client_users.php">👤 View Users</a>
        <a href="clientview.php">📅 Current Bookings</a>
        <a href="clientall.php">📜 All Bookings</a>
        
        <?php if(isset($_SESSION['login_client']) || isset($_SESSION['login_customer'])) { ?>
            <a href="logout.php" class="logout">🚪 Logout</a>
        <?php } ?>
    </nav>

    <!-- Main Content Area -->
    <main class="content-area w-100" id="content-area">
        <h2>Welcome to Admin Dashboard</h2>
        <p>Select an option from the sidebar.</p>
    </main>
</div>

<script>
    function loadPage(page) {
        fetch(page)
            .then(response => response.text())
            .then(html => {
                document.getElementById('content-area').innerHTML = html;
            })
            .catch(error => console.error('Error loading page:', error));
    }
</script>

</body>
</html>
