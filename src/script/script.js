document.getElementById("btnContact").addEventListener("click",()=>{
    window.location.href = '#contactForm'
})

window.addEventListener("load",()=>{
    typeWriter()
})


var i = 0;
var text = 'An innovative design for your next website';
var speed = 50;

function typeWriter() {
    if (i < text.length) {
        document.getElementById("mainP").innerHTML += text.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
}

const btnTop = document.getElementById("btnTop")

window.onscroll = function(){scrollToTop()}

function scrollToTop(){
    if(document.body.scrollTop > 400 || document.documentElement.scrollTop > 400){
        btnTop.style.display = "block";
    }else{
        btnTop.style.display = "none";
    }
}

btnTop.addEventListener("click",()=>{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
})

let fname = document.getElementById("fname");
let lname = document.getElementById("lname");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let subject = document.getElementById("subject");
let message = document.getElementById("message");

fname.addEventListener("focusout",()=>{
    validateInput(fname);
});
lname.addEventListener("focusout",()=>{
    validateInput(lname);
});
email.addEventListener("focusout",()=>{
    validateInput(email);
});
phone.addEventListener("focusout",()=>{
    validateInput(phone);
});
subject.addEventListener("focusout",()=>{
    validateInput(subject);
});
message.addEventListener("focusout",()=>{
    validateInput(message);
});

function validateInput(element){
    if(element.value == ""){
        element.style.outlineColor = "red";
        element.style.borderColor = "red";
    }else{
        element.style.outlineColor = "rgb(0, 0, 178)";
        element.style.borderColor = "#6e6e6e";
    }
}
function validateForm(){
    validateInput(fname)
    validateInput(lname)
    validateInput(email)
    validateInput(phone)
    validateInput(subject)
    validateInput(message)

}

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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