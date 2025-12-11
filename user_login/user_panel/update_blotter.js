document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("edit-modal_blotter");
    const closeModalBtn = modal.querySelector(".update-close-btn");

    // Open modal when Edit button is clicked
    document.querySelectorAll(".update_btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const tr = this.closest("tr");

            // Populate modal fields using PHP-rendered dataset attributes
            document.getElementById("edit_id").value = this.dataset.id;
            document.getElementById("edit_subject").value = tr.querySelector("td:nth-child(1)").textContent;
            document.getElementById("edit_place").value = tr.querySelector("td:nth-child(2)").textContent;
            document.getElementById("edit_complained_name").value = tr.querySelector("td:nth-child(3)").textContent;
            document.getElementById("edit_add_complained_name").value = tr.querySelector("td:nth-child(4)").textContent;
          
            document.getElementById("edit_details_reason").value = tr.querySelector("td:nth-child(15)").textContent;
            document.getElementById("edit_contact_no").value = tr.querySelector("td:nth-child(14)").textContent;
            

            modal.style.display = "flex";
        });
    });

    // Close modal when clicking "X"
    closeModalBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Close modal when clicking outside the modal content
    window.addEventListener("click", function(e) {
        if (e.target == modal) modal.style.display = "none";
    });
});
