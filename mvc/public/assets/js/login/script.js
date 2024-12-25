const ROOT = "http://localhost:8080/mvc/public";  // Define the ROOT directly

const images = [
  `${ROOT}/assets/images/login/image1.jpg`,
  `${ROOT}/assets/images/login/image2.jpg`,
  `${ROOT}/assets/images/login/image3.jpg`,
  `${ROOT}/assets/images/login/image4.jpg`,
  `${ROOT}/assets/images/login/image5.jpg`
];

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
