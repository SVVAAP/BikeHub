<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bike Bookings</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header Section */
        .page-header {
            background-color: #fff;
            padding: 25px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .header-content h1 {
            font-size: 28px;
            font-weight: 600;
            color: #222831;
            position: relative;
            padding-bottom: 10px;
        }
        
        .header-content h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #4a90e2;
        }
        
        /* Table Styles */
        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #222831;
            color: white;
        }
        
        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        tr:hover {
            background-color: #f7f9fc;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .table-container {
                margin: 0 15px;
                overflow-x: auto;
            }
            
            table {
                min-width: 800px;
            }
        }
        
        /* Status and Action Styles */
        .badge {
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        
        .price {
            font-weight: 600;
            color: #222831;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
        }
        
        .empty-state i {
            font-size: 60px;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            font-size: 20px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .empty-state p {
            color: #999;
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    require 'connection.php';
    $conn = Connect();
    ?>
    
    <?php include 'header.php' ?>
    
    <?php 
    $login_customer = $_SESSION['login_customer']; 

    // SQL query to retrieve bookings for the logged-in customer
    $sql1 = "SELECT * FROM rentedbikes rc, bikes c
             WHERE rc.customer_username='$login_customer' AND c.bike_id=rc.bike_id
             ORDER BY rc.rent_start_date DESC";
    $result1 = $conn->query($sql1);
    ?>
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h1>Your Bookings</h1>
        </div>
    </div>
    
    <!-- Table Container -->
    <div class="table-container">
        <?php if (mysqli_num_rows($result1) > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Bike</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Fare</th>
                    <th>Distance (km)</th>
                    <th>Days</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result1)) {
                    $rent_end_date = $row["distance"] > 0 ? "-" : $row["rent_end_date"];
                    $no_of_days = $row["distance"] > 0 ? "-" : $row["no_of_days"]; 
                ?>
                <tr>
                    <td><strong><?php echo $row["bike_name"]; ?></strong></td>
                    <td><?php echo date('d M Y', strtotime($row["rent_start_date"])); ?></td>
                    <td><?php echo $rent_end_date != "-" ? date('d M Y', strtotime($rent_end_date)) : "-"; ?></td>
                    <td>Rs. <?php 
                        if($row["charge_type"] == "days"){
                            echo ($row["fare"] . "/day");
                        } else {
                            echo ($row["fare"] . "/km");
                        }
                    ?></td>
                    <td><?php  
                        if($row["charge_type"] == "days"){
                            echo ("-");
                        } else {
                            echo ($row["distance"]);
                        } 
                    ?></td>
                    <td><?php echo $no_of_days; ?></td>
                    <td class="price">Rs. <?php echo number_format($row["total_amount"], 2); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <!-- Empty State -->
        <div class="empty-state">
            <i class="fas fa-motorcycle"></i>
            <h3>No bookings found</h3>
            <p>You haven't made any bike bookings yet. Browse our collection and book your first ride today!</p>
        </div>
        <?php } ?>
    </div>
</body>
</html>