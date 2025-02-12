// Function for the notification animation
document.addEventListener("DOMContentLoaded", function () {
    let notification = document.getElementById("notification");

    if (notification) {
        notification.style.display = "block";
        notification.style.animation = "slideIn 0.5s ease forwards";

        // Hide after 4 seconds
        setTimeout(() => {
            notification.style.animation = "fadeOut 0.5s ease forwards";
            setTimeout(() => {
                notification.style.display = "none";
            }, 500);
        }, 4000);
    }
});