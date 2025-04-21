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

document.addEventListener("DOMContentLoaded", function () {
    const zoomImages2 = document.querySelectorAll(".zoom2");
    const overlay2 = document.getElementById("zoom2-overlay");
    const overlayImg2 = overlay2.querySelector("img");

    zoomImages2.forEach(img => {
        img.addEventListener("click", function () {
            overlay2.style.display = "flex";
            overlayImg2.src = this.src;
        });
    });
});