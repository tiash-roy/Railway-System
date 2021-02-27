 <?php
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
echo "Connected successfully";


$sql = "Select name from states where name like 'a%e'";

$result = $conn->query($sql);



?>