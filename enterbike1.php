<!DOCTYPE html>
<html>
<head>
</head>
<?php session_start(); ?>
  
<?php include 'header.php' ?>
<?php

require 'connection.php';
$conn = Connect();

$bike_name = $conn->real_escape_string($_POST['bike_name']);
$bike_nameplate = $conn->real_escape_string($_POST['bike_nameplate']);
$price = $conn->real_escape_string($_POST['price']);
$price_per_day = $conn->real_escape_string($_POST['price_per_day']);

$bike_availability = "yes";

// Check if the bike with the same bike_nameplate already exists
$query_check = "SELECT bike_id FROM bikes WHERE bike_nameplate = '$bike_nameplate'";
$result_check = mysqli_query($conn, $query_check);
if (mysqli_num_rows($result_check) > 0) {
    echo "<div style='text-align: center;'>bike with the same vehicle number already exists!<br><br>";
    echo "<a href='enterbike.php' class='btn btn-default'>Go Back</a></div>";
} else {
    if (!empty($_FILES["uploadedimage"]["name"])) {
        $target_path = "assets/img/bikes/" . $_FILES["uploadedimage"]["name"];
    
        if (move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $target_path)) {
            $query = "INSERT INTO bikes(bike_name, bike_nameplate, bike_img, price, price_per_day,  bike_availability) VALUES('$bike_name', '$bike_nameplate', '$target_path', '$price', '$price_per_day', '$bike_availability')";
            $success = $conn->query($query);
            
            if (!$success) {
                echo "<div style='text-align: center;'>Error: " . $conn->error . "<br><br>";
                echo "<a href='enterbike.php' class='btn btn-default'>Go Back</a></div>";
            } else {
                header("location: enterbike.php");
            }
        }
    }
}

$conn->close();
?>
</body>
</html>
