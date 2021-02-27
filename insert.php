<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$x=$_POST['name'];
$y=$_POST['age'];
$z=$_POST['destination'];
$w=$_POST['Pnumber'];
$t=$_POST['Tnumber'];
$ti=$_POST['Tinumber'];

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
$sql3="SELECT `flag` from `ticket` where `Ticket number`='$ti'";
$result=$conn->query($sql3);
$row=mysqli_fetch_assoc($result);
$abcd=$row['flag'];
//echo "$abcd";
if($abcd=="1"){
	$sql = "INSERT INTO `passengers` (`Passenger name`, `Age`, `Destination`, `Train number`, `Phone number`) VALUES ( '$x', '$y', '$z', '$t','$w');";
	$sql1="INSERT INTO `passengers buy`(`Ticket number`, `Passenger ID`) VALUES ('$ti',(Select `Passenger ID` from `passengers` ORDER BY `Passenger ID` DESC LIMIT 1))";
	$sql2="UPDATE `ticket` set `flag`=0 WHERE `Ticket number`='$ti' AND `Train number`='$t'";
	if($conn->query($sql) ===TRUE){
		echo "New record successfully added";
	}else{
		"Error:".$sql."<br>".$conn->error;
		echo "rip";
	}
	if($conn->query($sql1) ===TRUE){
		echo "New record successfully added";
	}else{
		"Error:".$sql1."<br>".$conn->error;
		echo "rip";
	}
	if($conn->query($sql2) ===TRUE){
		echo "New record successfully added";
	}else{
		"Error:".$sql2."<br>".$conn->error;
		echo "rip";
	}
}
else{
	echo "Ticket not available";
}

$conn->close();
?>
<li><a class="homeblack" href="welcome.html">HOME</a></li>
</body>
</html>