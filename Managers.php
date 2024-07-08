<?php include "php/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['DepartID'];
    $No = $_POST['ContactNo'];
    $name = $_POST['DepartName'];
    $mgr_id = $_POST['Mgr_ID'];

    updateDepartment($id, $No, $name, $mgr_id);
}

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
        </div>
        <div class="right" id="TableContainer">
            <div class="section-title">qdsadas</div>
        </div>
    </main>


    <?php include "includes/footer.php"?>
    



    <script src="javascript/script.js"></script>
</body>
</html>