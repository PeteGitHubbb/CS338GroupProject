// this function creates a modal that displays a successful department edit
function showUpdateSuccessModal() {
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
}

function testmodal() {
    var span = document.getElementsByClassName("sub-title")[0];
    console.log(span);
    // span.style.color = "red";
    console.log('success.')
}

function test() {
    var span = document.getElementsByClassName("sub-title")[0];
    console.log(span);
}