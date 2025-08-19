document.addEventListener("mouseover", function() {
     
    // Get modal and button elements
 let print_modal = document.getElementById("edit-modal_revenue");
 let printBtns = document.querySelectorAll(".edit_revenue");
 let confirmBtn = document.getElementById("print-clear");        


 // Show modal on edit button click
 printBtns.forEach(function(btn) {
 btn.addEventListener("click", function() {
     print_modal.style.display = "block";
     // Get ID and data of record to edit
     let id = btn.getAttribute("data-id");
           
 
     let  amount = btn.parentNode.childNodes[1].textContent;
     

    
     document.getElementById("id_edit").value = id;

    document.getElementById("amount").value = amount;

 });
 });
         


     
 window.addEventListener("click", function(event) {
     if (event.target == print_modal) {
         print_modal.style.display = "none";
     }
 });



});