document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let verify_modal = document.getElementById("verify_blotter");
    let verifyBtns = document.querySelectorAll(".verify_btn_register");
 


    // Show modal on edit button click
    verifyBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        verify_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_verify = btn.getAttribute("data-id");

   
        document.getElementById("id_verify").value = id_verify;
      
        
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == verify_modal) {
            verify_modal.style.display = "none";
        }
    });

});