<?php
require "functions.php";

?>

<form method="post" action="Managers.php">
    <!-- time -->
    <label for="input1">Employee ID:</label>
    <select id="input1" name="time">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
    </select>

    <!-- vehicle type -->
    <label for="input2">EffectiveDate:</label>
    <select id="input2" name = "vehicle">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
    </select>


    <br>
    <br>
    <input type="submit" value="Submit">

</form>
