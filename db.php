<?php
$host = "localhost";
$dbname = "pooja_booking";
$user = "root"; // or your db user
$pass = "";     // or your db password

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
