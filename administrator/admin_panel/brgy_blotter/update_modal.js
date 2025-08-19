document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let edit_modal = document.getElementById("edit-modal_blotter");
    let editBtns = document.querySelectorAll(".update_btn");
    let updateBtn = document.getElementById("update-btn");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_blotter = btn.getAttribute("data-id");

        let  subject = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let  cell_no = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let  place = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let  tanod = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let  time = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let  status = btn.parentNode.parentNode.parentNode.cells[6].textContent;
        let  type = btn.parentNode.parentNode.parentNode.cells[7].textContent;
        let  complainant = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let  age = btn.parentNode.parentNode.parentNode.cells[8].textContent;
        let  address_complainant = btn.parentNode.parentNode.parentNode.cells[9].textContent;
        let  complained_name = btn.parentNode.parentNode.parentNode.cells[10].textContent;
        let  add_complained_name = btn.parentNode.parentNode.parentNode.cells[11].textContent;
        let  details_reason = btn.parentNode.parentNode.parentNode.cells[12].textContent;
        let  date = btn.parentNode.parentNode.parentNode.cells[13].textContent;
      

        document.getElementById("id_blotter").value = id_blotter;

        document.getElementById("subject_blotter").value = subject;
        document.getElementById("cell_no_blotter").value = cell_no;
        document.getElementById("place_blotter").value = place;
        document.getElementById("tanod_blotter").value = tanod;
        document.getElementById("time_blotter").value = time;
        document.getElementById("status_blotter").value = status;
        document.getElementById("type_blotter").value = type; 
        document.getElementById("complainant_blotter").value = complainant;
        document.getElementById("age_blotter").value = age;
        document.getElementById("address_complainant_blotter").value = address_complainant;
        document.getElementById("complained_name_blotter").value = complained_name;
        document.getElementById("add_complained_name_blotter").value = add_complained_name;
        document.getElementById("details_reason_blotter").value = details_reason;
        document.getElementById("date_blotter").value = date;

    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });

});

document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let edit_modal = document.getElementById("edit-modal_blotters");
    let editBtns = document.querySelectorAll(".update_btns");
    let updateBtn = document.getElementById("update-btns");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_blotter = btn.getAttribute("data-id");

     
        let  subject = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let  cell_no = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let  place = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let  tanod = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let  time = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let  status = btn.parentNode.parentNode.parentNode.cells[6].textContent;
        let  type = btn.parentNode.parentNode.parentNode.cells[7].textContent;
        let  complainant = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let  age = btn.parentNode.parentNode.parentNode.cells[8].textContent;
        let  address_complainant = btn.parentNode.parentNode.parentNode.cells[9].textContent;
        let  complained_name = btn.parentNode.parentNode.parentNode.cells[10].textContent;
        let  add_complained_name = btn.parentNode.parentNode.parentNode.cells[11].textContent;
        let  details_reason = btn.parentNode.parentNode.parentNode.cells[12].textContent;
        let  date = btn.parentNode.parentNode.parentNode.cells[13].textContent;
      

        document.getElementById("id_blotter").value = id_blotter;

        document.getElementById("subject_blotter").value = subject;
        document.getElementById("cell_no_blotter").value = cell_no;
        document.getElementById("place_blotter").value = place;
        document.getElementById("tanod_blotter").value = tanod;
        document.getElementById("time_blotter").value = time;
        document.getElementById("status_blotter").value = status;
        document.getElementById("type_blotter").value = type; 
        document.getElementById("complainant_blotter").value = complainant;
        document.getElementById("age_blotter").value = age;
        document.getElementById("address_complainant_blotter").value = address_complainant;
        document.getElementById("complained_name_blotter").value = complained_name;
        document.getElementById("add_complained_name_blotter").value = add_complained_name;
        document.getElementById("details_reason_blotter").value = details_reason;
        document.getElementById("date_blotter").value = date;

    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });

});

