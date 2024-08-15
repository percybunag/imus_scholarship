// toggle btn //
document.getElementById('toggle-btn').addEventListener('click', function () {
    const sideNav = document.getElementById('side-nav');
    const mainContent = document.getElementById('main-content');
    if (sideNav.classList.contains('hidden')) {
        sideNav.classList.remove('hidden');
        mainContent.classList.remove('shifted');
    } else {
        sideNav.classList.add('hidden');
        mainContent.classList.add('shifted');
    }
});


function openModal(modalId, overlayId) {
    document.getElementById(modalId).style.display = 'block';
    document.getElementById(overlayId).style.display = 'block';
}
// Function to show modal
function showModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

// Function to close modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}


function rejectProfile() {
// Logic to handle the rejection of the profile
alert('Profile has been rejected.');
// Example: Add code here to send data to your server or update the UI

// Manually close the modal
var myModal = new bootstrap.Modal(document.getElementById('profileModal'));
myModal.hide(); // Hide the modal after the action
}

function approveProfile() {
// Logic to handle the approval of the profile
alert('Profile has been approved.');
// Example: Add code here to send data to your server or update the UI

// Manually close the modal
var myModal = new bootstrap.Modal(document.getElementById('profileModal'));
myModal.hide(); // Hide the modal after the action
}
