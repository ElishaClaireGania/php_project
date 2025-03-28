document.addEventListener("DOMContentLoaded", function () {
    let messageBox = document.getElementById("floating-message");

    if (messageBox) {
        setTimeout(function () {
            messageBox.style.opacity = "0";
            setTimeout(() => messageBox.remove(), 1000);
        }, 3000);
    }
});