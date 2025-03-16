<!DOCTYPE html>
<html>
<?php 
require 'connection.php';
$conn = Connect();

session_start();
 ?> 
<head>
 <style> td { text-align: center}</style>
</head>
<?php include 'header.php' ?>
    <div>
        <div>
            <h1 style="text-align: center; font-size: 30px;"> Please Provide Your bike Details. </h1>
        </div>
    </div>

    <div>
    <div style="display: flex; justify-content: center;">
      <div >
        <div style="border-style: double;">
        <form action="enterbike1.php" enctype="multipart/form-data" method="POST" style="padding:10px 10px;">
        <div style="display: flex; justify-content: center;">
        <br style="clear: both">

        <div>
          <div style="margin: 10px;">
            <input type="text" name="bike_name" placeholder="bike Name" required autofocus="" style="width: 251px;">
          </div>

          <div style="margin: 10px;">
            <input type="text" name="bike_nameplate" placeholder="Vehicle Number Plate" required style="width: 251px;">
          </div>     

          <div style="margin: 10px;">
            <input type="number" name="price" placeholder="Fare per KM (Rs)" required min="0" max="9999999" step="1" style="width: 251px;">
          </div>

          <div style="margin: 10px;">
            <input type="number" name="price_per_day" placeholder="Fare per day (Rs)" required min="0" max="9999999" step="1" style="width: 251px;">
          </div>
          
          

           <div style="margin: 10px;">
            <input name="uploadedimage" type="file" required>
          </div>
          <div style="display: flex; justify-content: center; margin: 15px;" required>
           <button type="submit" name="submit">Submit for Rental</button> 
          </div>   
           </div>
           </div>
        </form>
        </div>
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
                  <th width="10%"> Name</th>
                  <th width="10%"> Nameplate </th>
                  
                  <th width="10%">  Fare (/km) </th>
                  <th width="10%">  Fare (/day)</th>
                  
                  <th width="1%"> Availability </th>
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
                </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
          <br>
          <?php } ?>
        </form>
      </div>        
    </div>
</body>
</html>
