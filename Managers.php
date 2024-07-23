<script type="text/javascript" src="../javascript/modal.js"></script>
<?php include "php/functions.php";

function postServer() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form_id = NULL;

        if (isset($_POST['form_id'])) {
            $form_id = $_POST['form_id'];
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
            <a href="">Time off Requests</a>
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