<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();

// Set default value for start date filter
$start_date = date('Y-m-d');

// Check if the form is submitted with start date
if(isset($_POST['submit'])) {
    $start_date = $_POST['start_date'];

    // Query to fetch bookings with start date equal to the provided date
    $sql1 = "SELECT * FROM rentedbikes rc
             JOIN customers c ON c.customer_username = rc.customer_username
             JOIN bikes ON bikes.bike_id = rc.bike_id
             WHERE DATE(rent_start_date) = '$start_date'";
    $result1 = $conn->query($sql1);
} else {
    // Default query to fetch all bookings
    $sql1 = "SELECT * FROM rentedbikes rc
             JOIN customers c ON c.customer_username = rc.customer_username
             JOIN bikes ON bikes.bike_id = rc.bike_id";
    $result1 = $conn->query($sql1);
}

// Count total bookings
$total_bookings = mysqli_num_rows($result1);
?>
<head>
    <title>Bookings</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

<!-- Booking Count -->
<div style="background-color: white; padding: 20px; margin: 20px auto; text-align: center; max-width: 500px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
    <h1 style="margin-bottom: 10px; font-size: 30px; color: #333;">Your Bookings</h1>
    <p style="margin-bottom: 20px; font-size: 18px;">Total Bookings: <strong><?php echo $total_bookings; ?></strong></p>
</div>

<!-- Start Date Filter Form -->
<div style="display: flex; justify-content: center; padding: 20px;">
    <form method="post" action="" style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <label for="start_date" style="font-size: 16px; font-weight: bold;">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>" required style="padding: 5px; font-size: 16px; margin: 5px;">
        <input type="submit" name="submit" value="Filter" style="padding: 5px 15px; font-size: 16px; background: #007bff; color: white; border: none; cursor: pointer; border-radius: 5px;">
    </form>
</div>

<!-- Bookings Table -->
<div style="display: flex; justify-content: center; padding: 20px;">
    <table style="width: 80%; max-width: 900px; border-collapse: collapse; background-color: white; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #007bff; color: white;">
                <th width="20%" style="padding: 10px; border: 1px solid #ddd;">Bike</th>
                <th width="15%" style="padding: 10px; border: 1px solid #ddd;">Customer Name</th>
                <th width="20%" style="padding: 10px; border: 1px solid #ddd;">Rent Start Date</th>
                <th width="20%" style="padding: 10px; border: 1px solid #ddd;">Rent End Date</th>
                <th width="10%" style="padding: 10px; border: 1px solid #ddd;">Distance</th>
                <th width="15%" style="padding: 10px; border: 1px solid #ddd;">Total Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                // Check if distance is greater than 0
                $rent_end_date = $row["distance"] > 0 ? "-" : $row["rent_end_date"];
        ?>
                <tr style="text-align: center;">
                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["bike_name"]; ?></td>
                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["customer_name"]; ?></td>
                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["rent_start_date"]; ?></td>
                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $rent_end_date; ?></td>
                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["distance"]; ?></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Rs. <?php echo $row["total_amount"]; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="6" style="text-align: center; padding: 15px; color: red; border: 1px solid #ddd;">No bookings found starting from the selected date.</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
