// scroll button
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


// search button
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-box input");
    const searchButton = document.querySelector(".search-box button");

    function performSearch() {
        const query = searchInput.value.trim();
        if (query) {
            console.log("Searching for:", query);
            // You can replace the console log with actual search functionality
        }
    }

    searchButton.addEventListener("click", performSearch);

    searchInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            performSearch();
        }
    });
});
