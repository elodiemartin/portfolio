getDataProjets();
getDataParcours();

const loader = document.querySelector('.loader');
const body = document.querySelector('body');
const photoElodie = document.querySelector('.photo-elodie');
const descriptionHome = document.querySelector('.description');

function getDataProjets() {
    fetch("/api/projets")
        .then((response) => response.json()
            .then((response) => {

                for (let i = 0; i < response.length; i++) {
                    let title = response[i]['title'];
                    let content = response[i]['content'];
                    let link = response[i]['link'];
                    let picture = response[i]['picture'];
                    let github = response[i]['github'];

                    const divProjet = document.createElement('div');
                    divProjet.classList.add('col-12', 'col-sm-12', 'col-md-6', 'col-lg-4', 'col-xl-4', 'projet-img');
                    const divContent = document.createElement('div');
                    divContent.classList.add('content');
                    const divContentOverlay = document.createElement('div');
                    divContentOverlay.classList.add('content-overlay');
                    const img = document.createElement('img');
                    img.src = picture;
                    img.classList.add('mw-100');
                    img.setAttribute('alt', 'img-projet'+i);
                    const divContentDetails = document.createElement('div');
                    divContentDetails.classList.add('content-details', 'fadeIn-bottom');
                    const paragraphe = document.createElement('p');
                    if (title.length > 9) {
                        paragraphe.classList.add('font-weight-bold', 'p-long-lenght');
                    } else {
                        paragraphe.classList.add('font-weight-bold');
                    }
                    const textParagraphe = document.createTextNode(title);
                    const hr = document.createElement('hr');
                    const linkProject = document.createElement('a');
                    linkProject.classList.add('btn', 'btn-primary', 'btn-projet');
                    linkProject.setAttribute('data-toggle', 'modal');
                    linkProject.setAttribute('data-target', '#modalProjets');
                    const textLinkProject = document.createTextNode('Détails du projet');
                    const titleProject = document.createElement('h4');
                    titleProject.classList.add('text-center', 'mt-2');
                    const textTitleProject = document.createTextNode(title);
                    const projects = document.querySelector('.row-projects');

                    projects.appendChild(divProjet);
                    divProjet.appendChild(divContent);
                    divContent.appendChild(divContentOverlay);
                    divContent.appendChild(img);
                    divContent.appendChild(divContentDetails);
                    divContentDetails.appendChild(paragraphe);
                    paragraphe.appendChild(textParagraphe);
                    divContentDetails.appendChild(hr);
                    divContentDetails.appendChild(linkProject);
                    linkProject.appendChild(textLinkProject);
                    divProjet.appendChild(titleProject);
                    titleProject.appendChild(textTitleProject);

                    // divContent.addEventListener('click', function () {
                    //     const contentOverlay = this.parentNode.querySelector('.content-overlay');
                    //     const contentDetails = this.parentNode.querySelector('.content-details');
                    //     contentOverlay.style.opacity = '1';
                    //     contentDetails.style.opacity = '1';
                    // });

                    // document.addEventListener('touchstart', function (e) {
                    //     console.log(event.target);
                    //     const contentOverlay = this.parentNode.querySelector('.content-overlay');
                    //     const contentDetails = this.parentNode.querySelector('.content-details');
                    //     contentOverlay.style.opacity = '0';
                    //     contentDetails.style.opacity = '0';
                    // });

                    const allButtonProject = document.querySelectorAll('.btn-projet');
                    allButtonProject[i].addEventListener('click', function () {
                        const titleModal = document.querySelector('.text-title');
                        titleModal.innerHTML = title;
                        if (title.length > 9) {
                            titleModal.classList.add('text-title-long-lenght');
                        } else {
                            titleModal.classList.remove('text-title-long-lenght');
                        }
                        const textDescriptionModal = document.querySelector('.text-description');
                        textDescriptionModal.innerHTML = content;
                        const textLinkModal = document.querySelector('.link-modal');
                        if (link != null) {
                            if (window.matchMedia('(max-width: 575px)').matches) {
                                textLinkModal.style.display = 'flex';
                                textLinkModal.href = link;
                            } else {
                                textLinkModal.style.display = 'initial';
                                textLinkModal.href = link;
                            }
                        } else {
                            textLinkModal.style.display = 'none';
                        }
                        const textLinkGithubModal = document.querySelector('.link-github-modal');
                        if (github != null) {
                            if (window.matchMedia('(max-width: 575px)').matches) {
                                textLinkGithubModal.style.display = 'flex';
                                textLinkGithubModal.href = github;
                            } else {
                                textLinkGithubModal.style.display = 'initial';
                                textLinkGithubModal.href = github;
                            }
                        } else {
                            textLinkGithubModal.style.display = 'none';

                        }
                        const textLinkPictureModal = document.querySelector('.img-modal');
                        textLinkPictureModal.src = picture;

                        const technologiesModal = document.querySelector('.text-technologies');
                        technologiesModal.textContent = '';

                        for (let j = 0; j < response[i]['technologies'].length; j++) {
                            let technologies = response[i]['technologies'][j]['name'];
                            const textTechnologiesModal = document.createTextNode(technologies + ' ');
                            technologiesModal.appendChild(textTechnologiesModal);
                        }
                    })

                }
            })
        );
}

response1 = null;
response2 = null;

function getDataParcours() {

    fetch("/api/formations")
        .then((response) => response.json()
            .then((response) => {
                response1 = response;

                fetch("/api/experiences")
                    .then((response) => response.json()
                        .then((response) => {
                            response2 = response;
                            years = new Array();
                            for (item of response1) {
                                years.push(item.year.substr(0, 4));
                            }

                            for (item of response2) {
                                years.push(item.year.substr(0, 4));
                            }
                            years = [...new Set(years)];
                            years.sort();
                            const firstYear = years[0];

                            const partInfosCourse = document.querySelector('.part-infos-course');

                            /**** création des cercles */
                            [].forEach.call(years, function (item) {
                                const circle = document.createElement('div');
                                circle.classList.add('circle', 'pb-3');
                                const number = document.createElement('div');
                                number.classList.add('position-relative', 'number');
                                number.setAttribute('data-year', item);
                                const spanNumber = document.createElement('span');
                                spanNumber.classList.add('d-flex', 'justify-content-center', 'align-items-center', 'h-100', 'text-center', 'font-weight-bold', 'mt-1', 'span-number');
                                const textYear = document.createTextNode(item);
                                const circles = document.querySelector('.circles-course');
                                circles.appendChild(circle);
                                circle.appendChild(number);
                                number.appendChild(spanNumber);
                                spanNumber.appendChild(textYear);

                                /**** affichage du contenu correspondant au clic sur le cercle */
                                number.onclick = function () {

                                    const allNumbers = document.querySelectorAll('.number');
                                    for (let a = 0; a < allNumbers.length; a++) {
                                        allNumbers[a].classList.remove('active');
                                    }

                                    partInfosCourse.textContent = '';

                                    for (let i = 0; i < response1.length; i++) {
                                        let nameEducation = response1[i]['nameEducation'];
                                        let nameSchool = response1[i]['nameSchool'];
                                        let postCode = response1[i]['postCode'];
                                        let place = response1[i]['place'];
                                        let specialty = response1[i]['specialty'];
                                        let content = response1[i]['content'];
                                        if (this.dataset.year === response1[i]['year'].substr(0, 4)) {
                                            const titleCourse = document.createElement("h4");
                                            titleCourse.classList.add("mb-0", "pt-5");
                                            const infoCourse = document.createElement("h5");
                                            const textCourse = document.createElement("p");
                                            textCourse.classList.add("mt-3");
                                            const textTitleCourse = document.createTextNode(nameEducation);

                                            const textContentCourse = document.createTextNode(content);
                                            partInfosCourse.appendChild(titleCourse);
                                            titleCourse.appendChild(textTitleCourse);
                                            partInfosCourse.appendChild(infoCourse);
                                            if (specialty != null) {
                                                const textInfoCourse = document.createTextNode(nameSchool + ', ' + specialty + ', ' + postCode + ' ' + place);
                                                infoCourse.appendChild(textInfoCourse);
                                            } else {
                                                const textInfoCourse = document.createTextNode(nameSchool + ', ' + postCode + ' ' + place);
                                                infoCourse.appendChild(textInfoCourse);
                                            }
                                            partInfosCourse.appendChild(textCourse);
                                            textCourse.appendChild(textContentCourse);
                                            number.classList.add('active');
                                        }
                                    }

                                    for (let j = 0; j < response2.length; j++) {
                                        let title = response2[j]['title'];
                                        let nameCompany = response2[j]['nameCompany'];
                                        let postCode = response2[j]['postCode'];
                                        let place = response2[j]['place'];
                                        let duration = response2[j]['duration'];
                                        let content = response2[j]['content'];
                                        if (this.dataset.year === response2[j]['year'].substr(0, 4)) {
                                            const titleCourse = document.createElement("h4");
                                            titleCourse.classList.add("mb-0", "pt-5");
                                            const infoCourse = document.createElement("h5");
                                            const textCourse = document.createElement("p");
                                            textCourse.classList.add("mt-3");
                                            const textTitleCourse = document.createTextNode(title);
                                            const yearDuration = duration.split(/[A-Z]{1,2}/g)[1];
                                            const monthDuration = duration.split(/[A-Z]{1,2}/g)[2];
                                            const dayDuration = duration.split(/[A-Z]{1,2}/g)[3];

                                            if (yearDuration != 0) {
                                                if (yearDuration != 1) {
                                                    textYearDuration = yearDuration + ' ans ';
                                                } else {
                                                    textYearDuration = yearDuration + ' an ';
                                                }
                                            } else {
                                                textYearDuration = '';
                                            }

                                            if (monthDuration != 0) {
                                                textMonthDuration = monthDuration + ' mois ';
                                            } else {
                                                textMonthDuration = '';
                                            }

                                            if (dayDuration != 0) {
                                                if (dayDuration != 1) {
                                                    textDayDuration = dayDuration/7 + ' semaines ';
                                                } else {
                                                    textDayDuration = dayDuration/7 + ' semaine ';
                                                }
                                            } else {
                                                textDayDuration = '';
                                            }

                                            const textDuration = textYearDuration + textMonthDuration + textDayDuration;
                                            const textInfoCourse = document.createTextNode(nameCompany + ', ' + postCode + ' ' + place + ', ' + textDuration);
                                            const textContentCourse = document.createTextNode(content);
                                            partInfosCourse.appendChild(titleCourse);
                                            titleCourse.appendChild(textTitleCourse);
                                            partInfosCourse.appendChild(infoCourse);
                                            infoCourse.appendChild(textInfoCourse);
                                            partInfosCourse.appendChild(textCourse);
                                            textCourse.appendChild(textContentCourse);
                                            number.classList.add('active');
                                        }
                                    }
                                }

                            });

                            /**** affichage du contenu par défaut */
                            for (let i = 0; i < response1.length; i++) {
                                let nameEducation = response1[i]['nameEducation'];
                                let nameSchool = response1[i]['nameSchool'];
                                let postCode = response1[i]['postCode'];
                                let place = response1[i]['place'];
                                let specialty = response1[i]['specialty'];
                                let content = response1[i]['content'];
                                if (firstYear === response1[i]['year'].substr(0, 4)) {
                                    const titleCourse = document.createElement("h4");
                                    titleCourse.classList.add("mb-0", "pt-5");
                                    const infoCourse = document.createElement("h5");
                                    const textCourse = document.createElement("p");
                                    textCourse.classList.add("mt-3");
                                    const textTitleCourse = document.createTextNode(nameEducation);
                                    const textInfoCourse = document.createTextNode(nameSchool + ', ' + specialty + ', ' + postCode + ' ' + place);
                                    const textContentCourse = document.createTextNode(content);
                                    partInfosCourse.appendChild(titleCourse);
                                    titleCourse.appendChild(textTitleCourse);
                                    partInfosCourse.appendChild(infoCourse);
                                    infoCourse.appendChild(textInfoCourse);
                                    partInfosCourse.appendChild(textCourse);
                                    textCourse.appendChild(textContentCourse);
                                    const number = document.querySelector('.number');
                                    number.classList.add('active');
                                }
                            }
                            for (let j = 0; j < response2.length; j++) {
                                let title = response2[j]['title'];
                                let nameCompany = response2[j]['nameCompany'];
                                let postCode = response2[j]['postCode'];
                                let place = response2[j]['place'];
                                let duration = response2[j]['duration'];
                                let content = response2[j]['content'];
                                if (firstYear === response2[j]['year'].substr(0, 4)) {
                                    const titleCourse = document.createElement("h4");
                                    titleCourse.classList.add("mb-0", "pt-5");
                                    const infoCourse = document.createElement("h5");
                                    const textCourse = document.createElement("p");
                                    textCourse.classList.add("mt-3");
                                    const textTitleCourse = document.createTextNode(title);
                                    const yearDuration = duration.split(/[A-Z]{1,2}/g)[1];
                                    const monthDuration = duration.split(/[A-Z]{1,2}/g)[2];
                                    const dayDuration = duration.split(/[A-Z]{1,2}/g)[3];

                                    if (yearDuration != 0) {
                                        if (yearDuration != 1) {
                                            textYearDuration = yearDuration + ' ans ';
                                        } else {
                                            textYearDuration = yearDuration + ' an ';
                                        }
                                    } else {
                                        textYearDuration = '';
                                    }

                                    if (monthDuration != 0) {
                                        textMonthDuration = monthDuration + ' mois ';
                                    } else {
                                        textMonthDuration = '';
                                    }

                                    if (dayDuration != 0) {
                                        if (dayDuration != 1) {
                                            textDayDuration = dayDuration/7 + ' semaines ';
                                        } else {
                                            textDayDuration = dayDuration/7 + ' semaine ';
                                        }
                                    } else {
                                        textDayDuration = '';
                                    }

                                    const textDuration = textYearDuration + textMonthDuration + textDayDuration;
                                    const textInfoCourse = document.createTextNode(nameCompany + ', ' + postCode + ' ' + place + ', ' + textDuration);
                                    const textContentCourse = document.createTextNode(content);
                                    partInfosCourse.appendChild(titleCourse);
                                    titleCourse.appendChild(textTitleCourse);
                                    partInfosCourse.appendChild(infoCourse);
                                    infoCourse.appendChild(textInfoCourse);
                                    partInfosCourse.appendChild(textCourse);
                                    textCourse.appendChild(textContentCourse);
                                    const number = document.querySelector('.number');
                                    number.classList.add('active');
                                }
                            }

                            displayLoader();
                            displayContentHome();
                        }))
            })

        );
}

function displayLoader() {
    loader.style.display = 'none';
    body.style.overflowY = 'scroll';
}

//Affichage accueil avec animations
function displayContentHome() {
    photoElodie.style.display = 'initial';
    descriptionHome.style.display = 'initial';
    setTimeout(function() { 
        photoElodie.style.left = '0';
        photoElodie.style.opacity = '1';
        photoElodie.style.transition = '1s';
        setTimeout(function() { 
            descriptionHome.style.right = '0';
            descriptionHome.style.opacity = '1';        
            descriptionHome.style.transition = '1s'; 
        }, 1000); 
    }, 200); 
}