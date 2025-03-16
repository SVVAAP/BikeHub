<?php
include('login_customer.php');

if (isset($_SESSION['login_customer'])) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include 'header.php'; ?>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4;">
        
        <div class="card shadow p-4" style="width: 350px; background: white; border-radius: 10px;">
            <h2 class="text-center mb-3">Customer Login</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="customer_username" class="form-label">Username</label>
                    <input id="customer_username" type="text" name="customer_username" class="form-control"
                        placeholder="Enter Username" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="customer_password" class="form-label">Password</label>
                    <input id="customer_password" type="password" name="customer_password" class="form-control"
                        placeholder="Enter Password" required>
                </div>
                <button name="submit" type="submit" class="btn btn-primary w-100">Login</button>
                <p class="text-danger text-center mt-2"> <?php echo $error; ?> </p>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="customersignup.php">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>