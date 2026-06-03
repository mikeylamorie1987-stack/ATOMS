(function() {
  'use strict';

  // DOM Ready
  document.addEventListener('DOMContentLoaded', function() {
    initHeader();
    initAnimations();
    initScrollEffects();
  });

  /**
   * Header initialization
   */
  function initHeader() {
    var header = document.querySelector('.site-header');
    var lastScrollTop = 0;

    window.addEventListener('scroll', function() {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      
      if (scrollTop > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
      
      lastScrollTop = scrollTop;
    });
  }

  /**
   * Animation initialization
   */
  function initAnimations() {
    // Observe elements for animation
    var observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };

    var observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observe cards and other elements
    var elements = document.querySelectorAll('.card, .post-item, [data-animate]');
    elements.forEach(function(element) {
      observer.observe(element);
    });
  }

  /**
   * Scroll effects
   */
  function initScrollEffects() {
    // Add scroll-based parallax effects if needed
    window.addEventListener('scroll', function() {
      var scrollY = window.pageYOffset;
      var parallaxElements = document.querySelectorAll('[data-parallax]');
      
      parallaxElements.forEach(function(element) {
        var speed = element.getAttribute('data-parallax') || 0.5;
        element.style.transform = 'translateY(' + (scrollY * speed) + 'px)';
      });
    });
  }

  // Expose functions globally if needed
  window.atoms = {
    initHeader: initHeader,
    initAnimations: initAnimations,
    initScrollEffects: initScrollEffects
  };
})();
