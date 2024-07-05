



<?php
include 'php/functions.php';


// Create connection
$conn = dbConnect();
$sql = "SELECT EmployeeID FROM employee";
$result = $conn->query($sql);
echo $result->num_rows." employyees in the employee table";
$conn->close();
?>

