<!DOCTYPE HTML>
<html>
<head>
<title>OpenLayers Fire Fighters</title>
</head>
<body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fire_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<table border="1" style="padding:4px; margin:5px ">
  <tr>
    <th>SN</th>
    <th>Date</th>
    <th>Latitude</th>
    <th>Longitude</th>
  </tr>

<?php
$sql = "SELECT * FROM fire_db_table";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    ?>
    <tr>
      <td> <?php  echo $row["SN"]; ?> </td>
      <td> <?php  echo $row["Date"]; ?> </td>
      <td> <?php  echo $row["Latitude"]; ?> </td>
      <td> <?php  echo $row["Longitude"]; ?> </td>
    </tr>
    <?php }
  }
?>
<table>
  <?php
$conn->close();
?>
</body>
</html>
