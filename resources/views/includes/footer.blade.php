<div class="footer">

    @if(isset($map))
    <div id="map" style="height: 420px"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const obj_map = new JCmap({
                "center": [ {{$map->lon}}, {{$map->lat}}],
                "zoom": {{ $map->zoom }}
            });
        })
    </script>
    @endif

    <div class="container">
        <div class="footer_top">
            <div>
                <a href="{{ isset($userCity) ? '/' . $userCity->link : route('main') }}">
                    <svg class="logo">
                        <use xlink:href="{{ asset('svg/sprite.svg#logo-footer') }}"></use>
                    </svg>
                    <svg class="small-logo">
                        <use xlink:href="{{ asset('svg/sprite.svg#small-logo-footer') }}"></use>
                    </svg>
                </a>
            </div>
            <div>

                <div class="footer__phone">
                    <div class="footer__phone-number">8 (800) 232-05-05</div>
                    <div class="footer__phone-label">Юрист перезвонит в течении 15 минут</div>
                </div>

                <div class="footer__btns">
                    <a class="ui-btn ui-btn-arrow">
                        <span>Заказать звонок</span>
                        <svg>
                            <use xlink:href="http://lawyer.localhost/svg/sprite.svg#button-plus"></use>
                        </svg>
                    </a>
                    <div class="footer__to-top-btn" data-scroll-to-top="">
                        <svg>
                            <use xlink:href="{{ asset('svg/sprite.svg#arrow-4') }}"></use>
                        </svg>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__menu">
                <div class="footer-menu">
                    <ul>
                        <li><a href="" class="footer-menu__title">Государственные инстанции</a></li>
                        <li><a href="">Судебные приставы</a></li>
                        <li><a href="">Налоговая</a></li>
                        <li><a href="">Прокуратура</a></li>
                        <li><a href="">Полиция</a></li>
                        <li><a href="">ГИБДД</a></li>
                        <li><a href="">Суды</a></li>
                    </ul>
                </div>
                <div class="footer-menu">
                    <div>
                        <ul>
                            <li><a href="" class="footer-menu__title">Контакты</a></li>
                            <li><a href="">8 (800) 232-05-05</a></li>
                            <li><a href="">info@lawyers-kst.ru</a></li>
                            <li><a href="">г. Санкт-Петербург, 105066, ул.<br>Ольховская, д. 4, корп. 2г</a></li>
                            <li><a href="">Режим работы: Пн - Пт с 9:00 до<br>18:00</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li><a href="" class="footer-menu__title">О компании</a></li>
                            <li><a href="">Услуги</a></li>
                            <li><a href="">Блог</a></li>
                            <li><a href="">Контакты</a></li>
                        </ul>
                        <div class="footer-socials">
                            <p class="footer-menu__title">Соц. сети</p>
                            <div class="footer-socials__list">
                                <a href="">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#telegram') }}"></use>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#vk') }}"></use>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#ok') }}"></use>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#whatsapp') }}"></use>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#djen') }}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
