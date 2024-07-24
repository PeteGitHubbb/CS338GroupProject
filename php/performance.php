<?php
require "functions.php";

$perf_table = NULL;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_id = NULL;

    if (isset($_POST['form_id'])) {
        $form_id = $_POST['form_id'];
    }

    // update department form
    if ($form_id === "performance") {

        $dayimte = $_POST['time'];
        $vehicle = $_POST['vehicle'];

        $perf_table = PerformanceSummary($dayimte,$vehicle);

    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Performance Summary</title>

    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
    if (!empty($perf_table)) {
        echo "<table class='performance-table'>";
        echo "<tr><th>ServiceID</th><th>Service Type</th><th>Average Waiting Time</th>
        <th>Ten Minute Service</th><th>All time Coverage (1 is True)</th>
        <th>Model Type</th><th>Seats</th></tr>";

        // Generate table rows
        foreach ($perf_table as $service) {
            echo "<tr>";
            echo "<td>{$service['ServiceID']}</td>";
            echo "<td>{$service['ServiceType']}</td>";
            echo "<td>{$service['AverageWaitingTime']}</td>";
            echo "<td>{$service['TenMinService']}</td>";
            echo "<td>{$service['AllTimeCoverage']}</td>";
            echo "<td>{$service['Model']}</td>";
            echo "<td>{$service['Seat']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No schedule found.";
    }
    ?>

    <a href="../Managers.php">Back</a>
</body>
</html>

