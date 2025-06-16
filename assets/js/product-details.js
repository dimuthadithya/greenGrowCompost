// Thumbnail click handler
document.querySelectorAll('.product-thumbnail').forEach((thumb) => {
  thumb.addEventListener('click', function () {
    const mainImage = document.getElementById('mainProductImage');
    mainImage.src = this.src;

    // Add animation
    mainImage.style.transform = 'scale(1.05)';
    setTimeout(() => {
      mainImage.style.transform = 'scale(1)';
    }, 300);
  });
});

// Navbar background change on scroll
window.addEventListener('scroll', function () {
  if (window.scrollY > 50) {
    document.querySelector('.navbar').style.backgroundColor =
      'rgba(46, 125, 50, 0.98)';
  } else {
    document.querySelector('.navbar').style.backgroundColor =
      'rgba(46, 125, 50, 0.95)';
  }
});
