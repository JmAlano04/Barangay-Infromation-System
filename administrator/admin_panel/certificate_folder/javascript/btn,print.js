document.addEventListener("mouseover", function () {

    // Get elements
    let print_modal = document.getElementById("print-modal");
    let printBtns = document.querySelectorAll(".print_btn");

    printBtns.forEach(function (btn) {

        btn.addEventListener("click", function () {

            print_modal.style.display = "block";

            // Get ID and record data
            let id = btn.getAttribute("data-id");

            let doc_amount = btn.parentNode.childNodes[35].textContent;
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
            document.getElementById("fullname").value = firstname + " " + middlename + " " + lastname;
            // Hide/show amount
            toggleAmount(status, doc_amount);
        });

    });

    // =======================
    // FUNCTION: HIDE/SHOW AMOUNT
    // =======================
    function toggleAmount(statusValue, doc_amount) {

        let status_print = document.getElementById("status_print");
        let submit = document.getElementById("submit");
        let cancel = document.getElementById("cancel");

        let amountInput = document.getElementById("amount");
        let amountLabel = document.getElementById("label_amount");
        let document_print = document.getElementById("document_print");
        let create_payment_header = document.getElementById("create_payment_header");
        let status_print_label = document.getElementById("status_print_label");
        let purpose_print = document.getElementById("purpose_print");
        let fullname_label= document.getElementById("fullname_label");
        let fullname = document.getElementById("fullname");
        let date_issue = document.getElementById("date_issue_print");
        let date_issue_print_label = document.getElementById("date_issue_print_label");
        if (statusValue === "Ready to Pick-up" || statusValue === "Released") {

            amountInput.disabled = true;
            amountInput.required = false;
            amountInput.style.display = "none";
            amountLabel.style.display = "none";
            document_print.style.display = "block";
            fullname_label.style.display = "block";
            amountInput.value = doc_amount; // 🔹 ensure amount is filled
            date_issue.style.display = "block";
            date_issue.disabled = true;
            purpose_print.disabled = true;
            status_print_label.style.display = "none";
            status_print.style.display = "none";
            date_issue_print_label.style.display = "block";
            submit.style.display = "none";
            cancel.style.display = "none";
            fullname.style.display = "block";
             fullname.disabled = true;
            create_payment_header.textContent = "Payment Created";

        } else {

            purpose_print.disabled = false;
            amountInput.disabled = false;
            amountInput.style.display = "block";
            amountLabel.style.display = "block";
            amountInput.required = true;
            fullname.style.display = "none";
            status_print_label.style.display = "none";
            status_print.style.display = "none";
            fullname_label.style.display = "none";
            create_payment_header.textContent = "Create Payment";
            submit.style.display = "inline-block";
            cancel.style.display = "inline-block";
             date_issue.style.display = "none";
         
             date_issue_print_label.style.display = "none";
        }
    }

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

});
