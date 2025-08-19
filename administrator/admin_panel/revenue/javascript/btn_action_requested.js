document.addEventListener("click", function(event) {
    if (event.target.classList.contains("dropdown-btns")) {
        let dropdownContent = event.target.nextElementSibling;
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        let arrow = event.target.querySelector(".arrow");
        arrow.classList.toggle("up");
    }
    });
