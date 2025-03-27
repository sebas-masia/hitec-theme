document.addEventListener("DOMContentLoaded", function () {
  const track = document.querySelector(".hitec-carousel-track");
  const slides = Array.from(track.children);
  const nextButton = document.querySelector(".hitec-carousel-next");
  const prevButton = document.querySelector(".hitec-carousel-prev");
  const dotsNav = document.querySelector(".hitec-carousel-dots");

  // Create dots
  slides.forEach((_, index) => {
    const dot = document.createElement("button");
    dot.classList.add("hitec-carousel-dot");
    if (index === 0) dot.classList.add("active");
    dotsNav.appendChild(dot);
  });

  const dots = Array.from(dotsNav.children);

  // Set slide width
  const slideWidth = slides[0].getBoundingClientRect().width;
  slides.forEach((slide, index) => {
    slide.style.left = slideWidth * index + "px";
  });

  let currentSlide = 0;

  // Move to slide function
  const moveToSlide = (targetIndex) => {
    if (targetIndex < 0) targetIndex = slides.length - 1;
    if (targetIndex >= slides.length) targetIndex = 0;

    track.style.transform = `translateX(-${slideWidth * targetIndex}px)`;

    // Update active dot
    dots[currentSlide].classList.remove("active");
    dots[targetIndex].classList.add("active");

    currentSlide = targetIndex;
  };

  // Next button click
  nextButton.addEventListener("click", () => {
    moveToSlide(currentSlide + 1);
  });

  // Previous button click
  prevButton.addEventListener("click", () => {
    moveToSlide(currentSlide - 1);
  });

  // Dot click
  dotsNav.addEventListener("click", (e) => {
    const targetDot = e.target.closest("button");
    if (!targetDot) return;

    const targetIndex = dots.findIndex((dot) => dot === targetDot);
    moveToSlide(targetIndex);
  });

  // Auto advance slides every 5 seconds
  setInterval(() => {
    moveToSlide(currentSlide + 1);
  }, 5000);
});
