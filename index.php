<?php include "php/functions.php";

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
            <div class="section-title">General</div>
            <a href="javascript:void(0);" onclick="showTable('php/birthdays.php');">Upcoming Birthdays</a>
            <a href="javascript:void(0);" onclick="showTable('php/employee_schedules.php');">Schedules</a>
        </div>
        <div class="right" id="TableContainer">
            <div class="section-title">Section Title</div>
        </div>        
    </main>


    <?php include "includes/footer.php"?>
    




    <script src="javascript/script.js"></script>
</body>
</html>