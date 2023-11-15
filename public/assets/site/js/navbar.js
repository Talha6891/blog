(function () {
    'use strict';

    var siteMenuClone = function () {
        var jsCloneNavs = document.querySelectorAll('.js-clone-nav');

        if (jsCloneNavs.length > 0) {
            var siteMobileMenuBody = document.querySelector('.site-mobile-menu-body');

            jsCloneNavs.forEach(nav => {
                var navCloned = nav.cloneNode(true);
                navCloned.setAttribute('class', 'site-nav-wrap');
                siteMobileMenuBody.appendChild(navCloned);
            });

            setTimeout(function () {
                var hasChildrens = document.querySelector('.site-mobile-menu').querySelectorAll(' .has-children');

                var counter = 0;
                hasChildrens.forEach(hasChild => {
                    var refEl = hasChild.querySelector('a');

                    var newElSpan = document.createElement('span');
                    newElSpan.setAttribute('class', 'arrow-collapse collapsed');

                    // prepend equivalent to jquery
                    hasChild.insertBefore(newElSpan, refEl);

                    var arrowCollapse = hasChild.querySelector('.arrow-collapse');
                    arrowCollapse.setAttribute('data-bs-toggle', 'collapse');
                    arrowCollapse.setAttribute('data-bs-target', '#collapseItem' + counter);

                    var dropdown = hasChild.querySelector('.dropdown');
                    dropdown.setAttribute('class', 'collapse');
                    dropdown.setAttribute('id', 'collapseItem' + counter);

                    counter++;
                });
            }, 1000);

            // Click js-menu-toggle
            var menuToggle = document.querySelectorAll(".js-menu-toggle");
            menuToggle.forEach(mtoggle => {
                mtoggle.addEventListener("click", (e) => {
                    document.body.classList.toggle('offcanvas-menu');
                    mtoggle.classList.toggle('active');
                });
            });

            var specifiedElement = document.querySelector(".site-mobile-menu");
            document.addEventListener('click', function (event) {
                var isClickInside = specifiedElement.contains(event.target);
                if (!isClickInside && document.body.classList.contains('offcanvas-menu')) {
                    document.body.classList.remove('offcanvas-menu');
                    menuToggle.forEach(mtoggle => {
                        mtoggle.classList.remove('active');
                    });
                }
            });
        }
    };
    siteMenuClone();
})();
