document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    // toggle -> sirve para agregar o quitar la clase .mostrar en el HTML
    navegacion.classList.toggle('mostrar')
}