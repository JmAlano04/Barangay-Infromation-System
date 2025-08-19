document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let edit_modal = document.getElementById("edit-modal_blotter");
    let editBtns = document.querySelectorAll(".update_btn_register");
    let updateBtn = document.getElementById("update-btn");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_user = btn.getAttribute("data-id");

        let  firstname_user = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let  middlename_user = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let  lastname_user = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let  gender = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let  age = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let  username_user = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let  password_user = btn.parentNode.parentNode.parentNode.cells[6].textContent;

        document.getElementById("id_user_edit").value = id_user;
        document.getElementById("firstname_user").value = firstname_user;
        document.getElementById("middlename_user").value = middlename_user;
        document.getElementById("lastname_user").value = lastname_user;

        document.getElementById("gender_user").value = gender;
        
        document.getElementById("age_user").value = age;
        
        document.getElementById("username_user").value = username_user;
        document.getElementById("password_user").value = password_user;
        
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
    let editBtns = document.querySelectorAll(".update_btn_registers");
    let updateBtn = document.getElementById("update-btns");        


    // Show modal on edit button click
    editBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        edit_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_user = btn.getAttribute("data-id");

        let  firstname_user = btn.parentNode.parentNode.parentNode.cells[0].textContent;
        let  middlename_user = btn.parentNode.parentNode.parentNode.cells[1].textContent;
        let  lastname_user = btn.parentNode.parentNode.parentNode.cells[2].textContent;
        let  gender = btn.parentNode.parentNode.parentNode.cells[3].textContent;
        let  age = btn.parentNode.parentNode.parentNode.cells[4].textContent;
        let  username_user = btn.parentNode.parentNode.parentNode.cells[5].textContent;
        let  password_user = btn.parentNode.parentNode.parentNode.cells[6].textContent;

        document.getElementById("id_user_edit").value = id_user;
        document.getElementById("firstname_user").value = firstname_user;
        document.getElementById("middlename_user").value = middlename_user;
        document.getElementById("lastname_user").value = lastname_user;

        document.getElementById("gender_user").value = gender;
        
        document.getElementById("age_user").value = age;
        
        document.getElementById("username_user").value = username_user;
        document.getElementById("password_user").value = password_user;
        
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == edit_modal) {
            edit_modal.style.display = "none";
        }
    });

});



