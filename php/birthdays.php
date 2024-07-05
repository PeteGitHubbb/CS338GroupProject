

<?php
require "functions.php";


// Fetch person birthday data
$bday = getBirthday();

if (!empty($bday)) {
    echo "<table>";
    echo "<tr><th>EmployeeID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th></tr>";

    // Generate table rows
    foreach ($bday as $person) {
        echo "<tr>";
        echo "<td>{$person['EmployeeID']}</td>";
        echo "<td>{$person['FName']}</td>";
        echo "<td>{$person['LName']}</td>";
        echo "<td>{$person['BDate']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No bday found.";
}
?>

