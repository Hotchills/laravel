

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

showSlides1();
function showSlides1() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides1, 10000); // Change image every 2 seconds
}

window.onscroll = function() {myFunction()};
/* var num = document.getElementById('myId').clientHeight; */
var num=120;
function myFunction() {
    if (document.body.scrollTop > num || document.documentElement.scrollTop > num) {
        document.getElementById("myId").className = "fixed";
    } else {
        document.getElementById("myId").className = "nav";
    }
}


         function myFunction1() {
         var x = document.getElementById('ds');
         if (x.style.display === 'none') {
         x.style.display = 'block';
         } else {
         x.style.display = 'none';
         }
         }
         function show(id) {
            
         var allDivs = document.getElementsByClassName('ascunde');   
         for (var i = 0; i < allDivs.length; i++){
         allDivs[i].classList.remove('afiseaza');
         }
         document.getElementById('idi' + id).classList.add('afiseaza');
         }

