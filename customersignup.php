<!DOCTYPE html>
<html>

<head>

</head>

<?php include 'header.php' ?>
<div>
    <div>
        <h1 style="display: flex;justify-content: center;">Registration</h1>
    </div>
</div>

<div>
    <div style="display: flex;justify-content: center;">
        <div>
            <div style="border-style: double;">
                <form action="customer_registered_success.php" method="POST" onsubmit="return validateForm()" style="padding:10px 10px;">

                    <div>
                        <div>
                            <label for="customer_name">* Full Name: </label>
                            <div>
                                <input id="customer_name" type="text" name="customer_name" placeholder="Your Full Name" required="" autofocus="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="customer_username">* Username: </label>
                            <div>
                                <input id="customer_username" type="text" name="customer_username" placeholder="Your Username" required="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="customer_email">* Email: </label>
                            <div>
                                <input id="customer_email" type="email" name="customer_email" placeholder="Email" required="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="customer_phone">* Phone: </label>
                            <div>
                                <input id="customer_phone" type="tel" pattern="[0-9]{10}" name="customer_phone" placeholder="Phone" required="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="customer_address">* Address: </label>
                            <div>
                                <input id="customer_address" type="text" name="customer_address" placeholder="Address" required="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="customer_password">* Password: </label>
                            <div>
                                <input id="customer_password" type="password" name="customer_password" placeholder="Password" required="">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                    <label>or</label> <br>
                    <label><a href="customerlogin.php">Have an account? Login.</a></label>

                </form>

            </div>

        </div>

    </div>
</div>
<script>
    function validateForm() {
        var fullName = document.getElementById('customer_name').value;
        var username = document.getElementById('customer_username').value;
        var letters = /^[A-Za-z]+$/;

        if (!fullName.match(letters)) {
            alert('Full Name must contain only alphabetic characters');
            return false;
        }

        if (!username.match(letters)) {
            alert('Username must contain only alphabetic characters');
            return false;
        }
        return true;
    }
</script>
</body>

</html>
