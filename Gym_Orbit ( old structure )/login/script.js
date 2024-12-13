const images = ['./img/image1.jpg', './img/image2.jpg', './img/image3.jpg', './img/image4.jpg', './img/image5.jpg'];
let currentIndex = 0;

function changeBackground() {
  const slide = document.querySelector('.slide');
  slide.style.backgroundImage = `url('${images[currentIndex]}')`;
  currentIndex = (currentIndex + 1) % images.length;

  // Add the "uncover" effect using a class
  slide.classList.remove('uncover'); // Reset class
  void slide.offsetWidth; // Trigger reflow
  slide.classList.add('uncover'); // Apply class
}

// Change background initially
changeBackground();

// Change background every 5 seconds
setInterval(changeBackground, 5000);

