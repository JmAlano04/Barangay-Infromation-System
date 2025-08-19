document.addEventListener("mouseover", function() {
    
    // Get modal and button elements
    let view_doc_modal = document.getElementById("view_doc-modal");
    let view_docBtns = document.querySelectorAll(".view_doc_btn");
          


    // Show modal on edit button click
    view_docBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        view_doc_modal.style.display = "block";
        // Get ID and data of record to edit
        let id_user = btn.getAttribute("data-id");
        let  photo_view_doc = btn.parentNode.parentNode.cells[8].textContent;
      
        document.getElementById("id_view_doc").value = id_user;
        document.getElementById("image_photo_view").src = photo_view_doc;
        
    });
    });
            
    window.addEventListener("click", function(event) {
        if (event.target == view_doc_modal) {
            view_doc_modal.style.display = "none";
        }
    });

});

