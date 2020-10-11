(function($) {
    'use strict';


    // Wait for DOM to be ready.
    document.addEventListener( 'DOMContentLoaded', function() {
        const bodyEl = document.querySelector('body');
        const menuOpener = document.getElementById('menu-opener');
        const menuCloser = document.getElementById('menu-closer');

        // Mobile menu opener
        menuOpener.addEventListener('click', function(e) {
            e.preventDefault();

            bodyEl.classList.add('mobile-menu-enabled');
        });

        menuCloser.addEventListener('click', function(e) {
            e.preventDefault();

            bodyEl.classList.remove('mobile-menu-enabled');
        });

        // Using jQuery for the sub-menu interactions
        const parentLi = $('ul .menu-item-has-children');
        parentLi.append("<span class='submenu-opener'>+</span>");

        $(document).on('click', '.submenu-opener', function() {
            const parentEl = $(this).closest('li');
            parentEl.siblings().children('.sub-menu').removeClass('menu-open');
            parentEl.children('.sub-menu').toggleClass('menu-open');
        });

    })

})(jQuery)
