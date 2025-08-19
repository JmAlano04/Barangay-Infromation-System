      // Get the modal
      document.addEventListener("mouseover", function() {
        let modal_delete = document.getElementById("delete-modal");
        let deleteBtns = document.querySelectorAll(".delete_btn_blotter");
        let confirmDeleteBtn = document.getElementById("confirm-delete");
        let cancelDeleteBtn = document.getElementById("cancel-delete");
     
        deleteBtns.forEach(function(btn) {
            btn.addEventListener("click", function() {
                modal_delete.style.display = "block";
                // Store ID of record to delete
                let id = btn.getAttribute("data-id");
                confirmDeleteBtn.setAttribute("data-id", id);
            });
        });
        // Hide modal on cancel button click or outside click
        cancelDeleteBtn.addEventListener("click", function() {
            modal_delete.style.display = "none";
        });
        window.addEventListener("click", function(event) {
            if (event.target == modal_delete) {
                modal_delete.style.display = "none";
            }
        });
        
                        
        // Send delete request on confirm button click
        confirmDeleteBtn.addEventListener("click", function() {
            let id = confirmDeleteBtn.getAttribute("data-id");
            // Send AJAX request to delete.php
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/BIS/administrator/admin_panel/incident_folder/delete.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + id);
            xhr.onload = function() {
                if (xhr.status === 200) {
                  
                    // Refresh page or update table
                    window.location.href = "incident_folder/loading_delete.php";
                    
                } else {
                    console.log("Error deleting record!");
                }
            };
            modal_delete.style.display = "none";
        });
  
      });
  
        // Get the modal
        document.addEventListener("mouseover", function() {
          let modal_delete = document.getElementById("delete-modals");
          let deleteBtns = document.querySelectorAll(".delete_btn_blotters");
          let confirmDeleteBtn = document.getElementById("confirm-deletes");
          let cancelDeleteBtn = document.getElementById("cancel-deletes");
       
          deleteBtns.forEach(function(btn) {
              btn.addEventListener("click", function() {
                  modal_delete.style.display = "block";
                  // Store ID of record to delete
                  let id = btn.getAttribute("data-id");
                  confirmDeleteBtn.setAttribute("data-id", id);
              });
          });
          // Hide modal on cancel button click or outside click
          cancelDeleteBtn.addEventListener("click", function() {
              modal_delete.style.display = "none";
          });
          window.addEventListener("click", function(event) {
              if (event.target == modal_delete) {
                  modal_delete.style.display = "none";
              }
          });
          
                          
          // Send delete request on confirm button click
          confirmDeleteBtn.addEventListener("click", function() {
              let id = confirmDeleteBtn.getAttribute("data-id");
              // Send AJAX request to delete.php
              let xhr = new XMLHttpRequest();
              xhr.open("POST", "/BIS/administrator/admin_panel/incident_folder/delete.php", true);
              xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              xhr.send("id=" + id);
              xhr.onload = function() {
                  if (xhr.status === 200) {
                    
                      // Refresh page or update table
                      window.location.href = "incident_folder/loading_delete.php";
                      
                  } else {
                      console.log("Error deleting record!");
                  }
              };
              modal_delete.style.display = "none";
          });
    
        });
    
    