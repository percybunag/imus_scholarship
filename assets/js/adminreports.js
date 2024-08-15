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