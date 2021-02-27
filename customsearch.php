<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
	<tr>
		<th>Passenger ID</th>
		<th>Passenger name</th>
		<th>Age</th>
		<th>Destination</th>
		<th>Train Number</th>
		<th>Phone Number</th>
		<th>Ticket Number</th>
	</tr>
<?php
$x=$_POST['name'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "RailwaySystem";

// Create connection
 $conn = new mysqli($servername, $username, $password, $db) or die("Connect failed: %s\n");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `passengers`.*, `passengers buy`.`Ticket number`
FROM `passengers` 
	LEFT JOIN `passengers buy` ON `passengers buy`.`Passenger ID` = `passengers`.`Passenger ID` WHERE `passengers`.`Passenger name`='$x';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Passenger ID"] ."</td><td>".$row["Passenger name"]."</td><td>".$row["Age"]."</td><td>".$row["Destination"]."</td><td>".$row["Train number"]."</td><td>".$row["Phone number"]."</td><td>".$row["Ticket number"]."</td><td>"."</td></tr>";
            }
         
} else {
    echo "0 results";
}

$conn->close();
?>
</table>
<li><a class="homeblack" href="welcome.html">HOME</a></li>
</body>
</html>