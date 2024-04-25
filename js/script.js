      const slider = document.querySelector(".slider");
      const slideContainer = document.querySelector(".slide-container");
      const slides = document.querySelectorAll(".slide");
      const arrowLeft = document.querySelector(".arrow-left");
      const arrowRight = document.querySelector(".arrow-right");
      let currentIndex = 0;

      function moveSlide(direction) {
        if (direction === "left") {
          currentIndex = (currentIndex - 4 + slides.length) % slides.length;
        } else {
          currentIndex = (currentIndex + 4) % slides.length;
        }
        const offset = -currentIndex * (slides[0].offsetWidth + 10); // añadido el 10px de margen
        slideContainer.style.transform = `translateX(${offset}px)`;
      }

      arrowLeft.addEventListener("click", () => moveSlide("left"));
      arrowRight.addEventListener("click", () => moveSlide("right"));