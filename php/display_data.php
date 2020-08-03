<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="5">
</head>
<body>
  <style>
    table.data {
      border: 4px solid #555555;
      background-color: #E2E2E2;
      width: 400px;
      text-align: center;
      border-collapse: collapse;
    }
    table.data td, table.data th {
      border: 1px solid #555555;
      padding: 5px 10px;
    }
    table.data tbody td {
      font-size: 12px;
      font-weight: bold;
      color: #55594B;
    }
    table.data thead {
      background: #46A9C9;
      background: -moz-linear-gradient(top, #74bed6 0%, #58b1ce 66%, #46A9C9 100%);
      background: -webkit-linear-gradient(top, #74bed6 0%, #58b1ce 66%, #46A9C9 100%);
      background: linear-gradient(to bottom, #74bed6 0%, #58b1ce 66%, #46A9C9 100%);
      border-bottom: 0px solid #398AA4;
    }
    table.data thead th {
      font-size: 15px;
      font-weight: bold;
      color: #FFFFFF;
      text-align: center;
      border-left: 2px solid #398AA4;
    }
    table.data thead th:first-child {
      border-left: none;
    }
    table.data tfoot td {
      font-size: 13px;
    }
    table.data tfoot .links {
      text-align: right;
    }
    table.data tfoot .links a{
      display: inline-block;
      background: #FFFFFF;
      color: #398AA4;
      padding: 2px 8px;
      border-radius: 5px;
    }
  </style>
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
?>
<?php
// Create table with data from database
$sql = "SELECT * FROM esp8266data ORDER BY id ASC";
  if ($result=mysqli_query($conn,$sql))
  {
    // Fetch one and one row
    echo "<TABLE class='data'>";
    echo "<TR><TH>ID</TH><TH>Wifi ID</TH><TH>Wifi Password</TH><TH>Time</TH></TR>";
    while ($row=mysqli_fetch_row($result))
    {
      echo "<TR>";
      echo "<TD>".$row[0]."</TD>";
      echo "<TD>".$row[1]."</TD>";
      echo "<TD>".$row[2]."</TD>";
      echo "<TD>".$row[3]."</TD>";
      echo "</TR>";
    }
    echo "</TABLE>";
    // Free result set
    mysqli_free_result($result);
  }
// Close connection
mysqli_close($conn)
?>
</body>
</html>