const mobileMenuIcon = document.getElementById('mobile-menu-icon');
const curtain = document.querySelector('.curtain');
const curtainCloseIcon = document.querySelector('.curtain .close-icon');

mobileMenuIcon.addEventListener('click', () => {
  curtain.classList.toggle('show');
});

curtainCloseIcon.addEventListener('click', () => {
  curtain.classList.remove('show');
});


const start= document.getElementById('pulsante');
start.addEventListener("click",()=>{
  window.location.href = "home.php"
});


  