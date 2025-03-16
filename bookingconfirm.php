<?php 
include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?>

<head>
</head>
<?php include 'header.php' ?>

<body>

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

?>

<div style="text-align: center;">
    <h1 style="color: green;">Booking Confirmation</h1>
    <p>Your rental bike booking has been confirmed.</p>
    <p>Thank you for choosing our rental service. Here are the details of your booking:</p>
    <strong>bike Model:</strong> <?php echo $model; ?><br>
    <strong>Pickup Date:</strong> <?php echo $rent_start_date; ?><br>
    <strong>Return Date:</strong> <?php echo $rent_end_date; ?><br>
    <?php if ($charge_type === "km"): ?>
        <strong>Distance (km):</strong> <?php echo $distance; ?><br>
    <?php else: ?>
        <strong>Number of days:</strong> <?php echo $no_of_days; ?><br>
    <?php endif; ?>
    <strong>Total Price:</strong> <?php echo  $total_amount; ?><br>
</div>

</body>
</html>
