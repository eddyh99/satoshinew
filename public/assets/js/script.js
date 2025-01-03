document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    /**
   * Back to top button
   */
  const backtotop = document.querySelector('.back-to-top');
  if (backtotop) {
    const toggleBacktotop = () => {
        const scrollPosition = window.scrollY;
        const documentHeight = document.documentElement.scrollHeight;
        const windowHeight = window.innerHeight;
        
      if (scrollPosition > (documentHeight - windowHeight) / 2) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('scroll', toggleBacktotop);
  }
})