document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("image-overlay");
    const overlayImg = overlay.querySelector("img");
    const zoomables = document.querySelectorAll(".zoomable");

    zoomables.forEach(img => {
        img.addEventListener("click", function () {
            overlay.style.display = "flex";
            overlayImg.src = this.src;
        });
    });

    overlay.addEventListener("click", function () {
        overlay.style.display = "none";
    });
});