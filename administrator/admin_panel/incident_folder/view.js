document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let view_modal = document.getElementById("view-modal");
    let viewBtns = document.querySelectorAll(".view_btn");
       


    // Show modal on edit button click
    viewBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        view_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_view = btn.getAttribute("data-id");
      
        let  date = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let  time = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let  name_involve = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let  address = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let  vehicle = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let  license = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let  plate_no = btn.parentNode.parentNode.parentNode.cells[6].textContent;
        let  cause_incident = btn.parentNode.parentNode.parentNode.cells[7].textContent;
        let  status = btn.parentNode.parentNode.parentNode.cells[8].textContent;


       
        document.getElementById("id_view").value = id_view;

        document.getElementById("date_view").value = date;
        document.getElementById("time_view").value = time;
        document.getElementById("person1_view").value = name_involve;
        document.getElementById("address1_view").value = address;
        document.getElementById("vehicle1_view").value = vehicle;
        document.getElementById("license1_view").value = license;
        document.getElementById("plate1_view").value = plate_no; 
        document.getElementById("cause_incident_view").value = cause_incident; 
 

        if(status == "Active"){
             document.getElementById("status_view").value = "Active";
             document.getElementById("status_view").style.color = "red";
        }else if (status == "Settled"){
            document.getElementById("status_view").value = "Settled";
            document.getElementById("status_view").style.color = "green";
        }else if (status == "Schedule"){
            document.getElementById("status_view").value = "Schedule";
            document.getElementById("status_view").style.color = "orange";
        }
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == view_modal) {
            view_modal.style.display = "none";
        }
    });

});