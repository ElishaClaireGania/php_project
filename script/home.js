document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".carousel-track");
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");

    let index = 0;
    const totalSlides = document.querySelectorAll(".book-slide").length;

    nextButton.addEventListener("click", () => {
        if (index < totalSlides - 1) {
            index++;
        } else {
            index = 0;
        }
        updateCarousel();
    });

    prevButton.addEventListener("click", () => {
        if (index > 0) {
            index--;
        } else {
            index = totalSlides - 1;
        }
        updateCarousel();
    });

    function updateCarousel() {
        track.style.transform = `translateX(-${index * 100}%)`;
    }
});
