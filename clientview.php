<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html>
<head>
    <style> td { text-align: center}</style>
</head>
<body>
<?php include 'header.php'; ?>

<?php 
$login_client = $_SESSION['login_client']; 

$sql1 = "SELECT * FROM rentedbikes rc
        JOIN customers c ON c.customer_username = rc.customer_username
        JOIN bikes ON bikes.bike_id = rc.bike_id
        WHERE rc.return_status = 'NR'";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
?>
<div>
    <div>
        <h1 style="margin-bottom: 25px; text-align: center; font-size: 30px;">Your Bookings</h1>
    </div>
</div>

<div style="padding-left: 100px; padding-right: 100px;display: flex; justify-content: center;" >
    <table>
        <thead>
            <tr>
                <th width="15%">bike</th>
                <th width="15%">Customer Name</th>
                <th width="15%">Customer Email</th>
                <th width="15%">Customer Phone</th>
                <th width="15%">Customer Address</th>
                <th width="15%">Rent Start Date</th>
                <th width="15%">Rent End Date</th>
                <th width="15%">Distance</th>
                <th width="15%">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result1->fetch_assoc()) { 
                $rent_end_date = $row["distance"] > 0 ? "-" : $row["rent_end_date"]; ?>
            <tr>
                <td><?php echo $row["bike_name"]; ?></td>
                <td><?php echo $row["customer_name"]; ?></td>
                <td><?php echo $row["customer_email"]; ?></td>
                <td><?php echo $row["customer_phone"]; ?></td>
                <td><?php echo $row["customer_address"]; ?></td>
                <td><?php echo $row["rent_start_date"] ?></td>
                <td><?php echo  $rent_end_date ?></td>
                <td><?php echo $row["distance"]; ?></td>
                <td>Rs. <?php echo $row["total_amount"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div> 
<?php 
} else {
?>
<div class="container">
    <div class="jumbotron">
        <h1  style="text-align: center; font-size: 30px;">No bikes are currently Booked by the Customer</h1>
        <p></p>
    </div>
</div>
<?php 
} 
?>

</body>
</html>
