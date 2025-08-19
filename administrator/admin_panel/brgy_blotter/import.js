    
    // ----------------------MODAL_ADD_OFFIICIAL--------------------
    // Get the modal
    let modals = document.getElementById("modal_import");

    // Get the button that opens the modal
    let btn_creates = document.getElementById("create_import");

    // Get the <span> element that closes the modal
    let spans = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn_creates.onclick = function() {
    modals.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modals.style.display = "none";
    }

   