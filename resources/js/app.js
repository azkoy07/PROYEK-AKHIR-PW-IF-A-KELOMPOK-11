
document.addEventListener('DOMContentLoaded', function () {

    const menuButton = document.getElementById('menuButton');
    const sidebar = document.getElementById('sidebar');

    // Membuka dan menutup sidebar pada layar kecil
    if (menuButton && sidebar) {

        menuButton.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });

    }

});
