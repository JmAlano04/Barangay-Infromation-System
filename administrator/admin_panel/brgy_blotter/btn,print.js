document.addEventListener("DOMContentLoaded", function () {

    let print_modal = document.getElementById("print-modal_blotter");
    let printBtns = document.querySelectorAll(".print_btn");

    printBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {

            print_modal.style.display = "block";

            // GET THE RECORD ID
            let id = btn.getAttribute("data-id");

            // CHECK IF INPUT EXISTS BEFORE USING IT
            let idInput = document.getElementById("print_record_id");
            if (idInput) {
                idInput.value = id;
            } else {
                console.warn("⚠ Missing <input id='print_record_id'> inside print modal.");
            }

        });
    });

    // Close modal when clicking outside the modal content
    window.addEventListener("click", function (event) {
        if (event.target === print_modal) {
            print_modal.style.display = "none";
        }
    });

});
