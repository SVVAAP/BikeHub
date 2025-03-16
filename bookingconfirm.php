<?php 
include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}

// Check if payment was successful
if(isset($_POST['razorpay_payment_id']) && !empty($_POST['razorpay_payment_id'])) {
    $payment_id = $_POST['razorpay_payment_id'];
    $customer_username = $_SESSION['login_customer'];
    $bike_id = $_POST['hidden_bikeid'];
    $total_amount = $_POST['total_amount'];
    
    // Get the customer details
    $query1 = "SELECT * FROM customers WHERE customer_username = '$customer_username'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    
    $customer_id = $row1['id'];
    
    $charge_type = $_POST['radio1'];
    $booking_date = date('Y-m-d');
    
    if($charge_type == "days") {
        $rent_start_date = $_POST['rent_start_date'];
        $rent_end_date = $_POST['rent_end_date'];
        $return_status = "NR"; // Not Returned
        
        $query = "INSERT INTO rentedbikes(customer_id, bike_id, booking_date, rent_start_date, rent_end_date, fare, charge_type, return_status, payment_id) 
                  VALUES('" . $customer_id . "','" . $bike_id . "','" . $booking_date . "','" . $rent_start_date . "','" . $rent_end_date . "','" . $total_amount . "','" . $charge_type . "','" . $return_status . "','" . $payment_id . "')";
    } 
    else {
        $distance = $_POST['distance'];
        $query = "INSERT INTO rentedbikes(customer_id, bike_id, booking_date, distance, fare, charge_type, payment_id) 
                  VALUES('" . $customer_id . "','" . $bike_id . "','" . $booking_date . "','" . $distance . "','" . $total_amount . "','" . $charge_type . "','" . $payment_id . "')";
    }
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        // Update bike availability status
        $query2 = "UPDATE bikes SET bike_availability = 'no' WHERE bike_id = '$bike_id'";
        $result2 = mysqli_query($conn, $query2);
        
        // Save payment details to a new payments table (if you have one)
        $query3 = "INSERT INTO payments(customer_id, bike_id, amount, payment_id, payment_date, payment_status) 
                   VALUES('" . $customer_id . "','" . $bike_id . "','" . $total_amount . "','" . $payment_id . "','" . date('Y-m-d H:i:s') . "','success')";
        $result3 = mysqli_query($conn, $query3);
        
        // Redirect to success page
        header("location: mybookings.php?payment=success");
    } 
    else {
        // Handle error
        header("location: booking.php?id=" . $bike_id . "&payment=failed");
    }
} 
else {
    // If payment ID is not received
    header("location: booking.php?id=" . $_POST['hidden_bikeid'] . "&payment=cancelled");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<?php include 'header.php' ?>

<body style="font-family: 'Poppins', sans-serif; background-color: #f8f9fa; margin: 0; padding: 0; line-height: 1.6;">

<?php
// Include database connection file
function dateDiff($rent_start_date, $rent_end_date) {
    $start_ts = strtotime($rent_start_date);
    $end_ts = strtotime($rent_end_date);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
$type = 'ac';
$customer_username = $_SESSION["login_customer"];
$bike_id = $conn->real_escape_string($_POST['hidden_bikeid']);
$rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
$rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
$return_status = "NR"; 
$fare = '';

// Get charge type from form submission
$charge_type = $_POST['radio1'];

// Initialize fare and other variables
$total_amount = 0;
$model = '';
$distance = 0;
$no_of_days = 0;

// Get bike details from the database
$sql_bike = "SELECT bike_name, price_per_day, price FROM bikes WHERE bike_id = '$bike_id'";
$result_bike = $conn->query($sql_bike);
if ($result_bike->num_rows > 0) {
    $row_bike = $result_bike->fetch_assoc();
    $model = $row_bike["bike_name"];

    // Calculate fare based on charge type
    if ($charge_type === "km") {
        $fare=$row_bike["price"];
        $distance = floatval($_POST['distance']);
        $total_amount = floatval($distance) * floatval($row_bike["price"]);
    } else {
        $fare=$row_bike["price_per_day"];
        $no_of_days = dateDiff($rent_start_date, $rent_end_date);
        $total_amount =  floatval($no_of_days) * floatval($row_bike["price_per_day"]);
    }
}

// Insert booking details into database
$sql1 = "INSERT into rentedbikes(customer_username,bike_id,booking_date,rent_start_date,rent_end_date,fare,charge_type,distance,no_of_days,total_amount,return_status)
VALUES('" . $customer_username . "','" . $bike_id . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $fare . "','" . $charge_type . "','" . $distance . "','" . $no_of_days . "','" . $total_amount . "','" . $return_status . "')" ;
$result1 = $conn->query($sql1);
// Update bike availability in the database
$sql_update_bike_availability = "UPDATE bikes SET bike_availability = 'no' WHERE bike_id = '$bike_id'";
$result_update_bike_availability = $conn->query($sql_update_bike_availability);

// Format dates for display
$formatted_pickup_date = date('d M Y', strtotime($rent_start_date));
$formatted_return_date = date('d M Y', strtotime($rent_end_date));
?>

<!-- Page Header -->
<div style="background-color: #fff; padding: 25px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px; text-align: center;">
    <h1 style="font-size: 28px; font-weight: 600; color: #222831; position: relative; padding-bottom: 15px; display: inline-block; margin: 0;">
        Booking Confirmation
        <span style="content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background-color: #4a90e2; display: block;"></span>
    </h1>
</div>

<!-- Confirmation Card -->
<div style="max-width: 700px; margin: 0 auto 40px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
    <!-- Success Header -->
    <div style="background-color: #ebf7ee; padding: 20px; text-align: center; border-bottom: 1px solid #e0f0e5;">
        <div style="font-size: 50px; color: #2ed573; margin-bottom: 10px;">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2 style="margin: 0; color: #2ed573; font-size: 24px; font-weight: 500;">Booking Successful!</h2>
        <p style="margin: 10px 0 0; color: #666; font-size: 16px;">Your rental bike has been reserved successfully.</p>
    </div>
    
    <!-- Booking Details -->
    <div style="padding: 30px;">
        <div style="text-align: center; margin-bottom: 25px;">
            <h3 style="font-size: 18px; color: #444; font-weight: 500; margin: 0 0 5px;">Thank you for choosing our rental service</h3>
            <p style="color: #666; margin: 0;">Here are the details of your booking:</p>
        </div>
        
        <!-- Details Table -->
        <div style="background-color: #f9f9f9; border-radius: 6px; padding: 25px; border: 1px solid #eee;">
            <div style="display: flex; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <div style="width: 30px; color: #4a90e2; margin-right: 15px;">
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h4 style="margin: 0 0 5px; font-size: 14px; color: #888; font-weight: 400;">Bike Model</h4>
                    <p style="margin: 0; font-size: 16px; font-weight: 500;"><?php echo $model; ?></p>
                </div>
            </div>
            
            <div style="display: flex; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <div style="width: 30px; color: #4a90e2; margin-right: 15px;">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h4 style="margin: 0 0 5px; font-size: 14px; color: #888; font-weight: 400;">Pickup Date</h4>
                    <p style="margin: 0; font-size: 16px; font-weight: 500;"><?php echo $formatted_pickup_date; ?></p>
                </div>
            </div>
            
            <div style="display: flex; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <div style="width: 30px; color: #4a90e2; margin-right: 15px;">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h4 style="margin: 0 0 5px; font-size: 14px; color: #888; font-weight: 400;">Return Date</h4>
                    <p style="margin: 0; font-size: 16px; font-weight: 500;"><?php echo $formatted_return_date; ?></p>
                </div>
            </div>
            
            <?php if ($charge_type === "km"): ?>
            <div style="display: flex; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <div style="width: 30px; color: #4a90e2; margin-right: 15px;">
                    <i class="fas fa-road"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h4 style="margin: 0 0 5px; font-size: 14px; color: #888; font-weight: 400;">Distance</h4>
                    <p style="margin: 0; font-size: 16px; font-weight: 500;"><?php echo $distance; ?> km</p>
                </div>
            </div>
            <?php else: ?>
            <div style="display: flex; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <div style="width: 30px; color: #4a90e2; margin-right: 15px;">
                    <i class="fas fa-clock"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h4 style="margin: 0 0 5px; font-size: 14px; color: #888; font-weight: 400;">Duration</h4>
                    <p style="margin: 0; font-size: 16px; font-weight: 500;"><?php echo $no_of_days; ?> days</p>
                </div>
            </div>
            <?php endif; ?>
            
            <div style="display: flex;">
                <div style="width: 30px; color: #4a90e2; margin-right: 15px;">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h4 style="margin: 0 0 5px; font-size: 14px; color: #888; font-weight: 400;">Total Amount</h4>
                    <p style="margin: 0; font-size: 18px; font-weight: 600; color: #222831;">Rs. <?php echo number_format($total_amount, 2); ?></p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div style="margin-top: 30px; display: flex; justify-content: center; gap: 15px;">
            <a href="mybookings.php" style="background-color: #4a90e2; color: white; text-decoration: none; padding: 12px 25px; border-radius: 4px; font-weight: 500; font-size: 15px; display: inline-flex; align-items: center;">
                <i class="fas fa-list" style="margin-right: 8px;"></i> View My Bookings
            </a>
            <a href="index.php" style="background-color: #222831; color: white; text-decoration: none; padding: 12px 25px; border-radius: 4px; font-weight: 500; font-size: 15px; display: inline-flex; align-items: center;">
                <i class="fas fa-home" style="margin-right: 8px;"></i> Back to Home
            </a>
        </div>
    </div>
</div>

<!-- Additional Information -->
<div style="max-width: 700px; margin: 0 auto 40px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); padding: 25px; text-align: center;">
    <h3 style="margin: 0 0 15px; font-size: 18px; color: #222831; font-weight: 500;">Need Help?</h3>
    <p style="margin: 0 0 20px; color: #666;">If you have any questions about your booking, please contact our customer support.</p>
    <div style="display: flex; justify-content: center; gap: 20px;">
        <div style="display: flex; align-items: center;">
            <i class="fas fa-phone" style="color: #4a90e2; margin-right: 8px;"></i>
            <span>+91 123 456 7890</span>
        </div>
        <div style="display: flex; align-items: center;">
            <i class="fas fa-envelope" style="color: #4a90e2; margin-right: 8px;"></i>
            <span>support@bikerental.com</span>
        </div>
    </div>
</div>

</body>
</html>