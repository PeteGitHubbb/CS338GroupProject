<?php
require "functions.php";


// Fetch person birthday data
$sched = getSchedules();

if (!empty($sched)) {
    echo "<table>";
    echo "<tr><th>EmployeeID</th><th>First Name</th><th>Last Name</th> <th>Start Time</th> 
    <th>End Time</th> <th>Schedule Type</th> </tr>";

    // Generate table rows
    foreach ($sched as $person) {
        echo "<tr>";
        echo "<td>{$person['EmployeeID']}</td>";
        echo "<td>{$person['FName']}</td>";
        echo "<td>{$person['LName']}</td>";
        echo "<td>{$person['StartTime']}</td>";
        echo "<td>{$person['EndTime']}</td>";
        echo "<td>{$person['ScheduleType']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No sched found.";
}
?>