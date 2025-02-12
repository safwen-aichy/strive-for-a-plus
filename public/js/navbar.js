// Function to toggle the dropdown for account settings
function toggleDropdown() {
    let dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('active');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    let dropdown = document.getElementById('profileDropdown');
    let profileContainer = document.querySelector('.profile-container');

    if (!profileContainer.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.remove('active');
    }
});
