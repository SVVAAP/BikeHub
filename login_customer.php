<?php
session_start();
$error=''; 

if (isset($_POST['submit'])) {
    if (empty($_POST['customer_username']) || empty($_POST['customer_password'])) {
        $error = "Username or Password is invalid";
    }
    else {
        $customer_username=$_POST['customer_username'];
        $customer_password=$_POST['customer_password'];
        require 'connection.php';
        $conn = Connect();

        $query = "SELECT customer_username, customer_password FROM customers WHERE customer_username='$customer_username' AND customer_password='$customer_password' LIMIT 1";


        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login_customer'] = $row['customer_username'];
            header("location: index.php"); 
        } else {
            $error = "Username or Password is invalid";
        }
        mysqli_close($conn);
    }
}
?>