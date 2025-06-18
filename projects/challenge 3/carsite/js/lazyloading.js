function lazyLoad() {
  const lazyImages = document.querySelectorAll('img[data-src]');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const lazyImage = entry.target;
        lazyImage.src = lazyImage.dataset.src;
        lazyImage.classList.remove('lazy');
        observer.unobserve(lazyImage);
      }
    });
  });

  lazyImages.forEach((lazyImage) => {
    observer.observe(lazyImage);
  });
}

function lazyLoad() {
  const lazyImages = document.querySelectorAll('img[data-src]');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const lazyImage = entry.target;
        lazyImage.src = lazyImage.dataset.src;
        lazyImage.classList.remove('lazy');
        observer.unobserve(lazyImage);
      }
    });
  });

  lazyImages.forEach((lazyImage) => {
    observer.observe(lazyImage);
  });
}

window.addEventListener('load', lazyLoad);