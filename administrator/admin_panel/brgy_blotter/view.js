document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let edit_modal = document.getElementById("view-modal_blotter");
    let editBtns = document.querySelectorAll(".view_btn");
       


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_view = btn.getAttribute("data-id");

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
      
      

        document.getElementById("id_view").value = id_view;

        document.getElementById("subject_view").value = subject;
        document.getElementById("cell_no_view").value = cell_no;
        document.getElementById("place_view").value = place;
        document.getElementById("tanod_view").value = tanod;
        document.getElementById("time_view").value = time;
        document.getElementById("status_view").value = status;
        document.getElementById("type_view").value = type; 
        document.getElementById("complainant_view").value = complainant;
        document.getElementById("age_view").value = age;
        document.getElementById("address_complainant_view").value = address_complainant;
        document.getElementById("complained_name_view").value = complained_name;
        document.getElementById("add_complained_name_view").value = add_complained_name;
        document.getElementById("details_reason_view").value = details_reason;
        document.getElementById("date_view").value = date;

        if(status == 1){
             document.getElementById("status_view").value = "Active";
             document.getElementById("status_view").style.color = "red";
        }else if (status == 2){
            document.getElementById("status_view").value = "Settled";
            document.getElementById("status_view").style.color = "green";
        }else if (status == 3){
            document.getElementById("status_view").value = "Schedule";
            document.getElementById("status_view").style.color = "orange";
        }
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });

});