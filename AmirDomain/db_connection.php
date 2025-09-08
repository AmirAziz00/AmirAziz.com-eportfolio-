<?php
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = "";     // default is empty
$dbname = "amir1";  // make sure this matches your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>