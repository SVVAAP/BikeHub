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

$sql1 = "SELECT * FROM customers rc";
$result1 = mysqli_query($conn,$sql1);
$ucount = mysqli_num_rows($result1);

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
?>
<div>
    <div>
        <h1 style="margin-bottom: 25px; text-align: center; font-size: 30px;"><?php echo "<p style='text-align: center;'>Users: $ucount</p>"; ?></h1>
    </div>
</div>

<div style="padding-left: 100px; padding-right: 100px;display: flex; justify-content: center;" >
    <table>
        <thead>
            <tr>
                <th width="15%">Customer Name</th>
                <th width="15%">Customer Email</th>
                <th width="15%">Customer Phone</th>
                <th width="15%">Customer Address</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result1->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["customer_name"]; ?></td>
                <td><?php echo $row["customer_email"]; ?></td>
                <td><?php echo $row["customer_phone"]; ?></td>
                <td><?php echo $row["customer_address"]; ?></td>

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
        <h1  style="text-align: center; font-size: 30px;">No Customer</h1>
        <p></p>
    </div>
</div>
<?php 
} 
?>

</body>
</html>
