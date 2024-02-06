import { createApp } from "vue";
import App from "./src/App.vue";
import Router from "./src/router/router.js";
import Store from "./src/store/store.js";
import CitySelectComponent from "./src/components/CitySelectComponent.vue";

import './bootstrap';

createApp(App)
    .use(Router)
    .use(Store)
    .mount('App');

createApp(CitySelectComponent)
    .mount('city-select-component');

// main menu
(function (window) {
    'use strict';

    if (window.mainMenu) return;

    window.mainMenu = function (arParams)
    {
        this.params = arParams;
        this.mainMenuToggle = {};
        this.mainServicesMenu = {};
        this.shadow = {};
        this.init();
    };

    window.mainMenu.prototype = {
        init: function()
        {
            this.mainMenuToggle = document.querySelector('[js-service-menu="toggler"] a')
            this.mainServicesMenu = document.getElementById('main-services-menu')
            this.shadow = document.getElementById('shadow')

            this.mainMenuToggle.addEventListener('click',(e) => {
                e.preventDefault();
            })

            document.addEventListener('click',(e) => {
                if (e.target.closest('[js-service-menu="toggler"]')) {
                    this.open();
                } else if (e.target.closest('[js-service-menu="closer"]')) {
                    this.close();
                } else if (e.target.closest('#main-services-menu')) {
                    // nothing
                } else {
                    this.close();
                }
            })

            this.submenu();
            window.addEventListener("resize", this.submenu);
        },
        open: function () {
            this.mainServicesMenu.classList.toggle('active');
            this.shadow.classList.toggle('active');
        },
        close: function () {
            this.mainServicesMenu.classList.remove('active');
            this.shadow.classList.remove('active');
        },
        submenu: function () {
            const submenu = document.querySelector('[js-service-menu="submenu"]')
            const menuItems = document.getElementById('main-services-menu').querySelectorAll('[js-service-menu="item"]')
            let once = false

            menuItems.forEach(el => {

                if (window.screen.width > 1439) {

                    if (el.querySelector('[js-service-menu="child"]')) {
                        el.querySelector('[js-service-menu="child"]').style.display = 'none';
                    }

                    if (!once) {
                        el.addEventListener('mouseenter', (e) => {
                            let template = document.getElementById('menu-services-template-' + e.target.getAttribute('data-id'));
                            submenu.innerHTML = '';
                            if (template) {
                                submenu.appendChild(template.content.cloneNode(true));
                            }
                        })
                    }

                } else {

                    if (el.querySelector('[js-service-menu="child"]')) {
                        el.querySelector('[js-service-menu="child"]').style.display = 'block';
                    }

                }

            })

            once = true
        }
    }
})(window);

// map
(function (window){
    'use strict';

    if (window.JCmap) return;

    window.JCmap = function (arParams)
    {
        this.params = arParams;
        this.init();
    };

    window.JCmap.prototype = {
        init: function()
        {
            let yaMapInit = () => {
                if (!document.getElementById('map')) return;
                const myMap = new ymaps.Map('map', {
                    center: this.params.center,
                    zoom: 10,
                    controls: ['zoomControl'],
                    behaviors: ['drag'],
                });
            }

            ymaps.ready(yaMapInit);
        },
    }
})(window);

// tap to top
(function (window) {
    const body = document.querySelector('body')
    document.querySelectorAll('[data-scroll-to-top]').forEach(el => {
        el.onclick = () => {
            body.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
        }
    })
})(window);

// accordion
(function(window){
    function init_accordion(option) {
        const block = document.querySelectorAll('[data-accordion="block"]')

        if(block.length > 0){
            block.forEach(itemBlock => {
                const btn = itemBlock.querySelector('[data-accordion="head"]')
                const el = itemBlock.querySelector('[data-accordion="body"]')

                smoothView(btn, el)

                btn.addEventListener('click', () => {
                    itemBlock.classList.toggle('active')
                })
            })

            if(option === 'first_active')
                block[0].querySelector('[data-accordion="head"]').click();
        }
    }

    function smoothView(btn, el, startHeight = 0) {

        if (!btn && !el) return

        let heightEl = el.offsetHeight
        el.classList.add('not-active')
        el.style.height = startHeight + 'px';

        if (startHeight > 0) {
            if (heightEl < startHeight) {
                el.classList.remove('not-active')
                el.style.height = heightEl + 'px';
            }
        }

        const update = () => {
            el.style.height = 'auto'
            setTimeout(() => {
                heightEl = el.offsetHeight
                el.style.height = heightEl + 'px';
            }, 100)
        }

        btn.addEventListener('click', () => {
            if (el.classList.contains('not-active')) {
                el.classList.remove('not-active')
                el.style.height = heightEl + 'px';
                btn.classList.add('active')
            } else {
                el.classList.add('not-active')
                el.style.height = startHeight + 'px';
                btn.classList.remove('active')
            }
        })

        let observer = new MutationObserver(mutationRecords => {
            update()
        })

        observer.observe(el, {
            childList: true,
            subtree: true,
            characterDataOldValue: true
        })
    }

    init_accordion('first_active');
})(window);

// slider
(function (window){
    const swiper = new Swiper("#recommends-swiper",
        {
            slidesPerView: 1,
            spaceBetween: 20,
            // navigation: {
            //     nextEl: "#recoments_r",
            //     prevEl: "#recoments_l",
            // },
            breakpoints: {
                767: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                1023: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
                1439: {
                    slidesPerView: 4,
                    spaceBetween: 16,
                },
            }
        });
})(window)
