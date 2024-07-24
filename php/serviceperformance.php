<?php
require "functions.php";

?>

<form method="post" action="php/performance.php">
    <input type = "hidden" name = "form_id" value = "performance">    
    <!-- time -->
    <label for="input1">time of day:</label>
    <select id="input1" name="time">
            <option value="weekday">weekday</option>
            <option value="saturday">saturday</option>
            <option value="sunday/holiday">sunday/holiday</option>
    </select>

    <!-- vehicle type -->
    <label for="input2">vehicle:</label>
    <select id="input2" name = "vehicle">
            <option value="all">all</option>
            <option value="Bus">Bus</option>
            <option value="Subway">Subway</option>
            <option value="StreetCar">StreetCar</option>
    </select>


    <br>
    <br>
    <input type="submit" value="Submit">

</form>
