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

 function getSchedules(){
    $mysqli = dbConnect();


    $sql = "SELECT E.EmployeeID, E.FName, E.LName, S.StartTime, S.EndTime, S.ScheduleType
FROM Employee as E
left join schedule as S on E.Schedule = S.ScheduleID";
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

 function getEditableData() {
    $mysqli = dbConnect();

    $sql = "SELECT DepartID, ContactNo, DepartName, Mgr_ID FROM department";
    $result = $mysqli->query($sql);

    $data = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free();
    } else {
        die("Query failed: " . $mysqli->error);
    }

    $mysqli->close();

    return $data;
}

 #for department
 function updateDepartment($id, $No, $name, $mgr_id) {
    $mysqli = dbConnect();

    $sql = $mysqli->prepare("UPDATE department SET DepartName = ?, ContactNo = ?, Mgr_ID = ? WHERE DepartID = ?");
    $sql->bind_param('siii', $name, $No, $mgr_id, $id);

    if ($sql->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $sql->error;
    }

    $sql->close();
    $mysqli->close();
}



 ?>