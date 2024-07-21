<?php include "php/functions.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //which update button was pressed
    $id = $_POST['id'];
    $edate = $_POST['edate'];
    $oshift= $_POST['oshift'];
    $stime= $_POST['estart'];
    $etime= $_POST['eend'];
    $reason= $_POST['reason'];

    //convert to 24 hour time
    $tmp1 = new DateTime($edate);
    $tmp2 = new DateTime($stime);
    $tmp3 = new DateTime($etime);

    $format_e_date = $tmp1->format('Y-m-d H:i:s');
    $format_stime = $tmp2->format('H:i:s');
    $format_etime = $tmp3->format('H:i:s');

    insertTimeOff($id,$format_e_date,$oshift,$format_stime,$format_etime,$reason);
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
            <div class="section-title">Employee Categories</div>
            <a href="javascript:void(0);" onclick="showTable('php/insertshift.php');">Request Time Off</a>
        </div>
        <div class="right" id="TableContainer">
            <div class="section-title">Section Title</div>
        </div>   
    </main>


    <?php include "includes/footer.php"?>
    




    <script src="javascript/script.js"></script>
</body>
</html>