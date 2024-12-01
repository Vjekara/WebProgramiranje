<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GSkola";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezivanje na bazu nije uspjelo: " . $conn->connect_error);
}
?>
