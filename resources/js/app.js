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
            this.mainMenuToggle = document.querySelector('[js-toggle-menu="toggler"] a')
            this.mainServicesMenu = document.getElementById('main-services-menu')
            this.shadow = document.getElementById('shadow')

            this.mainMenuToggle.addEventListener('click',(e) => {
                e.preventDefault();
            })

            document.addEventListener('click',(e) => {
                if (e.target.closest('[js-toggle-menu="toggler"]')) {
                    this.open();
                } else if (e.target.closest('#main-services-menu')) {

                } else {
                    this.close();
                }
            })

            this.submenu();
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
            const menuItems = this.mainServicesMenu.querySelectorAll('[js-service-menu="item"]')
            menuItems.forEach(el => {
                el.addEventListener('mouseenter', (e) => {
                    let template = document.getElementById('menu-services-template-' + e.target.getAttribute('data-id'));
                    submenu.innerHTML = '';
                    if (template) {
                        submenu.appendChild(template.content.cloneNode(true));
                    }
                })
            })
        }
    }
})(window);

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

(function (window) {
    const body = document.querySelector('body')
    document.querySelectorAll('[data-scroll-to-top]').forEach(el => {
        el.onclick = () => {
            body.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
        }
    })
})(window);

