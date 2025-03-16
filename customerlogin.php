<?php
include('login_customer.php');

if(isset($_SESSION['login_customer'])){
    header("location: index.php");
    exit; // Add an exit to prevent further execution if the user is already logged in
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

<body>

    <div>
        <div>
            <h1 style="display: flex;justify-content: center;">Customer Login</h1>
        </div>
    </div>

    <div>
        <div style="display: flex;justify-content: center;">

            <div>
                <div style="border-style: double;">
                    <form action="" method="POST" style="padding:10px 10px;">

                        <div>
                            <div>
                                <label for="customer_username"> Username: </label>
                                <div>
                                    <input id="customer_username" type="text" name="customer_username" placeholder="Username" required="" autofocus="">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="customer_password"> Password: </label>
                                <div>
                                    <input id="customer_password" type="password" name="customer_password" placeholder="Password" required="">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button name="submit" type="submit" value=" Login ">Submit</button>
                                <label style="color: red;flex: 1;position: relative;right: inherit;"> <?php echo $error;?></label>
                            </div>
                        </div>

                        <div>
                            <label>or</label> <br>
                            <label><a href="customersignup.php">Create a new account.</a></label>
                        </div>

                        <div>
                           <!-- <label><a href="forgot_password.php">Forgot Password?</a></label> Adding the Forgot Password link -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
