document.addEventListener("DOMContentLoaded", function () {
    let messageBox = document.getElementById("floating-message");

    if (messageBox) {
        setTimeout(function () {
            messageBox.style.opacity = "0";  // Fade out the message
            setTimeout(() => messageBox.remove(), 3000);  // Remove the message after fade-out
        }, 3000);  // Wait for 3 seconds before starting the fade-out
    }
});