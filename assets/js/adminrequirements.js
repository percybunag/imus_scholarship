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

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            $(modal).modal('show');
        }

        function submitEditAccForm() {
            document.getElementById('edit-account-form').submit();
        }

        function deleteCategory() {
            // Add your delete logic here
            alert('Category deleted');
        }

