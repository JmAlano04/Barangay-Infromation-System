    // Get modal and button elements
    document.addEventListener("mouseover", function() {
                
    let edit_modal = document.getElementById("edit-modal");
    let editBtns = document.querySelectorAll(".update_btn");
    let updateBtn = document.getElementById("update-btn");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id = btn.getAttribute("data-id");
       
        let fullname = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let chairman = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let position = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let term_start = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let term_end = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let status = btn.parentNode.parentNode.parentNode.cells[6].textContent;

        
        
        document.getElementById("id").value = id;
        document.getElementById("fullname").value = fullname;
        document.getElementById("chairmanship").value = chairman;
        document.getElementById("position").value = position;
        document.getElementById("term_start").value = term_start;
        document.getElementById("term_end").value = term_end;
        document.getElementById("status").value = status;
     
     
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });
    });
    




        // Get modal and button elements
        document.addEventListener("mouseover", function() {
                
            let edit_modal = document.getElementById("edit-modals");
            let editBtns = document.querySelectorAll(".update_btns");
            let updateBtn = document.getElementById("update-btn");        
        
        
            // Show modal on edit button click
            editBtns.forEach(function(btn) {
            btn.addEventListener("click", function() {
                edit_modal.style.display = "block";
                // Get ID and data of record to edit
                let id = btn.getAttribute("data-id");
               
                let fullname = btn.parentNode.parentNode.parentNode.cells[1].textContent;
                let chairman = btn.parentNode.parentNode.parentNode.cells[2].textContent;
                let position = btn.parentNode.parentNode.parentNode.cells[3].textContent;
                let term_start = btn.parentNode.parentNode.parentNode.cells[4].textContent;
                let term_end = btn.parentNode.parentNode.parentNode.cells[5].textContent;
                let status = btn.parentNode.parentNode.parentNode.cells[6].textContent;
        
                
                
                document.getElementById("id").value = id;
                document.getElementById("fullname").value = fullname;
                document.getElementById("chairmanship").value = chairman;
                document.getElementById("position").value = position;
                document.getElementById("term_start").value = term_start;
                document.getElementById("term_end").value = term_end;
                document.getElementById("status").value = status;
             
             
            });
            });
                    
            window.addEventListener("click", function(event) {
                if (event.target == edit_modal) {
                    edit_modal.style.display = "none";
                }
            });
            });
            