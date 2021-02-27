<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$x=$_POST['name'];
$y=$_POST['trains'];
$z=$_POST['station'];

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

$sql = "SELECT 'passengers'.'Passenger name', 'train'.'Train name', 'station '.'Location'
FROM 'passengers' AS 'Name', 'train' AS 'Train'	, 'station' AS 'Station ' where 'passengers'.'Passenger Name'='$x' AND 'train'.'Train name'='$y' AND 'station'.'Location'='$z'";
if($conn->query($sql) ===TRUE){
	echo "New record successfully added";
}else{
	"Error:".$sql."<br>".$conn->error;
	echo "rip";
}
$result = $conn->query($sql);
$conn->close();
?>
<li><a class="homeblack" href="welcome.html">HOME</a></li>
</body>
</html>