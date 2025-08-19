    
    // ----------------------MODAL_ADD_OFFIICIAL--------------------
    // Get the modal
    let modal_incident = document.getElementById("modal_import");

    // Get the button that opens the modal
    let btn_creates_incident = document.getElementById("create_import");

    // Get the <span> element that closes the modal
    let spans_incident = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn_creates_incident.onclick = function() {
        modal_incident.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    spans_incident.onclick = function() {
        modal_incident.style.display = "none";
    }

 