<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "is440_car_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
date_default_timezone_set("Asia/Bangkok");

$home='http://localhost/IS440_FRI/is440_car_shop';