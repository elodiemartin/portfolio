const body = document.querySelector('body');

//Variables réseaux sociaux contact
const linkedinContact = document.querySelector('.linkedin-contact');
const twitterContact = document.querySelector('.twitter-contact');
const githubContact = document.querySelector('.github-contact');
const circleLinkedinContact = document.querySelector('.circle-linkedin-contact');
const circleTwitterContact = document.querySelector('.circle-twitter-contact');
const circleGithubContact = document.querySelector('.circle-github-contact');

//Variables Menu
const iconMenu = document.querySelector('.navbar-toggler-icon-front');

//Sections
const sectionHome = document.querySelector('#home').offsetTop;
const sectionSkills = document.querySelector('#skills').offsetTop;

//Fonctions changement couleur réseaux sociaux contact au hover
circleLinkedinContact.addEventListener('mouseover', function () {
    linkedinContact.style.color = '#ffffff';
    linkedinContact.style.transition = '0.3s';
});

circleLinkedinContact.addEventListener('mouseout', function () {
    linkedinContact.style.color = '#c4e092';
    linkedinContact.style.transition = '0.3s';
});

circleTwitterContact.addEventListener('mouseover', function () {
    twitterContact.style.color = '#ffffff';
    twitterContact.style.transition = '0.3s';
});

circleTwitterContact.addEventListener('mouseout', function () {
    twitterContact.style.color = '#c4e092';
    twitterContact.style.transition = '0.3s';
});

circleGithubContact.addEventListener('mouseover', function () {
    githubContact.style.color = '#ffffff';
    githubContact.style.transition = '0.3s';
});

circleGithubContact.addEventListener('mouseout', function () {
    githubContact.style.color = '#c4e092';
    githubContact.style.transition = '0.3s';
});

//Changement couleur icône menu home au scroll
document.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;

    if (scrollPosition >= sectionHome && scrollPosition < sectionSkills) {
        iconMenu.classList.remove('icon-nav-purple');
    } else if (scrollPosition > sectionSkills) {
        iconMenu.classList.add('icon-nav-purple');
    }
});

//Affichage des competences avec animations au scroll
document.addEventListener('scroll', function animateSkills() {
    let scrollTop = window.scrollY + window.innerHeight;
    const divSkills = document.querySelector('#skills');
    let distanceTop = divSkills.offsetTop;
    if (scrollTop >= distanceTop + 200) {
        divSkills.style.top = '0';
        divSkills.style.opacity = '1';
        divSkills.style.transition = '0.6s';
    }
});

//Affichage des projets avec animations au scroll
document.addEventListener('scroll', function animateProject() {
    let scrollTop = window.scrollY + window.innerHeight;
    const allProjects = document.querySelectorAll('.projet-img');
    const divProjet = document.querySelector('#projects').offsetTop;

    for (let i = 0; i < allProjects.length; i++) {
        let distanceTop = allProjects[i].offsetTop + divProjet;
        if (scrollTop >= distanceTop + 200) {
            allProjects[i].style.top = '0';
            allProjects[i].style.opacity = '1';
            allProjects[i].style.transition = '0.6s';
        }
    }
});

//Affichage des competences avec animations au scroll
document.addEventListener('scroll', function animateCourse() {
    let scrollTop = window.scrollY + window.innerHeight;
    const divCourse = document.querySelector('.course-content');
    let distanceTop = divCourse.offsetTop;
    if (scrollTop >= distanceTop + 200) {
        divCourse.style.top = '0';
        divCourse.style.opacity = '1';
        divCourse.style.transition = '0.6s';
    }
});