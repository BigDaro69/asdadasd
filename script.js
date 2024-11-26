

function openSection(sectionId) {
    var sections = document.getElementsByClassName("section");
    for (var i = 0; i < sections.length; i++) {
        sections[i].classList.remove("active");
    }
    document.getElementById(sectionId).classList.add("active");
}
document.addEventListener("DOMContentLoaded", function() {
    openSection('home');
});

document.addEventListener("DOMContentLoaded", function() {
    const galleryImages = document.querySelectorAll(".gallery-item img");

    galleryImages.forEach(image => {
        image.style.width = "300px"; // Ustawienie szerokości na 300px
        image.style.height = "200px"; // Ustawienie wysokości na 200px
        image.style.objectFit = "cover"; // Dopasowanie zdjęcia do rozmiaru
    });
});

