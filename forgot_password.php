<?php
require 'connection.php'; // Include your database connection file

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_username = $_POST['customer_username'];
    $new_password = $_POST['new_password'];

    // Check if the username exists in the database
    $sql = "SELECT * FROM customers WHERE customer_username = '$customer_username'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Update the user's password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE customers SET customer_password = '$hashed_password' WHERE customer_username = '$customer_username'";
        if (mysqli_query($connection, $update_sql)) {
            echo "Password updated successfully!";
        } else {
            $error = "Error updating password: " . mysqli_error($conn);
        }
    } else {
        $error = "No account found with that username.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="customer_username" required>
            </div>
            <div class="form-group">
                <label>New Password:</label>
                <input type="password" class="form-control" name="new_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
            <div style="color: red;"><?php echo $error; ?></div>
        </form>
    </div>
</body>

</html>
