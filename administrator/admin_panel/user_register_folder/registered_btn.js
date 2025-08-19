    
    // ----------------------MODAL_ADD_OFFIICIAL--------------------
    // Get the modal
     let register = document.getElementById("modal_add_registered");

     // Get the button that opens the modal
     let btn_create_register = document.getElementById("create_registered");

     // Get the <span> element that closes the modal
     let span_register = document.getElementsByClassName("y_closes")[0];

     // When the user clicks on the button, open the modal
     btn_create_register.onclick = function() {
        register.style.display = "block";
     }

     // When the user clicks on <span> (x), close the modal
     span_register.onclick = function() {
        register.style.display = "none";
     }

// When the user clicks anywhere outside of the modal, close it
window.onclick = (event) => {
    if (event.target === register) register.style.display = "none";
};