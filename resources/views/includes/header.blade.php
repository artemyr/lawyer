<div class="container">
    <div class="header">
        <div class="header__left">
            <a href="{{ route('main') }}">
                <svg class="logo">
                    <use xlink:href="{{ asset('svg/sprite.svg#logo') }}"></use>
                </svg>
            </a>
            <div class="header__choose-city">
                Выберите город
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
</div>
