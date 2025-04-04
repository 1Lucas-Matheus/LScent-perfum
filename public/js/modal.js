document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("Modal-Create");
    const openModalBtn = document.querySelector("[data-modal-toggle='Modal-Create']");
    const closeModalBtns = document.querySelectorAll("[data-modal-hide='Modal-Create']");

    openModalBtn.addEventListener("click", function() {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    });

    closeModalBtns.forEach((btn) => {
        btn.addEventListener("click", function() {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        });
    });

    modal.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }
    });
});