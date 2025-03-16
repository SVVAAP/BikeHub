<!DOCTYPE html>
<html>
<?php 
require 'connection.php';
$conn = Connect();

session_start();
$message = ""; 

if (isset($_POST['delete_bike'])) {
    $bike_id = $_POST['bike_id'];
    $delete_query = "DELETE FROM bikes WHERE bike_id = '$bike_id'";
    if (mysqli_query($conn, $delete_query)) {
        $message = "<p style='color: green; text-align: center;'>Bike deleted successfully!</p>";
    } else {
        $message = "<p style='color: red; text-align: center;'>Failed to delete bike. Try again.</p>";
    }
}
?> 
<head>
    <title>Delete Bike</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #dee2e6;
        }
        table th {
            background: #343a40;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .delete-btn:hover {
            background: #b52b3a;
        }
        .message-box {
            text-align: center;
            font-size: 18px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 style="text-align: center; font-size: 28px; color: #343a40;"> 🏍️ Delete Bike </h1>

    <!-- Display Bike List -->
    <div class="table-container">
        <h3 style="text-align: center; font-size: 24px; color: #343a40;"> My Bikes </h3>
        <?php
            $user_check = $_SESSION['login_client'];
            $sql = "SELECT * FROM bikes";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
        ?>
        <table>
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Nameplate </th>
                    <th> Fare (/km) </th>
                    <th> Fare (/day) </th>
                    <th> Availability </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row["bike_name"]; ?></td>
                    <td><?php echo $row["bike_nameplate"]; ?></td>
                    <td>₹<?php echo $row["price"]; ?></td>
                    <td>₹<?php echo $row["price_per_day"]; ?></td>
                    <td><?php echo $row["bike_availability"]; ?></td>
                    <td>
                    <form action="deletebike.php" method="POST">
                            <input type="hidden" name="bike_id" value="<?php echo $row['bike_id']; ?>">
                            <button type="button" class="delete-btn" onclick="deleteBike(<?php echo $row['bike_id']; ?>)">Delete</button>

                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <p style="text-align: center; color: #6c757d;">No bikes available.</p>
        <?php } ?>
    </div>

    <div class="message-box"><?php echo $message; ?></div>
</div>

</body>
</html>
