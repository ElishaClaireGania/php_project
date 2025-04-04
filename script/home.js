// featured books
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


// cookie, session, and date & time
document.addEventListener('DOMContentLoaded', function () {
    let sessionMessage = document.getElementById('sessionMessage');
    let dateTimeInfo = document.getElementById('dateTimeInfo');

    // If the session message exists, make it disappear after 3 seconds
    if (sessionMessage && dateTimeInfo) {
        setTimeout(() => {
            sessionMessage.style.display = 'none';  // Hide the user ID message
            dateTimeInfo.style.display = 'none';   // Hide the date & last visit info
        }, 3000);  // All info disappears after 3 seconds
    }
});
