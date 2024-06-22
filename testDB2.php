


<!DOCTYPE html>
<html>
<body>
<?php
include 'config/config.php';

$servername = $config['servername'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error); }
$sql = "SELECT EmployeeID FROM employee";
$result = $conn->query($sql);
echo $result->num_rows." employyees in the employee table";
$conn->close();
?>
</body>
</html>
