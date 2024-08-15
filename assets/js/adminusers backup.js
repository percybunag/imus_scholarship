// Function to open the Edit Profile modal and populate it with current data
function editProfile() {
    // Close the profile modal and open the edit profile modal
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
// Function to filter users based on dropdown selection
$('.sort-dropdown select').on('change', function() {
    var selectedRole = $(this).val();
        
    // Show all users if "Sort-Usertype" is selected
    if (selectedRole === "usertype") {
        $('.user-container').show();
    } else {
        $('.user-container').each(function() {
            var userRole = $(this).data('role');
            if (userRole === selectedRole) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});});
$(document).ready(function() {
    // Function to filter users based on search input
    $('.search-bar input').on('input', function() {
        var searchTerm = $(this).val().toLowerCase();
            
        $('.user-container').each(function() {
            var userName = $(this).find('.user-info h4').text().toLowerCase();
                
            if (userName.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

// Function to filter users based on dropdown selection
$('.sort-dropdown select').on('change', function() {
    var selectedRole = $(this).val();
            
    // Show all users if "Sort-Usertype" is selected
    if (selectedRole === "usertype") {
        $('.user-container').show();
    } else {
        $('.user-container').each(function() {
            var userRole = $(this).data('role');
            if (userRole === selectedRole) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});});

// Function to close the modal
function closeProfile() {
    const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
    profileModal.hide();
} 
        
// Function to handle saving role changes
function saveRole() {
    const roleSelect = document.getElementById('roleSelect');
    const selectedRole = roleSelect.value;
    // Implement role saving logic here
    console.log('Selected Role:', selectedRole);
        
    // After saving the changes, close the modal
    $('#manageModal').modal('hide');
}  
// toggle nav-bar //
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