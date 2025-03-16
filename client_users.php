<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

<?php 
$login_client = $_SESSION['login_client']; 

$sql1 = "SELECT * FROM customers rc";
$result1 = mysqli_query($conn,$sql1);
$ucount = mysqli_num_rows($result1);

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
?>
<div style="background-color: white; padding: 20px; margin: 20px auto; text-align: center; max-width: 500px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
    <h1 style="margin-bottom: 10px; font-size: 30px; color: #333;"><?php echo "<p>Users: $ucount</p>"; ?></h1>
</div>

<div style="padding: 20px; display: flex; justify-content: center;">
    <table style="width: 80%; max-width: 900px; border-collapse: collapse; background-color: white; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #007bff; color: white;">
                <th width="15%" style="padding: 10px; border: 1px solid #ddd;">Customer Name</th>
                <th width="15%" style="padding: 10px; border: 1px solid #ddd;">Customer Email</th>
                <th width="15%" style="padding: 10px; border: 1px solid #ddd;">Customer Phone</th>
                <th width="15%" style="padding: 10px; border: 1px solid #ddd;">Customer Address</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result1->fetch_assoc()) { ?>
            <tr style="text-align: center;">
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["customer_name"]; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["customer_email"]; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["customer_phone"]; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row["customer_address"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div> 
<?php 
} else {
?>
<div style="max-width: 400px; margin: 50px auto; background-color: white; padding: 20px; text-align: center; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
    <h1 style="font-size: 30px; color: #d9534f;">No Customers</h1>
</div>
<?php 
} 
?>

</body>
</html>
