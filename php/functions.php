<?php
include __DIR__ ."/../config/config.php";

function dbConnect(){
    global $config;
    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $dbname = $config['dbname'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_errno){
        die("Connection failed: " . $conn->connect_error);
    }else{
       return $conn;
    }
 }

 function getBirthday(){
    $mysqli = dbConnect();


    $sql = "SELECT EmployeeID, FName, LName, BDate FROM employee";
    $data = [];
    $result = $mysqli->query($sql);
    if ($result) {
        // Fetch and store the categories in the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        // Free result set
        $result->free();
    } else {
        // Handle query error
        die("Query failed: " . $mysqli->error);
    }
    $mysqli->close();

    return $data;

 }
 ?>