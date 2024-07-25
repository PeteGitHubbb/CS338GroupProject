
<?php include "php/functions.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
function postServer() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form_id = NULL;

        if (isset($_POST['form_id'])) {
            $form_id = $_POST['form_id'];
            debug_to_console($form_id);
        }
        // update department form
        if ($form_id === "depart") {
            
            //which update button was pressed
            $update_keys = array_keys($_POST['update']);

            $id = $update_keys[0];
            $No = $_POST['ContactNo'][$id];
            $name = $_POST['DepartName'][$id];
            $mgr_id = $_POST['Mgr_ID'][$id];

            $updateStatus = updateDepartment($id, $No, $name, $mgr_id);
            # echo '<script type="text/javascript">', 'testmodal();', '</script>';
            if ($updateStatus) {
                debug_to_console("Update Success");
            } else {
                debug_to_console("Update Failed");
            }
            debug_to_console($id);
            debug_to_console($No);
            debug_to_console($name);
            debug_to_console($mgr_id);
        }
        
        // Approve/Deny Time off requests
        if ($form_id === "timeOffRequests") {
            //which update button was pressed
            $update_keys = NULL; 
            if (isset($_POST['Approve'])) {
                $update_keys = array_keys($_POST['Approve']);
                $reqID = $update_keys[0];
                $EmployeeID = $_POST['EmployeeID'][$reqID];
                $EffectiveDate = $_POST['EffectiveDate'][$reqID];
                $OriginalShift = $_POST['OriginalShift'][$reqID];
                $RequestedStartTime = $_POST['RequestedStartTime'][$reqID];
                $RequestedEndTime = $_POST['RequestedEndTime'][$reqID];
                $Reason = $_POST['Reason'][$reqID];
                $RequestDate = $_POST['RequestDate'][$reqID];
                $Status = $_POST['status'][$reqID];
                debug_to_console($reqID);
                debug_to_console($reqID);
                debug_to_console($Status);
                acceptTimeOff($reqID, $EmployeeID, $EffectiveDate, $OriginalShift, $RequestedStartTime, $RequestedEndTime, $Reason, $RequestDate, $Status);
            } elseif (isset($_POST['Deny'])) {
                $update_keys = array_keys($_POST['Deny']);
                $reqID = $update_keys[0];
                $EmployeeID = $_POST['EmployeeID'][$reqID];
                $EffectiveDate = $_POST['EffectiveDate'][$reqID];
                $OriginalShift = $_POST['OriginalShift'][$reqID];
                $RequestedStartTime = $_POST['RequestedStartTime'][$reqID];
                $RequestedEndTime = $_POST['RequestedEndTime'][$reqID];
                $Reason = $_POST['Reason'][$reqID];
                $RequestDate = $_POST['RequestDate'][$reqID];
                $Status = $_POST['status'][$reqID];

                denyTimeOff($reqID, $EmployeeID, $EffectiveDate, $OriginalShift, $RequestedStartTime, $RequestedEndTime, $Reason, $RequestDate, $Status);

            } else {
                debug_to_console('poo');
            }

            debug_to_console($update_keys);

        }   
    }
}
postServer();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" contents="View schedules of employees">

    <meta name="keywords" contents="Schedules, employees">

    <link rel="stylesheet" href="css/styles.css">


    <title>TTC</title>
</head>
<body>

    <?php include "includes/nav.php" ?>
    <?php include "includes/header.php"?>

    <main>
        <div class="left">
            <div class="section-title">Administration Categories</div>
            <a href="javascript:void(0);" onclick="showTable('php/time_off_requests.php');">Time off Requests</a>
            <a href="javascript:void(0);" onclick="showTable('php/departments.php');">Edit Department</a>
            <a href="javascript:void(0);" onclick="showTable('php/employee_schedules.php');">Employee Schedule</a>
            <a href="javascript:void(0);" onclick="showTable('php/serviceperformance.php');">Service Performance</a>
        </div>
        <div class="right" id="TableContainer">
            <div class="section-title">qdsadas</div>
        </div>
    </main>


    <?php include "includes/footer.php"?>
    



    <script src="javascript/script.js"></script>
</body>
</html>