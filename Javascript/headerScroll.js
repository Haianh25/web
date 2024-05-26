
const header = document.querySelector('#header');
const scrollPosition = 100;

window.addEventListener('scroll', function() {
  if (window.pageYOffset > scrollPosition) {
    header.classList.add('sticky');
   
  } else {
    header.classList.remove('sticky');
    
  }
});


