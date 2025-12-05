    // Get modal and button elements
    let edit_modal = document.getElementById("edit-modal");
    let editBtns = document.querySelectorAll(".update_btn");
    let updateBtn = document.getElementById("update-btn");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
       
        let id = btn.getAttribute("data-id");

      
        let firstname_edit  = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let middlename_edit  = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let lastname_edit  = btn.parentNode.parentNode.parentNode.cells[2].textContent;

        let age_edit  = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let date_created_edit  = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let gender_edit  = btn.parentNode.parentNode.parentNode.cells[5].textContent;
       
        let user_type_edit  = btn.parentNode.parentNode.parentNode.cells[6].textContent;
        let status_edit  = btn.parentNode.parentNode.parentNode.cells[7].textContent;
        let email_edit  = btn.parentNode.parentNode.parentNode.cells[8].textContent;

     
        let password_edit  = btn.parentNode.parentNode.parentNode.cells[10].textContent;
        let admin_profile_edit  = btn.parentNode.parentNode.parentNode.cells[11].textContent;


        document.getElementById("id_edit").value = id;
        document.getElementById("firstname_edit").value = firstname_edit;
        document.getElementById("middlename_edit").value = middlename_edit;
        document.getElementById("lastname_edit").value = lastname_edit;

        document.getElementById("age_edit").value = age_edit;
        document.getElementById("date_created_edit").value = date_created_edit;
        document.getElementById("gender_edit").value = gender_edit;

        document.getElementById("user_type_edit").value = user_type_edit;
        document.getElementById("status_edit").value = status_edit;
        document.getElementById("email_edit").value = email_edit;


        // document.getElementById("password_edit").value = password_edit;

        document.getElementById("images_edit").src = admin_profile_edit;
    

    

       
    
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });


    function show_pwd_edit() {
        var x = document.getElementById("password_edit");
        if (x.type === "password") {
        document.getElementById("checkbox_edit");
        x.type = "text";
        } else {
        document.getElementById("checkbox_edit");
        x.type = "password";
        }
        };