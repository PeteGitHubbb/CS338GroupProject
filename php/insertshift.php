<?php
require "functions.php";

?>

<form method="post" action="Employees.php">
    <!-- id -->
    <label for="input1">Employee ID:</label>
    <input type="number" id="input1" name="id" required><br><br>

    <!-- effective date -->
    <label for="input2">EffectiveDate:</label>
    <input type="datetime-local" id="input2" name="edate" required><br><br>

    <!-- schedule number -->
    <label for="input3">Original Shift Number:</label>
    <input type="number" id="input3" name="oshift" required><br><br>

    <!-- start time for that day-->
    <label for="input4">Effective Date Start time:</label>
    <input type="time" id="input4" name="estart" required><br><br>

    <!-- end time -->
    <label for="input5">Effective Date End time:</label>
    <input type="time" id="input5" name="eend" required><br><br>

    <!-- reason -->
    <label for="input6">Reason:</label>
    <input type="text" id="input6" name="reason" required><br><br>

    <!-- Submit Button -->
    <button type="submit">Submit</button>
</form>
