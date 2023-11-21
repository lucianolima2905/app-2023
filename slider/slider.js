// slider.js
const sliderContent = document.querySelector('.slider-content');
const images = document.querySelectorAll('.slider img');
const progressBar = document.querySelector('.slider-progress');

let currentIndex = 0;
const slideWidth = 1012;

function nextSlide() {
    currentIndex = (currentIndex + 1) % images.length;
    updateSlider();
}

function updateSlider() {
    const translateX = -currentIndex * slideWidth;
    sliderContent.style.transform = `translateX(${translateX}px)`;
    updateProgressBar();
}

function updateProgressBar() {
    const progress = (currentIndex / (images.length - 1)) * 100;
    progressBar.style.width = progress + '%';
}

setInterval(nextSlide, 5000);
