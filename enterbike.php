<!DOCTYPE html>
<html>
<?php 
require 'connection.php';
$conn = Connect();

session_start();
?> 
<head>
    <title>Enter Bike Details</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            text-align: center;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container button {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .form-container button:hover {
            background: #0056b3;
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
    </style>
</head>
<body>

<div class="container">
    <h1 style="text-align: center; font-size: 28px; color: #343a40;">🏍️ Provide Your Bike Details </h1>

    <!-- Bike Entry Form -->
    <div class="form-container">
        <form action="enterbike1.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="bike_name" placeholder="Bike Name" required>
            <input type="text" name="bike_nameplate" placeholder="Vehicle Number Plate" required>
            <input type="number" name="price" placeholder="Fare per KM (Rs)" required min="0">
            <input type="number" name="price_per_day" placeholder="Fare per day (Rs)" required min="0">
            <input name="uploadedimage" type="file" required>
            <button type="submit" name="submit">Submit for Rental</button>
        </form>
    </div>

    <!-- Display Bike List -->
    <div class="table-container">
        <h3 style="text-align: center; font-size: 24px; color: #343a40;"> 🏍️ My Bikes </h3>
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
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <p style="text-align: center; color: #6c757d;">No bikes added yet.</p>
        <?php } ?>
    </div>
</div>

</body>
</html>
