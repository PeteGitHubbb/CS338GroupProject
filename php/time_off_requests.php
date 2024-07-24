<?php
require "functions.php";
$requests = getTimeOffRequests();
?>

<form method="post" action="Managers.php">
    <input type="hidden" name ="form_id" value="timeOffRequests">
    <table>
        <tr>
            <th>RequestID</th>
            <th>EmployeeID</th>
            <th>Effective Date</th>
            <th>Original Shift</th>
            <th>Requested Start Time</th>
            <th>Requested End Time</th>
            <th>Reason</th>
            <th>Request Date</th>
            <th>status<th>
        </tr>
        <?php foreach ($requests as $request): ?>
        <tr>
            <td><?php echo $request['RequestID']; ?></td>
            <td><?php echo $request['EmployeeID']; ?></td>
            <td><?php echo $request['EffectiveDate']; ?></td>
            <td><?php echo $request['OriginalShift']; ?></td>
            <td><?php echo $request['RequestedStartTime']; ?></td>
            <td><?php echo $request['RequestedEndTime']; ?></td>
            <td><?php echo $request['Reason']; ?></td>
            <td><?php echo $request['RequestDate']; ?></td>
            <td><?php echo $request['status']; ?></td>
            

            <td>
                <input type="submit" name="Approve[<?php echo $request['RequestID']; ?>]" value="Approve">
                <input type="submit" name="Approve[<?php echo $request['RequestID']; ?>]" value="Deny">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>