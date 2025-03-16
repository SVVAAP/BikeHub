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
            background:rgb(0, 0, 0);
            color: white;
            padding-top: 20px;
        }
        .sidebar h4 {
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sidebar p {
        text-align: center;
        font-size: 14px;
        opacity: 0.8;
        margin-bottom: 20px;
    }

    .sidebar a {
        color: white;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        text-decoration: none;
        font-size: 15px;
        font-weight: 500;
        transition: 0.3s;
        border-radius: 5px;
        margin: 5px 10px;
    }

    .sidebar a:hover, .sidebar a.active {
        background: #393E46;
        transform: translateX(5px);
    }

    .sidebar a i {
        margin-right: 10px;
        font-size: 18px;
    }

    /* Logout Button */
    .logout {
        background: #ff4d4d;
        text-align: center;
        font-weight: 600;
        margin-top: auto;
    }

    .logout:hover {
        background: #cc0000;
    }

        .content-area {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>

<body onload="loadPage('enterbike.php')">

    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h4 class="text-center">Admin Panel</h4>
            <p class="text-center">Welcome, <?php echo $_SESSION['login_client']; ?></p>
            <a href="#" onclick="loadPage('enterbike.php', this)"><i class="fas fa-motorcycle"></i> Add Bike</a>
            <a href="#" onclick="loadPage('deletebike.php', this)"><i class="fas fa-trash-alt"></i> Delete Bike</a>
            <a href="#" onclick="loadPage('updatebike.php', this)"><i class="fas fa-sync-alt"></i> Update
                Availability</a>
            <a href="#" onclick="loadPage('client_users.php', this)"><i class="fas fa-users"></i> View Users</a>
            <a href="#" onclick="loadPage('clientview.php', this)"><i class="fas fa-calendar-alt"></i> Current
                Bookings</a>
            <a href="#" onclick="loadPage('clientall.php', this)"><i class="fas fa-list-alt"></i> All Bookings</a>
            <a href="#" onclick="loadPage('adchange.php', this)"><i class="fas fa-key"></i> Change Password</a>

            <?php if (isset($_SESSION['login_client']) || isset($_SESSION['login_customer'])) { ?>
                <a href="logout.php" class="logout">Logout!</a>
            <?php } ?>
            <a href="index.php" ><i class="fas fa-motorcycle"></i> Home Page</a>
        </nav>

        <!-- Main Content Area -->
        <main class="content-area" id="content-area">
            <h2>Loading...</h2>
        </main>
    </div>

    <script>
        function loadPage(page, element = null) {
            fetch(page)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content-area').innerHTML = html;
                    setActiveLink(element);
                })
                .catch(error => console.error('Error loading page:', error));
        }

        function setActiveLink(activeElement) {
            document.querySelectorAll('.sidebar a').forEach(link => link.classList.remove('active'));
            if (activeElement) {
                activeElement.classList.add('active');
            }
        }
    </script>
    <script>
        function deleteBike(bikeId) {
            if (!confirm("Are you sure you want to delete this bike?")) return;

            fetch('deletebike.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `delete_bike=true&bike_id=${bikeId}`
            })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content-area').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script>
        function updateBikeAvailability(bikeId) {
            let availability = document.getElementById('availability_' + bikeId).value;
            let formData = new FormData();
            formData.append('bike_id', bikeId);
            formData.append('availability', availability);
            formData.append('update_availability', true);

            fetch('updatebike.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show response message
                    location.reload(); // Refresh page to reflect changes
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script>
        function updateAdminPassword() {
            let newPassword = document.getElementById("admin_new_password").value;

            let formData = new FormData();
            formData.append("new_password", newPassword);
            formData.append("submit", true);

            fetch("change_password.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
        }
    </script>



</body>

</html>