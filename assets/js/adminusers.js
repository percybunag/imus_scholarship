// Function to open the Edit Profile modal and populate it with current data
function editProfile() {
    $('#profileModal').modal('hide');
    $('#editProfileModal').modal('show');
}

// Ensure the close button works correctly
document.querySelectorAll('.btn-close').forEach(button => {
    button.addEventListener('click', () => {
        $('.modal').modal('hide');
    });
});

$(document).ready(function() {
    // Function to filter users based on search input
    $('.search-bar input').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('.user-container').each(function() {
            const userName = $(this).find('.user-info h4').text().toLowerCase();
            $(this).toggle(userName.includes(searchTerm));
        });
    });

    // Function to filter users based on dropdown selection
    $('.sort-dropdown select').on('change', function() {
        const selectedRole = $(this).val();
        if (selectedRole === "usertype") {
            $('.user-container').show();
        } else {
            $('.user-container').each(function() {
                const userRole = $(this).data('role');
                $(this).toggle(userRole === selectedRole);
            });
        }
    });
});

// Function to close the modal
function closeProfile() {
    const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
    profileModal.hide();
}

// Function to handle saving role changes
function saveRole() {
    const roleSelect = document.getElementById('roleSelect');
    const selectedRole = roleSelect.value;
    console.log('Selected Role:', selectedRole);
    // Implement role saving logic here
    $('#manageModal').modal('hide');
}

// Toggle navigation bar
document.getElementById('toggle-btn').addEventListener('click', function() {
    const sideNav = document.getElementById('side-nav');
    const mainContent = document.getElementById('main-content');
    sideNav.classList.toggle('hidden');
    mainContent.classList.toggle('shifted');
});

function populateEditProfileModal(button) {
    // Get the user data from data attributes
    const userId = button.getAttribute('data-id');
    const firstName = button.getAttribute('data-firstname');
    const middleName = button.getAttribute('data-middlename');
    const lastName = button.getAttribute('data-lastname');
    const dob = button.getAttribute('data-dob');
    const gender = button.getAttribute('data-gender');
    const email = button.getAttribute('data-email');
    const contactNumber = button.getAttribute('data-contact');
    const unitFloor = button.getAttribute('data-unit');
    const streetSubdivision = button.getAttribute('data-streetSubdivision'); 
    const barangay = button.getAttribute('data-barangay');

    // Populate the modal fields with the user data

    document.getElementById('firstName').value = firstName;
    document.getElementById('middleName').value = middleName;
    document.getElementById('lastName').value = lastName;
    document.getElementById('dob').value = dob;
    document.getElementById('gender').value = gender;
    document.getElementById('email').value = email;
    document.getElementById('contactNumber').value = contactNumber;
    document.getElementById('unitFloor').value = unitFloor;
    document.getElementById('streetSubdivision').value = streetSubdivision;
    document.getElementById('barangay').value = barangay;
    document.getElementById('userId').value = userId;
}

function saveProfileChanges() {
    // Gather the data from the form fields
    const userId = document.getElementById('userId').value;
    const firstName = document.getElementById('firstName').value;
    const middleName = document.getElementById('middleName').value;
    const lastName = document.getElementById('lastName').value;
    const dob = document.getElementById('dob').value;
    const gender = document.getElementById('gender').value;
    const email = document.getElementById('email').value;
    const contactNumber = document.getElementById('contactNumber').value;
    const unitFloor = document.getElementById('unitFloor').value;
    const streetSubdivision = document.getElementById('streetSubdivision').value;
    const barangay = document.getElementById('barangay').value;
    

        // Log data to console
        console.log('Sending data:', {
            userId,
            firstName,
            middleName,
            lastName,
            dob,
            gender,
            email,
            contactNumber,
            unitFloor,
            streetSubdivision,
            barangay
        });
    
    // Send AJAX request to update the profile
    fetch('../scripts/admin/users_update_profile.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            userId: userId,
            firstName: firstName,
            middleName: middleName,
            lastName: lastName,
            dob: dob,
            gender: gender,
            email: email,
            contactNumber: contactNumber,
            unitFloor: unitFloor,
            streetSubdivision: streetSubdivision,
            barangay: barangay
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            $('#editProfileModal').modal('hide');
            window.location.href = window.location.href;
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
