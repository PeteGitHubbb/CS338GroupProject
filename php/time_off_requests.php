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
            <th>Status<th>
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
                <input type="hidden" name="RequestID[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['RequestID']; ?>">
                <input type="hidden" name="EmployeeID[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['EmployeeID']; ?>">
                <input type="hidden" name="EffectiveDate[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['EffectiveDate']; ?>">
                <input type="hidden" name="OriginalShift[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['OriginalShift']; ?>">
                <input type="hidden" name="RequestedStartTime[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['RequestedStartTime']; ?>">
                <input type="hidden" name="RequestedEndTime[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['RequestedEndTime']; ?>">
                <input type="hidden" name="Reason[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['Reason']; ?>">
                <input type="hidden" name="RequestDate[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['RequestDate']; ?>">
                <input type="hidden" name="status[<?php echo $request['RequestID']; ?>]" value="<?php echo $request['status']; ?>">

                <input type="submit" name="Approve[<?php echo $request['RequestID']; ?>]" value="Approve">
                <input type="submit" name="Deny[<?php echo $request['RequestID']; ?>]" value="Deny">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>