document.addEventListener("mouseover", function () {

    // Get elements
    let print_modal = document.getElementById("print-modal");
    let printBtns = document.querySelectorAll(".print_btn");

    printBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {

            print_modal.style.display = "block";

            // Get ID and record data
            let id = btn.getAttribute("data-id");

             let doc_amount = btn.parentNode.childNodes[37].textContent;
            let request_document = btn.parentNode.childNodes[27].textContent;
            let status = btn.parentNode.childNodes[31].textContent;
            let purpose = btn.parentNode.childNodes[19].textContent;

            let firstname = btn.parentNode.childNodes[1].textContent;
            let middlename = btn.parentNode.childNodes[3].textContent;
            let lastname = btn.parentNode.childNodes[5].textContent;

            document.getElementById("id_print").value = id;
            document.querySelector(".printer").value = doc_amount;
            document.getElementById("document_print").value = request_document;
            document.getElementById("status_print").value = status;
            document.getElementById("purpose_print").value = purpose;
            document.getElementById("firstname_print").value = firstname;
            document.getElementById("middlename_print").value = middlename;
            document.getElementById("lastname_print").value = lastname;

            // Hide/show amount
            toggleAmount(status);
        });
    });

    // Close when clicking outside modal
    window.addEventListener("click", function (event) {
        if (event.target == print_modal) {
            print_modal.style.display = "none";
        }
    });

    // When status changes
    let statusSelect = document.getElementById("status_print");
    statusSelect.addEventListener("change", function () {
        toggleAmount(this.value);
    });

    // =======================
    // FUNCTION: HIDE/SHOW AMOUNT
    // =======================
    function toggleAmount(statusValue) {
        let amountInput = document.getElementById("amount");
        let amountLabel = document.getElementById("label_amount");

        if (statusValue === "Ready to Pick-up" || statusValue === "Released") {
            amountInput.style.display = "none";
            amountLabel.style.display = "none";
            amountInput.required = false;
            amountInput.value = doc_amount;
        } else {
            amountInput.style.display = "block";
            amountLabel.style.display = "block";
            amountInput.required = true;
        }
    }

});
