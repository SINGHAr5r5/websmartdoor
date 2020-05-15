<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName="web_smartdoor";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbName);
mysqli_set_charset($conn,"utf-8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>