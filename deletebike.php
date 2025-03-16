<?php 
require 'connection.php';
$conn = Connect();

session_start();
 ?> 
<?php 
$message = '';


if (isset($_POST["delete_bike"])) {

    $bike_id_to_delete = $_POST["bike_id"];
    

    $sql_delete = "DELETE FROM bikes WHERE bike_id = $bike_id_to_delete";
    

    if ($conn->query($sql_delete) === TRUE) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }
}
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
            <h1 style="text-align: center; font-size: 30px;">Delete bike </h1>
        </div>
    </div>

    <div>
        <div style="padding: 0px 100px 100px 100px;">
            <form action="" method="POST">
                <br style="clear: both">
                <h3 style="text-align: center; font-size: 30px;"> My bikes </h3>
                <?php
                $user_check=$_SESSION['login_client'];
                $sql = "SELECT * FROM bikes ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div style="overflow-x:auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th width="15%"> Name</th>
                                    <th width="15%"> Nameplate </th>
                                    <th width="13%">  Fare (/km) </th>
                                    <th width="13%">  Fare (/day)</th>
                                    <th width="1%"> Availability </th>
                                    <th width="10%"> Actions </th>
                                </tr>
                            </thead>

                            <?PHP
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
                                                <button type="submit" name="delete_bike">Delete</button>
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
            <div  style="display:flex;
  justify-content: center;"><?php echo $message; ?></div>
        </div>
    </div>
</body>

</html>
