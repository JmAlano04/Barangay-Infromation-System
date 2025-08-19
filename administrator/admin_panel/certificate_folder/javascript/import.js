document.addEventListener("mouseover", function() {
     
    // Get modal and button elements
 let add_modal_manage = document.getElementById("import-modal_manage");
 let addBtns_manage = document.querySelectorAll(".import_btn_manage");
     


 // Show modal on edit button click
 addBtns_manage.forEach(function(btn) {
 btn.addEventListener("click", function() {
   add_modal_manage.style.display = "block";
     // Get ID and data of record to edit
     let id = btn.getAttribute("data-id");
           
     document.getElementById("id_upd").value = id;
    
    
 });
 });
         


     




});