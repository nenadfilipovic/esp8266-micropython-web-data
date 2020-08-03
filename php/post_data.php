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
$_POST = json_decode(file_get_contents('php://input'), true);
// Create authentication key it must be same as client key in .py file
$auth_key_server = "1234";
// Check if POST data is empty and compare authentication keys
if(($_POST['auth_key_client'] === $auth_key_server) && (!empty($_POST['wifi_id'])) && (!empty($_POST['wifi_pass'])))
{
    // Extract POST data
    $wifi_id = $_POST['wifi_id'];
    $wifi_pass = $_POST['wifi_pass'];
    // Insert received POST data into table
    $sql = "INSERT INTO esp8266data (wifi_id, wifi_pass) VALUES ('".$wifi_id."', '".$wifi_pass."')";
    // Verify if data have been successfully submited
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close connection after everything is done
$conn->close();
?>