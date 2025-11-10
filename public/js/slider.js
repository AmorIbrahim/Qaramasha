document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('[data-slider-track]');
    const slides = Array.from(document.querySelectorAll('.hero-slider__slide'));
    const prevBtn = document.querySelector('[data-slider-prev]');
    const nextBtn = document.querySelector('[data-slider-next]');
    const dotsContainer = document.querySelector('[data-slider-dots]');
  
    if (!track || slides.length === 0) return;
  
    let currentIndex = 0;
  
    // إنشاء الدوتس
    slides.forEach((_, i) => {
      const btn = document.createElement('button');
      if (i === 0) btn.classList.add('active');
      btn.addEventListener('click', () => {
        goToSlide(i);
      });
      dotsContainer.appendChild(btn);
    });
  
    const updateDots = () => {
      const dots = Array.from(dotsContainer.children);
      dots.forEach(dot => dot.classList.remove('active'));
      dots[currentIndex].classList.add('active');
    };
  
    const goToSlide = (index) => {
      currentIndex = index;
      track.style.transform = `translateX(-${100 * currentIndex}%)`;
      updateDots();
    };
  
    nextBtn.addEventListener('click', () => {
      goToSlide((currentIndex + 1) % slides.length);
    });
  
    prevBtn.addEventListener('click', () => {
      goToSlide((currentIndex - 1 + slides.length) % slides.length);
    });
  
    // سلايدر تلقائي كل 4 ثواني
    setInterval(() => {
      goToSlide((currentIndex + 1) % slides.length);
    }, 4000);
  });
  