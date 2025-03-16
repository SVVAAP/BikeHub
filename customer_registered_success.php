<html>

  <head>
    <title> customer Signup</title>
  </head>

<?php include 'header.php' ?>

    <?php

require 'connection.php';
$conn = Connect();

$customer_name = $_POST['customer_name'];
$customer_username = $_POST['customer_username'];
$customer_email = $_POST['customer_email'];
$customer_phone = $_POST['customer_phone'];
$customer_address = $_POST['customer_address'];
$customer_password = $_POST['customer_password'];

$query = "INSERT INTO customers(customer_name, customer_username, customer_email, customer_phone, customer_address, customer_password) 
          VALUES ('$customer_name', '$customer_username', '$customer_email', '$customer_phone', '$customer_address', '$customer_password')";

$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: " . $conn->error);
}

$conn->close();

?>
<div >
	<div style="text-align: center;">
		<h2> <?php echo "Welcome $customer_name!" ?> </h2>
		<h1>Your account has been created.</h1>
		<p>Login Now from <a href="customerlogin.php">HERE</a></p>
	</div>
</div>

    </body>

</html>