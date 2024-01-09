<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "flutter_db"; // Ganti dengan nama database yang sesuai

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
