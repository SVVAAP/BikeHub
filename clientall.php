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
</head>
<?php include 'header.php' ?>
 
<div>
    <div>
        <h1 style="margin-bottom: 10px; text-align: center; font-size: 30px;">Your Bookings</h1>
        <p style="margin-bottom: 20px; text-align: center;">Total Bookings: <?php echo $total_bookings; ?></p>
    </div>
</div>

<!-- Form to input start date -->
<div style="padding-left: 100px; padding-right: 100px;display: flex; justify-content: center;">
    <form method="post" action="">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>" required>
        <input type="submit" name="submit" value="Filter">
    </form>
</div>

<div style="padding-left: 100px; padding-right: 100px;display: flex; justify-content: center;">
    <table>
        <thead>
            <tr>
                <th width="20%">bike</th>
                <th width="15%">Customer Name</th>
                <th width="20%">Rent Start Date</th>
                <th width="20%">Rent End Date</th>
                <th width="10%">Distance</th>
                <th width="15%">Total Amount</th>
            </tr>
        </thead>
        <?php
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                // Check if distance is greater than 0
                $rent_end_date = $row["distance"] > 0 ? "-" : $row["rent_end_date"];
        ?>
                <tr>
                    <td><?php echo $row["bike_name"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["rent_start_date"] ?></td>
                    <td><?php echo $rent_end_date; ?></td>
                    <td><?php echo $row["distance"]; ?></td>
                    <td>Rs. <?php echo $row["total_amount"]; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="6">No bookings found starting from the selected date.</td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>

</body>
</html>
