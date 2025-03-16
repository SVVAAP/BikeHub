<?php 
require 'connection.php';
$conn = Connect();

session_start();
 ?> 

<?php 

$message = '';

if (isset($_POST["update_availability"])) {

    $bike_id_to_update = $_POST["bike_id"];
    $new_availability = $_POST["availability"];
    

    $sql_update1 = "UPDATE bikes SET bike_availability = '$new_availability' WHERE bike_id = $bike_id_to_update";
    $sql_update2= "UPDATE rentedbikes SET return_status = 'R' WHERE bike_id = $bike_id_to_update";
    $done = $conn->query($sql_update2);

    if ($conn->query($sql_update1) === TRUE) {
        $message = "Availability updated successfully";
    } else {
        $message = "Error updating availability: " . $conn->error;
    }
}

// Count available bikes
$sql_count_available_bikes = "SELECT COUNT(*) AS available_bikes FROM bikes WHERE bike_availability = 'yes'";
$result_count_available_bikes = $conn->query($sql_count_available_bikes);
$row_count_available_bikes = $result_count_available_bikes->fetch_assoc();
$available_bikes = $row_count_available_bikes['available_bikes'];
?>

<!DOCTYPE html>
<html>

<head>
<style> td { text-align: center}</style>
</head>

<?php include 'header.php' ?>

<body>
    <div>
        <div>
            <h1 style="text-align: center; font-size: 30px;">Update Availability</h1>
        </div>
    </div>

    <div>
        <div style="padding: 0px 100px 100px 100px;">
            <form action="" method="POST">
                <br style="clear: both">
                <h3 style=" text-align: center; font-size: 30px;">My bikes</h3>
                <p style="text-align: center;">Available bikes: <?php echo $available_bikes; ?></p>
                <?php
                // Storing Session
                $user_check=$_SESSION['login_client'];
                $sql = "SELECT * FROM bikes ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div style="overflow-x:auto;">
                        <table>
                            <thead>
                                <tr>

                                    <th width="15%">Name</th>
                                    <th width="15%">Nameplate</th>
                                    <th width="13%"> Fare (/km)</th>
                                    <th width="13%"> Fare (/day)</th>
                                    <th width="10%">Availability</th>
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>

                            <?php

                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row["bike_name"]; ?></td>
                                        <td><?php echo $row["bike_nameplate"]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><?php echo $row["price_per_day"]; ?></td>
                                        <td><?php echo $row["bike_availability"]; ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="bike_id" value="<?php echo $row['bike_id']; ?>">
                                                <select name="availability">
                                                    <option value="yes">Available</option>
                                                    <option value="no">Not Available</option>
                                                </select>
                                                <button type="submit" name="update_availability">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                    <br>
                <?php } ?> 
            </form>
            <div style="display:flex; justify-content: center;"><?php echo $message; ?></div>
        </div>
    </div>
</body>

</html>
