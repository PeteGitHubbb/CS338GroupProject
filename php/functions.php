
<?php
include __DIR__ ."/../../config/config.php";

# this function connects to the database using the defined credentials from config, not a feature
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


 #feature
function getBirthday(){
    $mysqli = dbConnect();

# "SELECT EmployeeID, FName, LName, DATE_FORMAT(BDate,'%m-%d') BDate FROM employee ORDER BY ";
    $sql = "SELECT EmployeeID, FName, LName, DATE_FORMAT(BDate, '%m-%d') AS BDate FROM employee WHERE DATE_FORMAT(BDate, '%m') = DATE_FORMAT(NOW(), '%m')+1 OR (DATE_FORMAT(BDate, '%m%d') > DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(BDate, '%m') = DATE_FORMAT(NOW(), '%m'))  ORDER BY BDate;";
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

#feature
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

# function to get department data: not a feature, connected to update database feature
function getEditableData() {
    $mysqli = dbConnect();
    $sql = "SELECT DepartID, ContactNo, DepartName, Mgr_ID FROM department;";
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

# function to get time off requests data: not a feature, connected to Approve/Deny Time off requests feature
function getTimeOffRequests() {
    $mysqli = dbConnect();
    $sql = "SELECT RequestID, EmployeeID, EffectiveDate, OriginalShift, RequestedStartTime, RequestedEndTime, Reason, RequestDate, status from shiftrequest where Status LIKE '%Pending%'";
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

# this function updates the Department table feature
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

function acceptTimeOff($reqID, $EmployeeID, $EffectiveDate, $OriginalShift, $RequestedStartTime, $RequestedEndTime, $Reason, $RequestDate, $status) {
    $queryStatus = False;
    if (!str_contains($status, "Pending")) {
        debug_to_console("You can only update pending requests.");
        return !$queryStatus; 
    } 

    $approve = "Approved";
    $mysqli = dbConnect();
    $sql = $mysqli->prepare("UPDATE shiftRequest SET status = ? WHERE RequestID = ?;");
    $sql->bind_param('si', $approve, $reqID);
    try {
        if ($sql->execute()) {
            echo "Record updated successfully";
            $queryStatus = True;
        } else {
            echo "Error updating record: " . $sql->error;
        }
    } catch (Exception $e) {
            echo($e);
    }    
    $sql->close();
    $mysqli->close();
    return $queryStatus;
}

function denyTimeOff($reqID, $EmployeeID, $EffectiveDate, $OriginalShift, $RequestedStartTime, $RequestedEndTime, $Reason, $RequestDate, $status) {
    $queryStatus = False;
    if (!str_contains($status, "Pending")) {
        debug_to_console("You can only update pending requests.");
        return !$queryStatus; 
    } 
    $deny = "Denied";
    $mysqli = dbConnect();
    $sql = $mysqli->prepare("UPDATE shiftRequest SET status = ? WHERE RequestID = ?;");
    $sql->bind_param('si', $deny, $reqID);
    try {
        if ($sql->execute()) {
            echo "Record updated successfully";
            $queryStatus = True;
        } else {
            echo "Error updating record: " . $sql->error;
        }
    } catch (Exception $e) {
            echo($e);
    }    
    $sql->close();
    $mysqli->close();
    return $queryStatus;
}

#insert time off requests, feature
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



#get performance table feature
function PerformanceSummary($daytime,$vehicle) {
    $mysqli = dbConnect();

    $sql1 = "DROP view if exists ALLtransitservice";

    $mysqli->query($sql1);

    #create view combing all transit services
    $sql2 ="CREATE VIEW AllTransitService AS
SELECT SServiceID AS ID, SRouteName, SubwayDestination AS Destination, 'Subway' AS ServiceType
FROM SubwayService 
UNION ALL
SELECT BserviceID, BRouteName, BusDestination, BusLineType
FROM BusService
UNION ALL
SELECT SCServiceID, SCRouteName, StreetCarDestination, 'Streetcar' AS ServiceType
FROM StreetCarService";

    if (!$mysqli->query($sql2)) {
        echo("Error generating view: " . $mysqli->error);
    }

    #assigning time to actual table name
    $time = NULL;
    if ($daytime == "weekday") {
        $time = "mon_fri_serviceperformance";
    } elseif ($daytime == "saturday") {
        $time = "sat_serviceperformance";
    }else {
        $time = "sunholiday_serviceperformance";
    }


    $sql2_5 = "DROP view if exists PerfTable";

    $mysqli->query($sql2_5);


    $sql3 = "CREATE VIEW PerfTable AS
SELECT TimeI.ServiceID, ATS.ServiceType, TimeI.AverageWT AS AverageWaitingTime, 
       TimeI.TenMinService, TimeI.coverage AS AllTimeCoverage, V.Model, V.Seat
FROM $time TimeI, Vehicle V, TransitServiceAssignVehicle TSAV, 
     AllTransitService ATS
WHERE TimeI.ServiceID = ATS.ID #tells you servicetype, streetcar, subway, or bus
AND TimeI.ServiceID = TSAV.ServiceID
AND TSAV.VehicleID = V.VehicleID";

    if (!$mysqli->query($sql3)) {
        echo("Error generating view: " . $mysqli->error);
    }

    $data = [];
    $sql4 = NULL;
    if ($vehicle == "all") { 
        $sql4 = "SELECT * FROM PerfTable";
    } elseif ($vehicle =="bus") { #2 types of buses, regular and express
        $sql4 = "SELECT * FROM PerfTable WHERE ServiceType ='Regular' or ServiceType ='Express'";
    } elseif ($vehicle == "Subway") { # for Subway
        $sql4 = "SELECT * FROM PerfTable where ServiceType = 'Subway'";
    } elseif ($vehicle == "StreetCar") {
        $sql4 = "SELECT * FROM PerfTable where ServiceType = 'StreetCar'";
    }
    
    $result = $mysqli->query($sql4);

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


# this function allows php to log to console
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('$output');</script>";
}

?>

