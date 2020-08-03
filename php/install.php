<?php
// Configure MySQL connection
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create table in database
$sql = "CREATE TABLE esp8266data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    wifi_id VARCHAR(30) NOT NULL,
    wifi_pass VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
    )";
// Check if table is successfully created
if ($conn->query($sql) === TRUE) {
    echo "Table esp8266data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
// Close connection after table is made
$conn->close();
?>