/**
 * Fashion-Store Theme - Mobile Only
 */
(function() {
    'use strict';

    // Mobile menu functionality
    const menuBtn = document.querySelector('.menu-btn');
    
    if (menuBtn) {
        menuBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            // Add mobile menu panel toggle here if needed
        });
    }

})();