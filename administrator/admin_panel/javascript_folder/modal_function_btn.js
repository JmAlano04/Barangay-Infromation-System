    
    // ----------------------MODAL_ADD_OFFIICIAL--------------------
    // Get the modal
     let modal_adds = document.getElementById("modal_add_official");

     // Get the button that opens the modal
     let btn_create_add = document.getElementById("create_btn");

 
     // When the user clicks on the button, open the modal
     btn_create_add.onclick = function() {
     modal_adds.style.display = "block";
     }

 

     // When the user clicks anywhere outside of the modal, close it
     window.onclick = function(event) {
     if (event.target == modal_adds) {
         modal_adds.style.display = "none";
     }
     }

