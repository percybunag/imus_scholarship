
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
document.addEventListener('DOMContentLoaded', function () {
    // Toggle Scholarship Status
    const statusElement = document.getElementById('scholarshipStatus');
    const toggleStatusBtn = document.getElementById('toggleStatusBtn');
    toggleStatusBtn.addEventListener('click', function () {
        if (statusElement.textContent === 'Active') {
            statusElement.textContent = 'Inactive';
            statusElement.style.color = 'red';
        } else {
            statusElement.textContent = 'Active';
            statusElement.style.color = 'green';
        }
    });

    // Save Scholarship Year
    const scholarshipYearForm = document.getElementById('scholarshipYearForm');
    scholarshipYearForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const scholarshipYear = document.getElementById('scholarshipYear').value;
        alert(`Scholarship Year Updated to: ${scholarshipYear}`);
        // You can add AJAX here to save the updated year to the server
    });
});

//Edit News and Updates Text Area

tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    menubar: false,
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });

document.addEventListener('DOMContentLoaded', function () {
    const statusElement = document.getElementById('scholarshipStatus');
    const toggleStatusBtn = document.getElementById('toggleStatusBtn');
    const confirmToggleBtn = document.getElementById('confirmToggleBtn');

    toggleStatusBtn.addEventListener('click', function () {
        // Show the confirmation modal
        const confirmToggleModal = new bootstrap.Modal(document.getElementById('confirmToggleModal'));
        confirmToggleModal.show();
    });

    confirmToggleBtn.addEventListener('click', function () {
        // Change the status after confirmation
        if (statusElement.textContent === 'Active') {
            statusElement.textContent = 'Closed for Applications';
            statusElement.style.color = 'red';
        } else {
            statusElement.textContent = 'Active';
            statusElement.style.color = 'green';
        }
        // Hide the modal after status change
        const confirmToggleModal = bootstrap.Modal.getInstance(document.getElementById('confirmToggleModal'));
        confirmToggleModal.hide();
    });
});
