document.addEventListener("mouseover", function() {
     
    // Get modal and button elements
 let edit_modal_manage = document.getElementById("edit-modal_manage");
 let editBtns_manage = document.querySelectorAll(".edit_btn_manage");
     


 // Show modal on edit button click
 editBtns_manage.forEach(function(btn) {
 btn.addEventListener("click", function() {
    edit_modal_manage.style.display = "block";
     // Get ID and data of record to edit
     let id = btn.getAttribute("data-id");
           
     let  firstname_upd = btn.parentNode.childNodes[1].textContent;
     let  middlename_upd = btn.parentNode.childNodes[3].textContent;
     let  lastname_upd = btn.parentNode.childNodes[5].textContent;

     let  age_upd = btn.parentNode.childNodes[7].textContent;
    let  birthday_upd = btn.parentNode.childNodes[9].textContent;
    let  place_of_birth_upd = btn.parentNode.childNodes[11].textContent;
    
   
    let  gender_upd = btn.parentNode.childNodes[13].textContent;
    let  house_no_upd = btn.parentNode.childNodes[15].textContent;
    let  sitio_pook_upd = btn.parentNode.childNodes[17].textContent;

    let purpose_upd = btn.parentNode.childNodes[19].textContent;

    let  contact_no_upd = btn.parentNode.childNodes[21].textContent;
    let  contact_person_upd = btn.parentNode.childNodes[23].textContent;
    let  contact_person_no_upd = btn.parentNode.childNodes[25].textContent;

    let  request_document_upd = btn.parentNode.childNodes[27].textContent;
    let live_since_upd = btn.parentNode.childNodes[29].textContent;
    let status_upd = btn.parentNode.childNodes[31].textContent;

    let profile_upd = btn.parentNode.childNodes[33].textContent;
 


     document.getElementById("id_upd").value = id;
     document.getElementById("firstname_upd").value = firstname_upd;
     document.getElementById("middlename_upd").value = middlename_upd;
     document.getElementById("lastname_upd").value = lastname_upd;

     document.getElementById("age_upd").value = age_upd;
     document.getElementById("birthday_upd").value = birthday_upd;
     document.getElementById("place_of_birth_upd").value = place_of_birth_upd;
     
    
      document.getElementById("gender_upd").value = gender_upd;
      document.getElementById("house_no_upd").value = house_no_upd;
      document.getElementById("sitio_pook_update").value = sitio_pook_upd;

      document.getElementById("purpose_upd").value = purpose_upd;
    
      document.getElementById("contact_no_upd").value = contact_no_upd;
      document.getElementById("contact_person_upd").value = contact_person_upd;
      document.getElementById("contact_person_no_upd").value = contact_person_no_upd;

      document.getElementById("request_document_upd").value = request_document_upd;

      document.getElementById("live_since_upd").value = live_since_upd;
      document.getElementById("status_upd").value = status_upd;


      document.getElementById("profile_upd").value = profile_upd;
    
 });
 });
         


     
 window.addEventListener("click", function(event) {
     if (event.target == edit_modal_manage) {
        edit_modal_manage.style.display = "none";
     }
 });



});