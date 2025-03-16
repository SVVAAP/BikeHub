<?php 
require 'connection.php';
$conn = Connect();

session_start();
$message = '';

if (isset($_POST["update_availability"])) {
    $bike_id_to_update = $_POST["bike_id"];
    $new_availability = $_POST["availability"];
    
    $sql_update1 = "UPDATE bikes SET bike_availability = '$new_availability' WHERE bike_id = $bike_id_to_update";
    $sql_update2 = "UPDATE rentedbikes SET return_status = 'R' WHERE bike_id = $bike_id_to_update";
    $conn->query($sql_update2);

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
    <style>
        td { text-align: center; }
    </style>
    <script>
        function updateBikeAvailability(bikeId) {
            let availability = document.getElementById('availability_' + bikeId).value;
            let formData = new FormData();
            formData.append('bike_id', bikeId);
            formData.append('availability', availability);
            formData.append('update_availability', true);
            
            fetch('updatebike.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Show response message
                location.reload(); // Refresh page to reflect changes
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <div style="text-align: center; padding: 20px; background: #343a40; color: white;">
        <h1>Update Availability</h1>
    </div>

    <div style="padding: 50px;">
        <div style="max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <h3 style="text-align: center; color: #343a40;">My Bikes</h3>
            <p style="text-align: center; color: #6c757d;">Available bikes: <?php echo $available_bikes; ?></p>

            <div style="overflow-x:auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: center;">
                    <thead>
                        <tr style="background: #343a40; color: white;">
                            <th>Name</th>
                            <th>Nameplate</th>
                            <th>Fare (/km)</th>
                            <th>Fare (/day)</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM bikes";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row["bike_name"]; ?></td>
                                <td><?php echo $row["bike_nameplate"]; ?></td>
                                <td>₹<?php echo $row["price"]; ?></td>
                                <td>₹<?php echo $row["price_per_day"]; ?></td>
                                <td><?php echo $row["bike_availability"]; ?></td>
                                <td>
                                    <select id="availability_<?php echo $row['bike_id']; ?>">
                                        <option value="yes">Available</option>
                                        <option value="no">Not Available</option>
                                    </select>
                                    <button onclick="updateBikeAvailability(<?php echo $row['bike_id']; ?>)" style="background: #28a745; color: white; padding: 6px 10px; border: none; border-radius: 5px; cursor: pointer;">Update</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br>
            <div style="text-align: center; color: #dc3545;"> <?php echo $message; ?> </div>
        </div>
    </div>
</body>
</html>
