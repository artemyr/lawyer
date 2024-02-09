import { createApp } from "vue";
import CitySelectComponent from "./src/components/CitySelectComponent.vue";

import './bootstrap';

createApp(CitySelectComponent)
    .mount('city-select-component');

// main menu
(function (window, document) {
    'use strict';

    if (window.mainMenu) return;

    window.mainMenu = function (arParams)
    {
        this.params = arParams;
        this.mainMenuToggle = {};
        this.mainServicesMenu = {};
        this.shadow = {};
        this.opened = false;
        this.init();
    };

    window.mainMenu.prototype = {
        init: function()
        {
            if (!document.getElementById('main-services-menu')) {
                return
            }

            this.mainServicesMenu = document.getElementById('main-services-menu')
            this.header = document.querySelector('.header')
            this.mainMenuToggle = document.querySelector('[js-service-menu="toggler"] a')
            this.shadow = document.getElementById('shadow')
            this.menuItems = this.mainServicesMenu.querySelectorAll('[js-service-menu="item"]')
            this.submenu = this.mainServicesMenu.querySelector('[js-service-menu="submenu"]')

            this.mainMenuToggle.addEventListener('click',(e) => {
                e.preventDefault();
            })

            document.addEventListener('click',(e) => {
                if (e.target.closest('[js-service-menu="toggler"]')) {
                    this.toggle();
                } else if (e.target.closest('[js-service-menu="closer"]')) {
                    this.close();
                } else if (e.target.closest('#main-services-menu')) {
                    // nothing
                } else {
                    this.close();
                }
            })

            this.initSubmenu();
        },
        toggle: function () {
            if (this.opened) {
                this.close()
            } else {
                this.open()
            }
        },
        open: function () {
            this.mainServicesMenu.style.display = 'block'
            this.mainServicesMenu.classList.add('active');
            this.shadow.classList.add('active');
            this.header.classList.add('menu-opened')
            this.opened = true;
        },
        close: function () {
            this.mainServicesMenu.classList.remove('active');
            this.shadow.classList.remove('active');
            this.header.classList.remove('menu-opened')
            this.opened = false;
        },
        initSubmenu: function () {
            if (window.innerWidth > 1439) {
                this.desktop();
            } else {
                this.mobile();
            }
            this.mouseEnterAction();
            this.mobileClickAction();
        },
        desktop: function () {
            this.menuItems.forEach(el => {
                if (el.querySelector('[js-service-menu="child"]')) {
                    el.querySelector('[js-service-menu="child"]').style.display = 'none';
                }
            })
        },
        mobile: function() {
            this.menuItems.forEach(el => {
                if (el.querySelector('[js-service-menu="child"]')) {
                    el.querySelector('[js-service-menu="child"]').style.display = 'block';
                }
            })
        },
        mouseEnterAction: function () {
            this.menuItems.forEach(el => {
                el.addEventListener('mouseenter', (e) => {
                    let template = document.getElementById('menu-services-template-' + e.target.getAttribute('data-id'));
                    this.submenu.innerHTML = '';
                    if (template) {
                        this.submenu.appendChild(template.content.cloneNode(true));
                    }
                })
            })
            this.mouseEnterAction = () => {
                console.log('event already created')
            }
        },
        mobileClickAction: function () {
            this.menuItems.forEach(btn => {
                smoothView(btn, btn.querySelector('[js-service-menu="child"]'))
            })
            this.mobileClickAction = () => {
                console.log('event already created')
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function(){
        const obj_mainMap = new mainMenu({});
        window.addEventListener("resize", obj_mainMap.initSubmenu.bind(obj_mainMap));
    })
})(window, document);

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

    init_accordion('first_active');
})(window);

// slider
(function (document){
    if (document.getElementById('recommends-swiper')) {
        initRecommendsSlider()
    }
    if (document.getElementById('jurists-swiper')) {
        initJuristsSlider()
    }

    function initRecommendsSlider() {
        const recommends = new Swiper("#recommends-swiper",
        {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: "#recoments_r",
                prevEl: "#recoments_l",
            },
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
    }
    function initJuristsSlider() {
        const jurists = new Swiper("#jurists-swiper",
            {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: "#jurists_r",
                    prevEl: "#jurists_l",
                },
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
    }
})(document)

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
