document.addEventListener("mouseover", function() {
     
           
    // Get the modal
     let modal_delete_manage = document.getElementById("delete-modal_req");
     let deleteBtns_manage = document.querySelectorAll(".delete_btn_req");
     let certDeleteBtn_manage = document.getElementById("confirm-delete_req");
     let cancelDeleteBtn_manage = document.getElementById("cancel-delete_req");
 
     deleteBtns_manage.forEach(function(btn) {
         btn.addEventListener("click", function() {
            modal_delete_manage.style.display = "block";
             // Store ID of record to delete
             let id = btn.getAttribute("data-id");
             certDeleteBtn_manage.setAttribute("data-id", id);
         });
     });
     // Hide modal on cancel button click or outside click
     cancelDeleteBtn_manage.addEventListener("click", function() {
        modal_delete_manage.style.display = "none";
     });
     window.addEventListener("click", function(event) {
         if (event.target == modal_delete_manage) {
            modal_delete_manage.style.display = "none";
         }
     });

       // Send delete request on confirm button click
       certDeleteBtn_manage.addEventListener("click", function() {
        let id = certDeleteBtn_manage.getAttribute("data-id");
        // Send AJAX request to delete.php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/BIS/administrator/admin_panel/certificate_folder/delete.req.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        xhr.onload = function() {
            if (xhr.status === 200) {
           
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", '/BIS/administrator/admin_panel/certificate_folder/certificate.php');
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    document.getElementById("content_certificate").innerHTML = xhttp.responseText;
                }
                
            } else {
                console.log("Error deleting record!");
            }
        };
        deleteBtns_manage.style.display = "none";
    });

});

// Clearance _______________
document.addEventListener("mouseover", function() {
     
           
    // Get the modal
     let modal_delete_manage = document.getElementById("delete-modal_clearance");
     let deleteBtns_manage = document.querySelectorAll(".delete_btn_clearance");
     let certDeleteBtn_manage = document.getElementById("confirm-delete_clearance");
     let cancelDeleteBtn_manage = document.getElementById("cancel-delete_clearance");
 
     deleteBtns_manage.forEach(function(btn) {
         btn.addEventListener("click", function() {
            modal_delete_manage.style.display = "block";
             // Store ID of record to delete
             let id = btn.getAttribute("data-id");
             certDeleteBtn_manage.setAttribute("data-id", id);
         });
     });
     // Hide modal on cancel button click or outside click
     cancelDeleteBtn_manage.addEventListener("click", function() {
        modal_delete_manage.style.display = "none";
     });
     window.addEventListener("click", function(event) {
         if (event.target == modal_delete_manage) {
            modal_delete_manage.style.display = "none";
         }
     });

       // Send delete request on confirm button click
       certDeleteBtn_manage.addEventListener("click", function() {
        let id = certDeleteBtn_manage.getAttribute("data-id");
        // Send AJAX request to delete.php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/BIS/administrator/admin_panel/certificate_folder/delete.req.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        xhr.onload = function() {
            if (xhr.status === 200) {
           
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", '/BIS/administrator/admin_panel/certificate_folder/clearance.php');
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    document.getElementById("content_certificate").innerHTML = xhttp.responseText;
                }
                
            } else {
                console.log("Error deleting record!");
            }
        };
        deleteBtns_manage.style.display = "none";
    });

});

// Indigency_____________________
document.addEventListener("mouseover", function() {
     
           
    // Get the modal
     let modal_delete_manage = document.getElementById("delete-modal_indigency");
     let deleteBtns_manage = document.querySelectorAll(".delete_btn_indigency");
     let certDeleteBtn_manage = document.getElementById("confirm-delete_indigency");
     let cancelDeleteBtn_manage = document.getElementById("cancel-delete_indigency");
 
     deleteBtns_manage.forEach(function(btn) {
         btn.addEventListener("click", function() {
            modal_delete_manage.style.display = "block";
             // Store ID of record to delete
             let id = btn.getAttribute("data-id");
             certDeleteBtn_manage.setAttribute("data-id", id);
         });
     });
     // Hide modal on cancel button click or outside click
     cancelDeleteBtn_manage.addEventListener("click", function() {
        modal_delete_manage.style.display = "none";
     });
     window.addEventListener("click", function(event) {
         if (event.target == modal_delete_manage) {
            modal_delete_manage.style.display = "none";
         }
     });

       // Send delete request on confirm button click
       certDeleteBtn_manage.addEventListener("click", function() {
        let id = certDeleteBtn_manage.getAttribute("data-id");
        // Send AJAX request to delete.php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/BIS/administrator/admin_panel/certificate_folder/delete.req.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        xhr.onload = function() {
            if (xhr.status === 200) {
           
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", '/BIS/administrator/admin_panel/certificate_folder/indigency.php');
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    document.getElementById("content_certificate").innerHTML = xhttp.responseText;
                }
                
            } else {
                console.log("Error deleting record!");
            }
        };
        deleteBtns_manage.style.display = "none";
    });

});


// Id_____________________
document.addEventListener("mouseover", function() {
     
           
    // Get the modal
     let modal_delete_manage = document.getElementById("delete-modal_id");
     let deleteBtns_manage = document.querySelectorAll(".delete_btn_id");
     let certDeleteBtn_manage = document.getElementById("confirm-delete_id");
     let cancelDeleteBtn_manage = document.getElementById("cancel-delete_id");
 
     deleteBtns_manage.forEach(function(btn) {
         btn.addEventListener("click", function() {
            modal_delete_manage.style.display = "block";
             // Store ID of record to delete
             let id = btn.getAttribute("data-id");
             certDeleteBtn_manage.setAttribute("data-id", id);
         });
     });
     // Hide modal on cancel button click or outside click
     cancelDeleteBtn_manage.addEventListener("click", function() {
        modal_delete_manage.style.display = "none";
     });
     window.addEventListener("click", function(event) {
         if (event.target == modal_delete_manage) {
            modal_delete_manage.style.display = "none";
         }
     });

       // Send delete request on confirm button click
       certDeleteBtn_manage.addEventListener("click", function() {
        let id = certDeleteBtn_manage.getAttribute("data-id");
        // Send AJAX request to delete.php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/BIS/administrator/admin_panel/certificate_folder/delete.req.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        xhr.onload = function() {
            if (xhr.status === 200) {
           
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", '/BIS/administrator/admin_panel/certificate_folder/ID.php');
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    document.getElementById("content_certificate").innerHTML = xhttp.responseText;
                }
                
            } else {
                console.log("Error deleting record!");
            }
        };
        deleteBtns_manage.style.display = "none";
    });

});