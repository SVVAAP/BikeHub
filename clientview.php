<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .no-booking {
            text-align: center;
            font-size: 20px;
            color: red;
        }
    </style>
</head>
<body>

<?php 
$login_client = $_SESSION['login_client'];
$sql1 = "SELECT * FROM rentedbikes rc
        JOIN customers c ON c.customer_username = rc.customer_username
        JOIN bikes ON bikes.bike_id = rc.bike_id
        WHERE rc.return_status = 'NR'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) { ?>
    <div class="container">
        <h1>Your Bookings</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>Bike</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Distance</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result1->fetch_assoc()) { 
                $rent_end_date = $row["distance"] > 0 ? "-" : $row["rent_end_date"]; ?>
                <tr>
                    <td><?php echo $row["bike_name"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["customer_email"]; ?></td>
                    <td><?php echo $row["customer_phone"]; ?></td>
                    <td><?php echo $row["customer_address"]; ?></td>
                    <td><?php echo $row["rent_start_date"]; ?></td>
                    <td><?php echo $rent_end_date; ?></td>
                    <td><?php echo $row["distance"]; ?></td>
                    <td>Rs. <?php echo $row["total_amount"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="container">
        <h1 class="no-booking">No bikes are currently booked by the customer</h1>
    </div>
<?php } ?>

</body>
</html>
