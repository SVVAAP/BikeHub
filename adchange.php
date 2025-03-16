<?php
require 'connection.php';
$conn = Connect();

session_start();
$error = '';

if (!isset($_SESSION['login_client'])) {
    header("location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    // Establish a database connection

    // Retrieve admin username from session
    $client_username = $_SESSION['login_client'];

    // Retrieve new password from the form
    $new_password = $_POST['new_password'];

    // Update the admin's password in the database
    $sql = "UPDATE clients SET client_password = '$new_password' WHERE client_username = '$client_username'";

    if (mysqli_query($conn, $sql)) {
        $success_message = "Password updated successfully!";
    } else {
        $error = "Error updating password: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>

<div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); width: 350px; text-align: center; margin: auto; margin-top: 100px;">
    <h3 style="text-align: center; font-size: 24px; margin-bottom: 20px;">Change Password</h3>
    
    <?php if (isset($success_message)) : ?>
        <div style="color: green; margin-bottom: 15px;"><?php echo $success_message; ?></div>
    <?php endif; ?>
    
    <form action="adchange.php" method="post">
        <div style="margin-bottom: 15px;">
            <label for="new_password" style="display: block; font-size: 14px; margin-bottom: 5px;">New Password</label>
            <input type="password" id="new_password" name="new_password" required 
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        
        <button type="submit" name="submit" 
            style="background: #007bff; color: white; border: none; padding: 10px 15px; width: 100%; border-radius: 4px; cursor: pointer;">
            Submit
        </button>

        <?php if (isset($error)) : ?>
            <div style="color: red; margin-top: 10px;"><?php echo $error; ?></div>
        <?php endif; ?>
    </form>
</div>


</body>
</html>
