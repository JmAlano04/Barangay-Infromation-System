document.addEventListener("mouseover", function() {
     
           
    // Get the modal
     let modal_delete = document.getElementById("delete-modal_revenue");
     let deleteBtns = document.querySelectorAll(".delete_btn_revenue");
     let certDeleteBtn = document.getElementById("confirm-delete_revenue");
     let cancelDeleteBtn = document.getElementById("cancel-delete_revenue");
 
     deleteBtns.forEach(function(btn) {
         btn.addEventListener("click", function() {
             modal_delete.style.display = "block";
             // Store ID of record to delete
             let id = btn.getAttribute("data-id");
             certDeleteBtn.setAttribute("data-id", id);
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
       certDeleteBtn.addEventListener("click", function() {
        let id = certDeleteBtn.getAttribute("data-id");
        // Send AJAX request to delete.php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/BIS/administrator/admin_panel/certificate_folder/delete_revenue.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        xhr.onload = function() {
            if (xhr.status === 200) {
           
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", '/BIS/administrator/admin_panel/certificate_folder/revenue.php');
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    document.getElementById("content_certificate").innerHTML = xhttp.responseText;
                }
                
            } else {
                console.log("Error deleting record!");
            }
        };
        modal_delete.style.display = "none";
    });

});