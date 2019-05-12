//Ouverture sidebar mobile
const btnNavDasboard = document.querySelector('.button-nav-top-dashboard');
const sidebar = document.querySelector('#sidebar');
let openSidebar = 0;

// //Items Sidebar
const changeActiveHome = document.querySelector('.change-active-home');
const changeActiveProjets = document.querySelector('.change-active-projets');
const changeActiveTechnologies = document.querySelector('.change-active-technologies');
const changeActiveFormations = document.querySelector('.change-active-formations');
const changeActiveExperience = document.querySelector('.change-active-experience');

let url = document.URL;
let pathname = new URL(url).pathname;

window.onload = changeActiveButtonNav();

btnNavDasboard.addEventListener('click', function () {

    if (openSidebar === 0) {
        sidebar.style.transition = '0.6s';
        sidebar.style.left = '0';
        btnNavDasboard.style.left = '270px';
        btnNavDasboard.style.transition = '0.6s';
        openSidebar = 1;
    } else if (openSidebar === 1) {
        sidebar.style.left = '-250px';
        sidebar.style.transition = '0.6s';
        btnNavDasboard.style.left = '30px';
        btnNavDasboard.style.transition = '0.6s';
        openSidebar = 0;
    }
});


function changeActiveButtonNav() {

    if (pathname == '/dashboard') {
        changeActiveHome.classList.add('button-active-onchange');
    }
    
    const recupPathname = pathname.split(/[/]{1,25}/g)[2];

    if (recupPathname == 'projets') {
        changeActiveProjets.classList.add('button-active-onchange');
    }

    if (recupPathname == 'technologies') {
        changeActiveTechnologies.classList.add('button-active-onchange');
    }

    if (recupPathname == 'formations') {
        changeActiveFormations.classList.add('button-active-onchange');
    }

    if (recupPathname == 'experience') {
        changeActiveExperience.classList.add('button-active-onchange');
    }

}