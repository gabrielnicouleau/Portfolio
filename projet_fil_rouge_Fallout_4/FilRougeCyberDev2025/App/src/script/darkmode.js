// darkmod
const imglogo = document.querySelector('header').querySelector('div').querySelectorAll('img');
// console.log(imglogo);
const logo = imglogo[1];
// console.log(logo);
const darkModIcon = imglogo[0];
// console.log(darkModIcon);

function DarkModToggle(){
        document.body.classList.toggle('darkMode');
        if (document.body.classList.contains('darkMode')) {
                localStorage.setItem('darkmode', 'enabled');
                logo.src='./App/src/images/darkModeLogo.webp';
                darkModIcon.src='./App/src/images/light.webp'
                localStorage.setItem('themeIcon', 'soleil');
        } else {
                localStorage.setItem('darkmode', 'disabled');
                logo.src = './App/src/images/logo.webp';
                darkModIcon.src = './App/src/images/dark.webp'
                localStorage.setItem('themeIcon', 'lune');
        }
}
function DarkModeMemory(){
        const darkModeStatus = localStorage.getItem('darkmode');
        console.log(darkModeStatus);
        const themeIcon = localStorage.getItem('themeIcon');
        console.log(themeIcon);
        if (darkModeStatus ==='enabled') {
                document.body.classList.add('darkMode');
                logo.src = './App/src/images/darkModeLogo.webp';
                darkModIcon.src = './App/src/images/light.webp'
        }
        if (themeIcon ==='soleil') {
                logo.src = './App/src/images/darkModeLogo.webp';
                darkModIcon.src = './App/src/images/light.webp';
        } else {
                logo.src = './App/src/images/logo.webp';
                darkModIcon.src = './App/src/images/dark.webp'
        }
}
document.addEventListener('DOMContentLoaded', DarkModeMemory);
darkModIcon.addEventListener('click', DarkModToggle);
