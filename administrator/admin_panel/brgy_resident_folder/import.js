    
    // ----------------------MODAL_ADD_OFFIICIAL--------------------
    // Get the modal
    let modal = document.getElementById("modal_import");

    // Get the button that opens the modal
    let btn_create = document.getElementById("create_import");

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

