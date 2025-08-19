document.addEventListener("mouseover", function() {
    // ----------------------MODAL_ADD_OFFIICIAL--------------------
// Get the modal
let modal = document.getElementById("modal_add_admin");

// Get the button that opens the modal
let btn_create = document.getElementById("add_account");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn_create.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
}
}
});

function show_pwd() {
var x = document.getElementById("password");
if (x.type === "password") {
document.getElementById("checkbox");
x.type = "text";
} else {
document.getElementById("checkbox");
x.type = "password";
}
};