<div class="container">
    <div class="header">
        <div class="header__left">
            <a href="{{ isset($userCity) ? '/' . $userCity->link : route('main') }}">
                <svg class="logo">
                    <use xlink:href="{{ asset('svg/sprite.svg#logo') }}"></use>
                </svg>
            </a>
            <div class="header__choose-city">
                <svg>
                    <use xlink:href="{{ asset('svg/sprite.svg#point') }}"></use>
                </svg>
                <span>
                    {{ $userCity->name ?? 'Выберите город' }}
                </span>
            </div>
        </div>
        @include('menu.menu')
        <div class="header__right">
            <div class="header__phone-lang">
                <div class="header__number">
                    8 (999) 999 99-99
                </div>
                <div class="header__lang">
                    EN
                </div>
            </div>
            <div class="ui-btn ui-btn-default">
                Заказать звонок
            </div>
        </div>
    </div>

    <div id="main-services-menu">
        <div class="main-services-menu__spoiler">
            <div class="main-services-menu__left">
                <a class="main-services-menu__services-link" href="{{ route('services') }}">
                    <span>Услуги</span>
                    <svg>
                        <use xlink:href="{{ asset('svg/sprite.svg#arrow-3') }}"></use>
                    </svg>
                </a>
                <ul>
                    @include('menu.services_menu')
                </ul>
            </div>

            <div class="main-services-menu__center" js-service-menu="submenu">

            </div>

            <div class="main-services-menu__right">

                <div class="main-services-menu__closer" js-service-menu="closer">
                    <svg>
                        <use xlink:href="{{ asset('svg/sprite.svg#icon-menu-close') }}"></use>
                    </svg>
                </div>

                <div class="form-3">
                    <div class="form-3__title">Готовы решить вашу <span>проблему?</span></div>
                    <div class="form-3__text">Задайте ваш вопрос сейчас и получите ответ нашего юриста</div>
                    <a class="ui-btn ui-btn-arrow ui-btn-arrow_white">
                        <span>Задать вопрос</span>
                        <svg>
                            <use xlink:href="{{ asset('svg/sprite.svg#arrow-5') }}"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
