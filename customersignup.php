<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">

    <?php include 'header.php'; ?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow p-4" style="width: 400px;">
            <h2 class="text-center mb-4">Registration</h2>
            <form action="customer_registered_success.php" method="POST" onsubmit="return validateForm()">
                
                <div class="mb-3">
                    <label for="customer_name" class="form-label">* Full Name:</label>
                    <input id="customer_name" type="text" name="customer_name" class="form-control" placeholder="Your Full Name" required>
                </div>

                <div class="mb-3">
                    <label for="customer_username" class="form-label">* Username:</label>
                    <input id="customer_username" type="text" name="customer_username" class="form-control" placeholder="Your Username" required>
                </div>

                <div class="mb-3">
                    <label for="customer_email" class="form-label">* Email:</label>
                    <input id="customer_email" type="email" name="customer_email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <label for="customer_phone" class="form-label">* Phone:</label>
                    <input id="customer_phone" type="tel" name="customer_phone" class="form-control" pattern="[0-9]{10}" placeholder="Phone" required>
                </div>

                <div class="mb-3">
                    <label for="customer_address" class="form-label">* Address:</label>
                    <input id="customer_address" type="text" name="customer_address" class="form-control" placeholder="Address" required>
                </div>

                <div class="mb-3">
                    <label for="customer_password" class="form-label">* Password:</label>
                    <input id="customer_password" type="password" name="customer_password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>

                <div class="text-center mt-3">
                    <span>or</span> <br>
                    <a href="customerlogin.php" class="text-decoration-none">Have an account? Login</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var fullName = document.getElementById('customer_name').value;
            var username = document.getElementById('customer_username').value;
            var nameRegex = /^[A-Za-z\s]+$/;

            if (!fullName.match(nameRegex)) {
                alert('Full Name must contain only alphabetic characters.');
                return false;
            }

            if (!username.match(nameRegex)) {
                alert('Username must contain only alphabetic characters.');
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
