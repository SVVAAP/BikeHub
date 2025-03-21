<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
    if (empty($_POST['client_username']) || empty($_POST['client_password'])) {
        $error = " * Username or Password is invalid";
    } else {
        // Define $username and $password
        $client_username = $_POST['client_username'];
        $client_password = $_POST['client_password'];

        // Establishing Connection with Server by including the connection script
        require 'connection.php'; // Include your connection script here
        $conn = Connect();

        // SQL query to fetch information of registered users and find user match.
        $query = "SELECT client_username, client_password FROM clients WHERE client_username='$client_username' AND client_password='$client_password' LIMIT 1";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any rows were returned by the query
        if (mysqli_num_rows($result) > 0) {
            // Fetch the row
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login_client'] = $row['client_username']; // Initializing Session
            header("location: admin_dashboard.php"); // Redirecting To Other Page
        } else {
            $error = "* Username or Password is invalid";
        }

        mysqli_close($conn); // Closing Connection
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<?php include 'header.php'; ?>

<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f8f9fa;">
    <div style="width: 350px; padding: 20px; background: white; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Admin Login</h2>

        <form action="" method="POST">

            <div style="margin-bottom: 15px;">
                <label for="client_username" style="font-weight: 500;">Username:</label>
                <input id="client_username" type="text" name="client_username" placeholder="Enter your username" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="client_password" style="font-weight: 500;">Password:</label>
                <input id="client_password" type="password" name="client_password" placeholder="Enter your password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <button name="submit" type="submit" value="Login" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Submit
            </button>

            <div style="text-align: center; margin-top: 10px; color: red;"> 
                <?php echo $error;?>
            </div>

        </form>
    </div>
</div>
</body>

</html>