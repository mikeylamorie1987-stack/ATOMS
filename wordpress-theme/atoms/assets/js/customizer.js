(function() {
  'use strict';

  document.addEventListener('DOMContentLoaded', function() {
    // Customizer functionality for live preview
    var root = document.documentElement;

    // Listen for color changes
    wp.customize('blogname', function(value) {
      value.bind(function(newval) {
        document.querySelector('.site-logo').textContent = newval;
      });
    });

    // Custom color customization
    if (wp && wp.customize) {
      wp.customize.bind('ready', function() {
        // Add custom theme settings here
      });
    }
  });
})();
