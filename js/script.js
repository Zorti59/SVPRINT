let hamButton = document.querySelector('.ham');
let navbar = document.querySelector('.navbar');

hamButton.addEventListener('click',openmenu);

function openmenu(){
    navbar.classList.toggle('showNav');
    hamButton.classList.toggle('showClose');
}

let menuLinks = document.querySelectorAll('.menuLink');

menuLinks.forEach(
    function(menuLink){ 
        menuLink.addEventListener('click',openmenu);
    }
)