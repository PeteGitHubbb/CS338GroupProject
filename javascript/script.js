// script.js
function showTable(url) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("TableContainer").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}