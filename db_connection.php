<?php
$servername = "localhost";
$database = "scandiweb";
$username = "root";
$password = "";

// Create connection

 $GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $database);
global $conn;
// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//echo ' Connected successfully';

//mysqli_close($conn);

?>