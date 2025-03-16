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
            header("location: index.php"); // Redirecting To Other Page
		 } 
		 else {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<?php include 'header.php'; ?>

<div>
    <div>
        <h1 style="display: flex;justify-content: center;">Admin Login</h1>
    </div>
</div>

<div>
    <div style="display: flex;justify-content: center;">

        <div>
            <div style="border-style: double;">
                <form action="" method="POST" style="padding:10px 10px;">

                    <div>
                        <div>
                            <label for="client_username"> Username: </label>
                            <div>
                                <input id="client_username" type="text" name="client_username" placeholder="Username" required="" autofocus="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="client_password"> Password: </label>
                            <div>
                                <input id="client_password" type="password" name="client_password" placeholder="Password" required="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <button name="submit" type="submit" value="Login">Submit</button>
                            <label style="color: red;flex: 1;position: relative;right: inherit;"> <?php echo $error;?></label>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>