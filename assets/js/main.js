'use strict';

// Wait for DOM to be ready.
document.addEventListener( 'DOMContentLoaded', function() {
    const bodyEl = document.querySelector('body');
    const menuOpener = document.getElementById('menu-opener');
    const menuCloser = document.getElementById('menu-closer');

    menuOpener.addEventListener('click', function(e) {
        e.preventDefault();

        bodyEl.classList.add('mobile-menu-enabled');
    });

    menuCloser.addEventListener('click', function(e) {
        e.preventDefault();

        bodyEl.classList.remove('mobile-menu-enabled');
    });
})
