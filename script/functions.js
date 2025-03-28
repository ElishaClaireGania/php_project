document.addEventListener("DOMContentLoaded", function () {
    const scrollBtn = document.getElementById("back-to-top");

    // Show the button when scrolling down 200px
    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            scrollBtn.style.display = "block";
        } else {
            scrollBtn.style.display = "none";
        }
    });

    // Scroll to top when button is clicked
    window.scrollToTop = function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    };
});
