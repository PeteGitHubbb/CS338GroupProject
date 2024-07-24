<?php
require "functions.php";


$departments = getEditableData();

?>

<form method="post" action="Managers.php">
    <input type ="hidden" name="form_id" value ="depart">
    <table>
        <tr>
            <th>DepartID</th>
            <th>ContactNo</th>
            <th>DepartName</th>
            <th>Mgr_ID</th>
        </tr>
        <?php foreach ($departments as $department): ?>
        <tr>
            <td><?php echo $department['DepartID']; ?></td>
            <td><input type="tel" name="ContactNo[<?php echo $department['DepartID']; ?>]" value="<?php echo $department['ContactNo']; ?>"></td>
            <td><input type="text" name="DepartName[<?php echo $department['DepartID']; ?>]" value="<?php echo $department['DepartName']; ?>"></td>
            <td><input type="number" name="Mgr_ID[<?php echo $department['DepartID']; ?>]" value="<?php echo $department['Mgr_ID']; ?>"></td>
            
            <td>
                <input type="hidden" name="DepartID[<?php echo $department['DepartID']; ?>]" value="<?php echo $department['DepartID']; ?>">
                <input type="submit" name="update[<?php echo $department['DepartID']; ?>]" value="Update">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>




