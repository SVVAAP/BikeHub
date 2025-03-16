<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>
<head>
</head>
<?php include 'header.php' ?>
 
<?php 
$login_customer = $_SESSION['login_customer']; 

// SQL query to retrieve bookings for the logged-in customer
$sql1 = "SELECT * FROM rentedbikes rc, bikes c
         WHERE rc.customer_username='$login_customer' AND c.bike_id=rc.bike_id
         "; // Order by rent_start_date in ascending order
$result1 = $conn->query($sql1);
    
if (mysqli_num_rows($result1) > 0) {
?>
<div style="display: flex;justify-content: center;">
      <div >
        <h1>Your Bookings</h1>
      </div>
    </div>

    <div style="padding-left: 100px; padding-right: 100px; display: flex;justify-content: center;">
        <table>
            <thead>
                <tr>
                    <th width="15%">bike</th>
                    <th width="15%">Start Date</th>
                    <th width="15%">End Date</th>
                    <th width="10%">Fare</th>
                    <th width="15%">Distance (kms)</th>
                    <th width="10%">Number of Days</th>
                    <th width="15%">Total Amount</th>
                </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_assoc($result1)) {
                $rent_end_date = $row["distance"] > 0 ? "-" : $row["rent_end_date"];
                $no_of_days = $row["distance"] > 0 ? "-" : $row["no_of_days"]; 
            ?>
            <tr>
                <td><?php echo $row["bike_name"]; ?></td>
                <td><?php echo $row["rent_start_date"] ?></td>
                <td><?php echo $rent_end_date;?></td>
                <td>Rs. <?php 
                    if($row["charge_type"] == "days"){
                        echo ($row["fare"] . "/day");
                    } else {
                        echo ($row["fare"] . "/km");
                    }
                ?></td>
                <td style="text-align:center;"><?php  
                    if($row["charge_type"] == "days"){
                        echo ("-");
                    } else {
                        echo ($row["distance"]);
                    } 
                ?></td>
                <td style="text-align:center;"><?php echo  $no_of_days; ?></td>
                <td>Rs. <?php echo $row["total_amount"]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div> 
<?php } ?>

</body>
</html>
