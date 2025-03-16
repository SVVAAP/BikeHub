<!DOCTYPE html>
<html lang="en">
<?php
include('session_customer.php');
if (!isset($_SESSION['login_customer'])) {
    session_destroy();
    header("location: customerlogin.php");
}

// Get the current date
$today = date("Y-m-d");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Bike</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<?php include 'header.php' ?>
<body style="font-family: 'Poppins', sans-serif; background-color: #f8f9fa; margin: 0; padding: 0; line-height: 1.6;">
    
    <!-- Page Header -->
    <div style="background-color: #fff; padding: 25px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px; text-align: center;">
        <h1 style="font-size: 28px; font-weight: 600; color: #222831; position: relative; padding-bottom: 15px; display: inline-block; margin: 0;">
            Book Your Bike
            <span style="content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background-color: #4a90e2; display: block;"></span>
        </h1>
    </div>
    
    <!-- Main Content -->
    <div style="max-width: 800px; margin: 0 auto; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); padding: 30px; margin-bottom: 40px;">
        <form id="bookingForm" action="bookingconfirm.php" method="POST" style="width: 100%;">
            <?php
            $bike_id = $_GET["id"];
            $sql1 = "SELECT * FROM bikes WHERE bike_id = '$bike_id'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1)) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $bike_name = $row1["bike_name"];
                    $bike_nameplate = $row1["bike_nameplate"];
                    $price = $row1["price"];
                    $price_per_day = $row1["price_per_day"];
                }
            }
            
            $customer_username = $_SESSION['login_customer'];
            $sql2 = "SELECT * FROM customers WHERE customer_username = '$customer_username'";
            $result2 = mysqli_query($conn, $sql2);
            
            if(mysqli_num_rows($result2) > 0) {
                $customer = mysqli_fetch_assoc($result2);
                $customer_name = $customer['customer_name'];
                $customer_email = $customer['customer_email'];
                $customer_phone = $customer['customer_phone'];
            }
            ?>
            
            <!-- Bike Details -->
            <div style="margin-bottom: 25px; background-color: #f7f9fc; border-radius: 6px; padding: 20px;">
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 10px;">
                    <div style="flex: 1;">
                        <h3 style="margin: 0 0 5px 0; color: #666; font-size: 14px; font-weight: 500;">Selected Bike</h3>
                        <p style="margin: 0; font-size: 18px; font-weight: 600; color: #222831;"><?php echo ($bike_name); ?></p>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="margin: 0 0 5px 0; color: #666; font-size: 14px; font-weight: 500;">Number Plate</h3>
                        <p style="margin: 0; font-size: 18px; font-weight: 600; color: #222831;"><?php echo ($bike_nameplate); ?></p>
                    </div>
                </div>
                <div style="margin-top: 15px;">
                    <h3 style="margin: 0 0 5px 0; color: #666; font-size: 14px; font-weight: 500;">Fare Details</h3>
                    <p style="margin: 0; font-size: 16px; color: #222831;">
                        <span style="background-color: #e9f0fd; padding: 5px 10px; border-radius: 4px; display: inline-block; margin-right: 10px;">
                            <i class="fas fa-road" style="margin-right: 5px; color: #4a90e2;"></i> Rs. <?php echo $price; ?>/km
                        </span>
                        <span style="background-color: #e9f0fd; padding: 5px 10px; border-radius: 4px; display: inline-block;">
                            <i class="fas fa-calendar-day" style="margin-right: 5px; color: #4a90e2;"></i> Rs. <?php echo $price_per_day; ?>/day
                        </span>
                    </p>
                </div>
            </div>
            
            <!-- Booking Options -->
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 18px; color: #222831; margin-bottom: 15px; font-weight: 500;">Booking Options</h2>
                
                <!-- Charge Type Selection -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 10px; font-weight: 500; color: #333;">Charge Type:</label>
                    <div style="display: flex; gap: 15px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="radio1" value="km" onclick="showDistanceInput(); calculateTotal();" style="margin-right: 8px;">
                            <span style="font-size: 15px;">Per KM</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="radio1" value="days" onclick="showDateInputs(); calculateTotal();" checked="checked" style="margin-right: 8px;">
                            <span style="font-size: 15px;">Per Day</span>
                        </label>
                    </div>
                </div>
                
                <!-- Date Selection -->
                <div id="dateInputs" style="margin-bottom: 20px;">
                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <div style="flex: 1; min-width: 200px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #333;">Start Date:</label>
                            <input type="date" name="rent_start_date" id="rent_start_date" min="<?php echo ($today); ?>" required onchange="calculateTotal();" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                        </div>
                        <div style="flex: 1; min-width: 200px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #333;">End Date:</label>
                            <input type="date" name="rent_end_date" id="rent_end_date" min="<?php echo date('Y-m-d', strtotime($today . ' + 1 day')); ?>" required onchange="calculateTotal();" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                        </div>
                    </div>
                </div>
                
                <!-- Distance Input (Hidden by default) -->
                <div id="distanceInput" style="display: none; margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #333;">Distance (km):</label>
                    <input type="number" name="distance" id="distance" min="0" oninput="calculateTotal();" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                </div>
            </div>
            
            <!-- Price Calculation -->
            <div style="margin-bottom: 25px; background-color: #f7f9fc; border-radius: 6px; padding: 20px;">
                <h2 style="font-size: 18px; color: #222831; margin-bottom: 15px; font-weight: 500;">Booking Summary</h2>
                <div id="calculationDetails" style="margin-bottom: 15px;">
                    <!-- Details will be filled by JavaScript -->
                </div>
                <div style="border-top: 1px dashed #ddd; padding-top: 15px; margin-top: 15px;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 18px; font-weight: 600; color: #222831;">Total Amount:</span>
                        <span id="totalAmount" style="font-size: 20px; font-weight: 700; color: #4a90e2;">Rs. 0</span>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="hidden_bikeid" value="<?php echo $bike_id; ?>">
            <input type="hidden" name="radio" value="ac" checked="checked">
            <input type="hidden" name="total_amount" id="total_amount_input" value="0">
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            
            <!-- Submit Button -->
            <div style="text-align: center; margin-top: 30px;">
                <button type="button" id="payButton" onclick="makePayment()" style="background-color: #4a90e2; color: white; border: none; padding: 12px 30px; font-size: 16px; font-weight: 500; border-radius: 4px; cursor: pointer; transition: all 0.3s ease; font-family: 'Poppins', sans-serif;">
                    <i class="fas fa-credit-card" style="margin-right: 8px;"></i>
                    Pay & Complete Booking
                </button>
            </div>
        </form>
    </div>

<script>
    // Global variables
    const pricePerKm = <?php echo $price; ?>;
    const pricePerDay = <?php echo $price_per_day; ?>;
    let totalAmount = 0;
    
    // Show/hide input fields based on charge type
    function showDistanceInput() {
        document.getElementById('distanceInput').style.display = 'block';
        document.getElementById('dateInputs').style.display = 'none';
        document.getElementById('rent_end_date').removeAttribute('required');
        document.getElementById('distance').setAttribute('required', '');
    }
    
    function showDateInputs() {
        document.getElementById('distanceInput').style.display = 'none';
        document.getElementById('dateInputs').style.display = 'block';
        document.getElementById('rent_end_date').setAttribute('required', '');
        document.getElementById('distance').removeAttribute('required');
    }
    
    // Calculate the number of days between two dates
    function calculateDays(startDate, endDate) {
        const start = new Date(startDate);
        const end = new Date(endDate);
        const diffTime = Math.abs(end - start);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        return diffDays;
    }
    
    // Calculate total price based on selected options
    function calculateTotal() {
        const calculationDetails = document.getElementById('calculationDetails');
        const totalAmountElement = document.getElementById('totalAmount');
        const totalAmountInput = document.getElementById('total_amount_input');
        
        // Check if per km or per day is selected
        const chargeType = document.querySelector('input[name="radio1"]:checked').value;
        
        if (chargeType === 'km') {
            const distance = parseFloat(document.getElementById('distance').value) || 0;
            totalAmount = distance * pricePerKm;
            
            calculationDetails.innerHTML = `
                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                    <span>Distance:</span>
                    <span>${distance} km</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                    <span>Rate per km:</span>
                    <span>Rs. ${pricePerKm}</span>
                </div>
            `;
        } else {
            const startDate = document.getElementById('rent_start_date').value;
            const endDate = document.getElementById('rent_end_date').value;
            
            if (startDate && endDate) {
                const days = calculateDays(startDate, endDate);
                totalAmount = days * pricePerDay;
                
                calculationDetails.innerHTML = `
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Duration:</span>
                        <span>${days} day${days > 1 ? 's' : ''}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Rate per day:</span>
                        <span>Rs. ${pricePerDay}</span>
                    </div>
                `;
            } else {
                calculationDetails.innerHTML = `<p>Please select both start and end dates to calculate the total.</p>`;
                totalAmount = 0;
            }
        }
        
        // Update the displayed total and hidden input
        totalAmountElement.textContent = `Rs. ${totalAmount.toFixed(2)}`;
        totalAmountInput.value = totalAmount.toFixed(2);
        
        // Enable/disable pay button based on total amount
        document.getElementById('payButton').disabled = totalAmount <= 0;
    }
    
    // Initialize Razorpay payment
    function makePayment() {
        if (totalAmount <= 0) {
            alert('Please complete the booking details to calculate the total amount.');
            return;
        }

        // Convert amount to paise/smallest currency unit (Razorpay expects amount in paise)
        const amountInPaise = Math.round(totalAmount * 100);
        
        // Razorpay options
        const options = {
            key: "rzp_test_NgwEwXk1hnhpL6", // Replace with your actual Razorpay key
            amount: amountInPaise,
            currency: "INR",
            name: "Bike Rental",
            description: "Booking for <?php echo $bike_name; ?>",
            image: "your_logo_url.png", // Replace with your logo URL
            handler: function(response) {
                // Store the payment ID in the hidden field
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                
                // Submit the form to complete the booking
                document.getElementById('bookingForm').submit();
            },
            prefill: {
                name: "<?php echo isset($customer_name) ? $customer_name : ''; ?>",
                email: "<?php echo isset($customer_email) ? $customer_email : ''; ?>",
                contact: "<?php echo isset($customer_phone) ? $customer_phone : ''; ?>"
            },
            theme: {
                color: "#4a90e2"
            },
            modal: {
                ondismiss: function() {
                    console.log("Payment canceled");
                }
            }
        };
        
        // Initialize Razorpay
        const rzp = new Razorpay(options);
        rzp.open();
    }
    
    // Calculate total on page load
    window.onload = function() {
        // Set default values if needed
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        
        // Format dates for input fields
        const formatDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };
        
        // Set default dates if not already set by user
        if (!document.getElementById('rent_start_date').value) {
            document.getElementById('rent_start_date').value = formatDate(today);
        }
        
        if (!document.getElementById('rent_end_date').value) {
            document.getElementById('rent_end_date').value = formatDate(tomorrow);
        }
        
        // Calculate initial total
        calculateTotal();
    }
</script>

</body>
</html>