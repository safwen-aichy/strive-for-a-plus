// Function to update the file name displayed on the file input field
function updateFileName() {
    const fileInput = document.getElementById('profile_picture');
    const fileNameDisplay = document.getElementById('file-name');

    if (fileInput.files.length > 0) {
        fileNameDisplay.textContent = fileInput.files[0].name;
    } else {
        fileNameDisplay.textContent = "No file selected";
    }
}