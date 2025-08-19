document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let edit_modal = document.getElementById("edit-modal_update");
    let editBtns = document.querySelectorAll(".update_btn");
    let updateBtn = document.getElementById("update-btn");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_blotter = btn.getAttribute("data-id");

        let  date = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let  time = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let  name_involve = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let  address = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let  vehicle = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let  license = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let  plate_no = btn.parentNode.parentNode.parentNode.cells[6].textContent;
        let  cause_incident = btn.parentNode.parentNode.parentNode.cells[7].textContent;
        let  status = btn.parentNode.parentNode.parentNode.cells[8].textContent;
      

        document.getElementById("id_upd").value = id_blotter;

        document.getElementById("date_upd").value = date;
        document.getElementById("time_upd").value = time;
        document.getElementById("person1_upd").value = name_involve;
        document.getElementById("address1_upd").value = address;
        document.getElementById("vehicle1_upd").value = vehicle;
        document.getElementById("license1_upd").value = license;
        document.getElementById("plate1_upd").value = plate_no; 
        document.getElementById("cause_incident_upd").value = cause_incident; 
        document.getElementById("status_upd").value = status;
       
       
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });

});
