<script type="text/javascript" src="../javascript/modal.js"></script>
<?php
include __DIR__ ."/../../config/config.php";

# this function connects to the database using the defined credentials from config 
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

# function to get department data
function getEditableData() {
    $mysqli = dbConnect();
    $sql = "SELECT DepartID, ContactNo, DepartName, Mgr_ID FROM department where EffectiveDate > CURRENT_TIMESTAMP;";
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

# function to get time off requests data
function getTimeOffRequests() {
    $mysqli = dbConnect();
    $sql = "SELECT RequestID, EmployeeID, EffectiveDate, OriginalShift, RequestedStartTime, RequestedEndTime, Reason, RequestDate, status from shiftrequest";
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

# this function updates the Department table
function updateDepartment($id, $No, $name, $mgr_id) {
    $mysqli = dbConnect();

    $sql = $mysqli->prepare("UPDATE department SET DepartName = ?, ContactNo = ?, Mgr_ID = ? WHERE DepartID = ?");
    $sql->bind_param('ssii', $name, $No, $mgr_id, $id);
    $queryStatus = False;
    try {
    if ($sql->execute()) {
        echo "Record updated successfully";
        $queryStatus = True;
    } else {
        echo "Error updating record: " . $sql->error;
    }
    } catch (Exception $e) {
        echo("");
    }


    $sql->close();
    $mysqli->close();
    return $queryStatus;
}

#insert time off requests
function insertTimeOff($id, $edate, $oshift, $stime, $etime, $reason) {
    $mysqli = dbConnect();
    $sql = $mysqli->prepare("INSERT into shiftrequest (EmployeeID,EffectiveDate,OriginalShift,RequestedStartTime,RequestedEndTIme,Reason)
    values (?, ?, ?, ?,?,?)");
    $sql->bind_param('isisss',$id,$edate,$oshift,$stime,$etime,$reason);

    try {
        if ($sql->execute()) {
            echo "Record inserted successfully";
            $queryStatus = True;
        } else {
            echo "Error updating record: " . $sql->error;
        }
    } catch (Exception $e) {
            echo("Error");
    }
    
    
    $sql->close();
    $mysqli->close();

}




# this function allows php to log to console
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('$output' );</script>";
}

?>

