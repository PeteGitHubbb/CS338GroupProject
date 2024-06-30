// script.js
function showTable() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/birthdays.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("birthdayTableContainer").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}