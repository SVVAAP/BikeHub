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
<?php include 'header.php' ?>
<body>

<div>
    <div>
        <h3 style="text-align: center; font-size: 30px;">Change Password</h3>
    </div>
    <div >
        <?php if (isset($success_message)) : ?>
            <div  style="display: flex; justify-content: center;"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form method="post">
            <div style="display: flex; justify-content: center;">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div style="display: flex; justify-content: center;">
            <button type="submit" name="submit">Submit</button>
            <?php if ($error) : ?>
                <div><?php echo $error; ?></div>
            <?php endif; ?>
            
        </form>
    </div>
</div>

</body>
</html>
