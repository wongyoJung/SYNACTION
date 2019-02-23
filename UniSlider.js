
var slideIndex = 1;
// showSlides(slideIndex);

function UniplusSlides(n,wraper) {
  showSlides(slideIndex += n,wraper);
}

function UnicurrentSlide(n,wraper) {
  showSlides(slideIndex = n,wraper);
}

function UnishowSlides(n,wraper) {
  var i;
  var slides = document.getElementsByClassName(wraper);
  var dots = document.getElementsByClassName("dot");
  console.log(slides);
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  var activenumber = n+(n-1)*slides.length;
  dots[activenumber-1].className += " active";
  document.getElementsByClassName("active")[0].style.backgroundColor ="black";
}
