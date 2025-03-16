<?php
function Connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = ""; 
    $dbname = "bikerentalp";
    $port = 5000;  // Add port number

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
