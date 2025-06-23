document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("darkToggle");
    if (toggle) {
        toggle.addEventListener("click", () => {
            document.body.classList.toggle("bg-dark");
            document.body.classList.toggle("text-white");
        });
    }
});
