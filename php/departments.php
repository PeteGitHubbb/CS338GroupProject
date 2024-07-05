<?php
require "functions.php";


$departments = getEditableData();

?>

<form method="post" action="Managers.php">
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
            <td><input type="tel" name="ContactNo" value="<?php echo $department['ContactNo']; ?>"></td>
            <td><input type="text" name="DepartName" value="<?php echo $department['DepartName']; ?>"></td>
            <td><input type="number" name="Mgr_ID" value="<?php echo $department['Mgr_ID']; ?>"></td>
            
            <td>
                <input type="hidden" name="DepartID" value="<?php echo $department['DepartID']; ?>">
                <input type="submit" value="Update">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>




