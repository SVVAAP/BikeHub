<!DOCTYPE html>
<html>
<?php
include('session_customer.php');
if (!isset($_SESSION['login_customer'])) {
    session_destroy();
    header("location: customerlogin.php");
}

// Get the current date
$today = date("Y-m-d");
?>
<head>

</head>
<?php include 'header.php' ?>
    
<div style="display: flex;justify-content: center;">
    <div>
        <div>
            <form action="bookingconfirm.php" method="POST">
                <br style="clear: both">
                <br>

                <?php
                $bike_id = $_GET["id"];
                $sql1 = "SELECT * FROM bikes WHERE bike_id = '$bike_id'";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1)) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $bike_name = $row1["bike_name"];
                        $bike_nameplate = $row1["bike_nameplate"];
                        $price = $row1["price"];
                      
                        $price_per_day = $row1["price_per_day"];
                    }
                }

                ?>

                <h5> Selected bike:   <b><?php echo ($bike_name); ?></b></h5>
                <h5> Number Plate:<b> <?php echo ($bike_nameplate); ?></b></h5>
              

                <div style="display: flex; align-items: center;">
                    <label><h5>Start Date:</h5></label>
                    <input type="date" name="rent_start_date" id="rent_start_date" min="<?php echo ($today); ?>" > 

                    <label><h5>End Date:</h5></label>
                    <input type="date" name="rent_end_date" id="rent_end_date" min="<?php echo date('Y-m-d', strtotime($today . ' + 1 day')); ?>">
                </div>

                <div>
                    <input type="hidden" name="radio" value="ac" checked="checked"> <b></b>
                </div>

                <div>
                <label><h5>Charge Type:</h5></label>
                    <input type="radio" name="radio1" value="km" onclick="showDistanceInput()"> <b>Per KM</b>
                    <input type="radio" name="radio1" value="days" checked="checked"> <b>Per day</b>
                </div>

                <div id="distanceInput" style="display: none;">
                    <label for="distance"><h5>Distance (km):</h5></label>
                    <input type="number" name="distance" id="distance" min="0">
                </div>

                <div>
                    <h5>Fare:  <b><?php echo ("Rs. " . $price . "/km and Rs. " . $price_per_day . "/day"); ?></b></h5> 
                </div>

                <input type="hidden" name="hidden_bikeid" value="<?php echo $bike_id; ?>">

                <input type="submit" name="submit" value="Book Now">     
            </form>
        </div>
    </div>
</div>

<script>
    function showDistanceInput() {
        var distanceInput = document.getElementById('distanceInput');
        var startDateInput = document.getElementById('rent_start_date');
        var endDateInput = document.getElementById('rent_end_date');
        
        if (distanceInput.style.display === 'none') {
            distanceInput.style.display = 'block';
            endDateInput.style.display = 'none';
        } else {
            distanceInput.style.display = 'none';
            endDateInput.style.display = 'block';
        }
    }
</script>

</body>

</html>
