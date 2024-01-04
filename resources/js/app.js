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

    if (window.mainMenu)
        return;

    window.mainMenu = function (arParams)
    {
        this.params = arParams;
        this.init();
    };

    window.mainMenu.prototype = {
        init: function()
        {
            const mainMenuToggle = document.querySelector('[js-toggle-menu="toggler"] a')
            const mainServicesMenu = document.getElementById('main-services-menu')
            const shadow = document.getElementById('shadow')

            mainMenuToggle.addEventListener('click',(e) => {
                e.preventDefault();
            })
            document.addEventListener('click',(e) => {
                if (e.target.closest('[js-toggle-menu="toggler"]')) {
                    mainServicesMenu.classList.toggle('active');
                    shadow.classList.toggle('active');
                } else if (e.target.closest('#main-services-menu')) {

                } else {
                    mainServicesMenu.classList.remove('active');
                    shadow.classList.remove('active');
                }
            })

            const submenu = document.querySelector('[js-service-menu="submenu"]')
            const menuItems = mainServicesMenu.querySelectorAll('[js-service-menu="item"]')
            menuItems.forEach(el => {
                el.addEventListener('mouseenter', (e) => {
                    let template = document.getElementById('menu-services-template-' + e.target.getAttribute('data-id'));
                    submenu.innerHTML = '';
                    if (template) {
                        submenu.appendChild(template.content.cloneNode(true));
                    }
                })
            })
        },
    }
})(window)
