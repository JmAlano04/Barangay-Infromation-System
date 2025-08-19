document.addEventListener("mouseover", function() {
     
    // Get modal and button elements
 let add_modal_manage = document.getElementById("add-modal_manage");
 let addBtns_manage = document.querySelectorAll(".add_btn_manage");
     


 // Show modal on edit button click
 addBtns_manage.forEach(function(btn) {
 btn.addEventListener("click", function() {
   add_modal_manage.style.display = "block";
     // Get ID and data of record to edit
     let id = btn.getAttribute("data-id");
           
     document.getElementById("id_upd").value = id;
    
    
 });
 });
         


     
 window.addEventListener("click", function(event) {
     if (event.target == add_modal_manage) {
      add_modal_manage.style.display = "none";
     }
 });



});