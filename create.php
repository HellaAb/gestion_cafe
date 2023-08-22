<?php
$servername = "localhost";
$username = "root";
$password = "";
$databadse ="ticket";

// Create connection
$conn = new mysqli($servername, $username, $password, $databadse);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE ticket";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
}
?> 

