// Function used to toggle the password visibility
function togglePassword(className) {
    let elements = document.getElementsByClassName(className);

    if (elements[0].type === "password") {
        elements[0].type = "text";
        elements[1].src = "./images/hide.png";
    } else {
        elements[0].type = "password";
        elements[1].src = "./images/view.png";
    }
}

// Function used to update the role when the switch is toggled
function updateRole() {
    let roleSwitch = document.getElementById("role-switch");
    let role = document.getElementById("role");

    if (roleSwitch.checked) {
        role.value = "tutor";
    } else {
        role.value = "student";
    }
}

